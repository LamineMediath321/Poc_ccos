<?php

namespace App\Controllers;

use App\Models\EntrepriseModel;
use App\Models\FormationModel;
use App\Models\SecteurModel;

class Entreprise extends BaseController
{
	function __construct()
	{
		$this->model = new EntrepriseModel();
		$this->pager = service('pager');
	}

	/**
	 * Liste des entreprises 
	 *
	 * @return void
	 */
	public function index()
	{

		$data = [];

		$data['donnees'] 	=	$this->getCitiesFormationsNCompanies();
		$data['secteurs'] 	= 	$this->model->getSecteurs();



		$city = $this->request->getVar('city');
		$company = $this->request->getVar('company');

		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset = PER_PAGE * $this->page;
		$companies	= 	$this->model->get_entreprises($city, $company, PER_PAGE, $offset);
		$total = count($this->model->get_entreprises());
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;
		$data['companies']	= 	$companies;


		$this->charger('entreprise', $data);
	}

	public function getListeEntreprise()
	{

		$data = [];
		$data['companies'] = $this->model->getListe();
		$data['cities'] 	= 	(new FormationModel())->getCities();
		$data['secteurs'] 	= 	$this->model->getSecteurs();

		$this->adminPage('admin/entreprises/index', $data);
	}

	public function ajax_get_company($id)
	{
		$data = (new EntrepriseModel())->get_by_id($id);
		echo json_encode($data);
	}

	protected function getCompanyFormData()
	{
		$data = array(
			'idVille' => $this->request->getVar('city'),
			'nomEntreprise' => $this->request->getVar('company_name'),
			'presentation'  => $this->request->getVar('presentation'),
			'adresse'  => $this->request->getVar('address'),
			'telephone' => $this->request->getVar('phone'),
			'email' => $this->request->getVar('mail'),
			'siteWeb'  => $this->request->getVar('website'),
		);

		if ($_FILES['logo']['name']) {
			$file = $this->request->getFile('logo');
			$name = $file->getRandomName();
			$file->move('assets/images', $name);
			$data['logo'] = $name;
		}

		return $data;
	}

	public function add_ent()
	{
		$data = $this->getCompanyFormData();
		$data['partenaire'] = $this->request->getVar('partner');

		$secteurs = $this->request->getVar('secteur');
		if ($this->model->add_ent($data, $secteurs)) {
			echo json_encode($data);
		} else {
			echo json_encode($data);
		}
	}

	public function update_ent()
	{
		helper(['form', 'url']);

		$data = $this->getCompanyFormData();
		$data['partenaire'] = $this->request->getVar('partner');

		$secteurs = $this->request->getVar('secteur');
		if ($this->model->update_ent(array('idEntreprise' => $this->request->getVar('idCompany')), $data, $secteurs)) {
			echo json_encode(array("status" => TRUE, "message" => "Entreprise modifié"));
		} else {
			echo json_encode(array("status" => false, "message" => "Failed to update"));
		}
	}

	public function delete_ent($id)
	{
		helper(['form', 'url']);

		if ($this->model->delete_ent($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validée"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}

	public function create_company()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			$data = $this->getCompanyFormData();
			$data['idPointFocal'] = $this->request->getVar('point_focal');

			$secteurs = $this->request->getVar('secteur');

			(new EntrepriseModel())->add_ent($data, $secteurs);

			return redirect()->to(base_url('/tableau_de_bord'));
		}

		$data['cities'] = (new FormationModel())->getCities();
		$data['secteurs'] = (new SecteurModel())->getSecteurs();

		$this->charger('admin/entreprises/create', $data);
	}
}
