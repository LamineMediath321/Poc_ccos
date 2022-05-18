<?php

namespace App\Controllers;

use App\Models\CvModel;
use App\Models\EntrepriseModel;
use App\Models\FormationModel;
use App\Models\OffreModel;
use App\Models\ProfilModel;
use App\Models\TypeContratModel;
use CodeIgniter\I18n\Time;


class Offre extends BaseController
{
	public function __construct()
	{
		$this->model = new OffreModel();
		$this->pager = service('pager');
	}

	protected function _offerFormData()
	{
		$data = [];
		$data['ent'] 	= 	(new EntrepriseModel())->get_all();
		$data['tc'] 	= 	(new TypeContratModel())->get_all_typeContrat();
		$data['ne'] 	= 	(new FormationModel())->getStudyLevels();
		$data['cities'] = 	(new FormationModel())->getCities();
		$data['prof'] 	= 	(new ProfilModel())->getProfiles();


		return $data;
	}

	/**
	 * Liste des offres
	 *
	 * @return void
	 */
	public function index()
	{
		$data = $this->_offerFormData();
		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset =  PER_PAGE * $this->page;
		$offres	= 	$this->model->get_all_offers(PER_PAGE, $offset);
		$total = count($this->model->get_all_offers());
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;


		$data['offres'] = $offres;


		$this->charger('offers', $data);
	}

	public function etudiantPostule()
	{
		$data = [];
		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset =  PER_PAGE * $this->page;

		$etudiants_postules = $this->model->getStudentPostule(PER_PAGE, $offset);

		$total = count($this->model->getStudentPostule());
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;

		$data['etudiants_postules'] = $etudiants_postules;

		if (!session()->get('isAdmin'))
			return redirect()->to(base_url('/'));

		$this->adminPage('admin/category/candidature', $data);
	}

	public function getOffersByAdmin()
	{
		$data = $this->_offerFormData();
		$data['offres']	= 	$this->model->get_all_offers();

		$this->adminPage('admin/offre/listeOffre', $data);
	}

	public function show($id)
	{
		//A gere apres pour la pagination
		$data = [];
		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset =  PER_PAGE * $this->page;
		$total = count($this->model->getOfferCandidacies($id));
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;
		$etudiantId = (new CvModel())->getStudentId(session('id'));
		$data['offer'] 			=	$this->model->getOf_by_id($id);
		$data['haveApply'] 		=	$this->model->haveApply($etudiantId, $id);
		$data['ofcandidacies']	=	$this->model->getOfferCandidacies($id);
		$data['total'] = $total;
		$data['lastsOffers'] = $this->model->lastsOffers();
		$data['nbLastsOffers'] = count($this->model->lastsOffers());


		// dd($data['haveApply']);
		if (session()->get('isAdmin'))
			$this->adminPage('admin/offre/offer_show', $data);
		else
			$this->charger('offer_show', $data);
	}

	public function ajax_get_offer($id)
	{
		$data = $this->model->getOf_by_id($id);
		echo json_encode($data);
	}

	public function add_offer()
	{
		helper(['form', 'url']);

		if (session()->get('isAdmin'))
			$company = (new EntrepriseModel())->getCompanyByName($this->request->getVar('nomEnt'));
		else
			$company = $this->request->getVar('idEnt');

		if ($company) {
			$myTime = Time::today('Africa/Dakar', 'fr_FR');
			$dataOP = array(
				'intitule' => $this->request->getVar('intituleOP'),
				'datePublication' => $myTime,
				'statut' => ('0')
			);

			$idOp = $this->model->add_opportunite($dataOP);
			if (!$idOp) {
				echo json_encode(array("status" => false, "message" => "Failed"));
			} else {
				$dataOf = array(
					'idOpportunite' => $idOp,
					'idTypeContrat' => $this->request->getVar('idTC'),
					'idNiveauEtude' => $this->request->getVar('idNE'),
					'idProfil' => $this->request->getVar('idP'),
					'mission' => $this->request->getVar('mis'),
					'prerequis' => $this->request->getVar('preq'),
					'details' => $this->request->getVar('det'),
					'dateCloture' => $this->request->getVar('dateC')
				);
				$dataOf['idEntreprise'] = session()->get('isAdmin') ? $company['idEntreprise'] : $company;

				$city = (new EntrepriseModel())->getCityByName($this->request->getVar('ville'));

				if (!$city) {
					$new_city['nom'] = $this->request->getVar('ville');
					$city = (new EntrepriseModel())->addCity($new_city);
					$data['idVille'] = $city;
				} else
					$data['idVille'] = $city['idVille'];

				if ($this->model->add_offer($dataOf)) {
					echo json_encode(array("status" => TRUE, "message" => "Offre ajoutee"));
				} else {
					echo json_encode(array("status" => false, "message" => "add offer Failed"));
				}
			}
		} else {
			session()->set(['CompanyAdd' => TRUE]);
		}
	}


