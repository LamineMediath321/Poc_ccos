<?php

namespace App\Controllers;

use App\Models\CompetenceModel;
use App\Models\CvModel;
use App\Models\EntrepriseModel;
use App\Models\FormationModel;
use App\Models\OffreModel;
use App\Models\ProfilModel;
use App\Models\TypeContratModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
	public function index()
	{
		if (session()->get('isAdmin')) {
			$this->admin();
		} else if (session()->get('role') == 'etudiant') {
			$this->student();
		} else {
			$this->company();
		}
	}

	public function admin()
	{
		$data['usersNumbers'] 		= 	(new UserModel())->usersNumbers();
		$data['companiesNumbers']	= 	(new EntrepriseModel())->companiesNumbers();
		$data['resumesNumbers'] 	= 	(new CvModel())->resumesNumbers();
		$data['studentsNumbers'] 	= 	(new UserModel())->studentsNumbers();
		$data['alumniNumbers'] 		= 	(new UserModel())->alumniNumbers();
		$data['offersNumbers'] 		= 	(new OffreModel())->offersNumbers();
		$data['internshipsNumbers'] = 	(new OffreModel())->internshipsNumbers();

		$data['offers'] = (new OffreModel())->lastsOffers();
		$i = 0;
		foreach ($data['offers'] as $offer) {
			$offer['nombreCandidatures'] = (new OffreModel())->offerCandidaciesCount($offer['idOpportunite']);
			$data['offers'][$i] = $offer;
			$i++;
		}
		$this->adminPage("admin/index", $data);
	}

	public function company()
	{
		$companyId 						=	(new EntrepriseModel())->getEntrepriseId(session('id'));
		$data['companyOffers'] 			=	(new OffreModel())->getCompanyOffers($companyId['idEntreprise']);
		$data['companyOfNumber'] 		=	(new OffreModel())->companyOffersNumbers($companyId['idEntreprise']);
		$data['cpOfCandidacies'] 		=	(new OffreModel())->getCompanyOffersCandidacies($companyId['idEntreprise']);
		$data['cpOfCandidaciesNumber']	=	(new OffreModel())->getCompanyOffersCandidaciesCount($companyId['idEntreprise']);
		$data['pfCompany'] 				= 	$companyId['idEntreprise'] ? (new EntrepriseModel())->getEntreprise($companyId['idEntreprise']) : '';
		$data['contractTypes'] 			=	(new TypeContratModel())->get_all_typeContrat();
		$data['studyLevels']			=	(new FormationModel())->getStudyLevels();

		$this->charger("dashboard", $data);
	}

	public function student()
	{
		$resume                 = 	(new CvModel())->user_cv(session('id'));
		$student_id 			= 	(new CvModel())->getStudentId(session('id')) ? (new CvModel())->getStudentId(session('id')) : 0;
		$data['resume'] 		= 	$resume;
		$data['persinfo']       = 	(new CvModel())->getPersinfo($student_id) ? (new CvModel())->getPersinfo($student_id) : (new UserModel())->getUser(session('id'));
		$data['offers'] 		= 	(new OffreModel())->get_all_offers();
		$data['mycandidacies'] 	=	(new OffreModel())->getStudentCandidacies(session('id'));
		$data['profiles']		=	(new ProfilModel())->getProfiles();
		$data['id_etu']      = $student_id;

		$i = 0;
		foreach ($data['offers'] as $offer) {
			$offer['have_apply'] = (new OffreModel())->haveApply($student_id, $offer['idOpportunite']);
			$data['offers'][$i] = $offer;
			$i++;
		}

		$this->charger("student/index", $data);
	}
}