	//-------------------------------MAJ Offre et opportunité-------------------------
	public function update_offer()
	{
		helper(['form', 'url']);


		$dataOP = array(
			'intitule' => $this->request->getVar('intituleOP'),
		);
		$this->model->update_op(array('idOpportunite' => $this->request->getVar('idOp')), $dataOP);

		$data = array(
			'idTypeContrat' => $this->request->getVar('idTC'),
			'idNiveauEtude' => $this->request->getVar('idNE'),
			'idProfil' => $this->request->getVar('idP'),
			'mission' => $this->request->getVar('mis'),
			'prerequis' => $this->request->getVar('preq'),
			'details' => $this->request->getVar('det'),
			'dateCloture' => $this->request->getVar('dateC')
		);

		$company = (new EntrepriseModel())->getEntrepriseByName($this->request->getVar('nomEnt'));
		$data['idEntreprise'] = $company['idEntreprise'];

		$city = (new EntrepriseModel())->getCityByName($this->request->getVar('ville'));

		if (!$city) {
			$new_city['nom'] = $this->request->getVar('ville');
			$city = (new EntrepriseModel())->addCity($new_city);
			$data['idVille'] = $city;
		} else
			$data['idVille'] = $city['idVille'];

		if ($this->model->update_offer(array('idOpportunite' => $this->request->getVar('idOp')), $data)) {
			echo json_encode(array("status" => TRUE, "message" => "Offre modifié"));
		} else {
			echo json_encode(array("status" => false, "message" => "Failed to update"));
		}
	}

	public function delete_offer($id)
	{
		helper(['form', 'url']);

		if ($this->model->delete_offer($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}

	public function delete_poste($id)
	{
		helper(['form', 'url']);

		if ($this->model->delete_poste($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}

	public function valider_poste($id)
	{
		helper(['form', 'url']);

		if ($this->model->valider_poste($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}

	public function rejeter_poste($id)
	{
		helper(['form', 'url']);

		if ($this->model->rejeter_poste($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}


	//------------------Postuler à une offre --------------------------------------------
	public function applyToAOffer($offerId)
	{
		$etudiantId = (new CvModel())->getStudentId(session('id'));

		if ($etudiantId) {
			$this->model->apply_to_offer($etudiantId, $offerId);

			return redirect()->to(base_url('/mes_candidatures'));
		}

		session()->set(['Resume404' => TRUE]);

		return redirect()->to('/tableau_de_bord');
	}

	public function my_candidacies()
	{
		$data = [];
		$data['mycandidacies'] = $this->model->getStudentCandidacies(session('id'));

		$this->charger('mycandidacies', $data);
	}



	public function offer_candidacies($id)
	{
		$data = [];
		$data['ofcandidacies'] = $this->model->getOfferCandidacies($id);

		$this->charger('ofcandidacies', $data);
	}


	public function fieldOffers($field)
	{
		$data = $this->_offerFormData();
		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset =  PER_PAGE * $this->page;
		$total = count($this->model->getFieldOffers($field));
		$offres = $this->model->getFieldOffers($field, PER_PAGE, $offset);

		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;


		$data['offres'] = $offres;

		$this->charger('offers', $data);
	}

	public function search_offer()
	{
		helper(['form', 'url']);

		$typeContract = $this->request->getVar('tc');
		$profil = $this->request->getVar('profil');
		$city = $this->request->getVar('city');
		$data = $this->_offerFormData();

		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset = PER_PAGE * $this->page;
		$offres =	$this->model->searchOfferWithCriteria($profil, $city, $typeContract, PER_PAGE, $offset);
		$total = count($this->model->searchOfferWithCriteria($profil, $city, $typeContract));
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;


		$data['offres'] = $offres;

		$this->charger('offers', $data);
	}
}
