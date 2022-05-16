<?php

namespace App\Controllers;

use App\Models\CvModel;
use App\Models\DomaineModel;
use App\Models\ExperienceModel;
use App\Models\FormationModel;
use App\Models\LanguageModel;
use App\Models\CompetenceModel;
use App\Models\UserModel;
use App\Models\EtablissementModel;
use App\Models\ProfilModel;

class Cv extends BaseController
{
	protected function getStudentResumeData($student_user_id)
	{
		$data = [];
		$model = new CvModel();
		$resume                 = $model->user_cv($student_user_id);
		$student_id 			= 	$model->getStudentId($student_user_id) ? $model->getStudentId($student_user_id) : 0;
		$data['resume'] 		=	$resume;
		$data['persinfo']       = 	$student_id ? (new CvModel())->getPersinfo($student_id) : (new UserModel())->getUser(session('id'));
		$data['formations']     = 	(new FormationModel())->getResumeFormations($resume);
		$data['userSkills']     = 	(new CompetenceModel())->getResumeSkills($resume);
		$data['experiences']    = 	(new ExperienceModel())->getResumeExperiences($resume);
		$data['userLanguages']  = 	(new LanguageModel())->getResumeLanguages($resume);

		// $data['profiles']       = 	(new ProfilModel())->getProfiles();
		$data['schools']		=	(new EtablissementModel())->getSchools();
		$data['fields']         = 	(new DomaineModel())->getFields();
		$data['studyLevels']    = 	(new FormationModel())->getStudyLevels();
		$data['skills']         = 	(new CompetenceModel())->getSkills();
		$data['languages']      = 	(new LanguageModel())->getLanguages();

		return $data;
	}

	public function index()
	{
		if (session()->get('role') != 'etudiant')
			return redirect()->to(base_url('/'));

		$data = $this->getStudentResumeData(session('id'));

		$this->charger('resume', $data);
	}

	public function cv($student_user_id)

	{

		$data = $this->getStudentResumeData($student_user_id);
		if (session()->get('role') != 'etudiant') {
			$this->adminPage('admin/student/cv', $data);
		} else {
			$this->charger('resume', $data);
		}
	}

	public function get_personal_infos($id)
	{
		$student_id = (new CvModel())->getStudentId($id);
		$data = (new CvModel())->getPersinfo($student_id);

		echo json_encode($data);
	}

	public function resumes()
	{
		$data = [];
		$model = new CvModel();

		$data['resumes'] = $model->getResumes();

		if (!session()->get('isAdmin'))
			return redirect()->to(base_url('/'));

		$this->adminPage('admin/student/resumes', $data);
	}

	public function student_info($id)
	{
		$student_id = (new CvModel())->getStudentId($id);
		$data = (new CvModel())->getPersinfo($student_id);

		echo json_encode($data);
	}

	public function add_personal_infos()
	{
		$model = new CvModel();

		$description =
			[
				'description' =>  $this->request->getVar('description')
			];

		$resume = $model->addResume($description);
		// $file = $this->request->getFile('pict');
		// $name = $file->getRandomName();
		// $file->move('assets/images', $name);
		$data = array(
			'idCV'          =>  $resume,
			'nom'           =>  $this->request->getVar('lstname'),
			'prenom'        =>  $this->request->getVar('fstname'),
			'email'         =>  $this->request->getVar('mail'),
			'telephone'     =>  $this->request->getVar('phone'),
			'adresse'       =>  $this->request->getVar('adress'),
			'genre'         =>  $this->request->getVar('sex'),
			'dateNaissance' =>  $this->request->getVar('bthDay'),
			'lieuNaissance' =>  $this->request->getVar('bthPlace'),
			'nationalite'   =>  $this->request->getVar('natnalty'),
			'idUtilisateur' =>  session('id')
		);



		$file = $this->validate([
			'pict' => [
				'uploaded[file]',
				'mime_in[file, image/png, image/jpg, image/jpeg]',
				'max_size[file,4096]',
			]
		]);

		$file = $this->request->getFile('pict');
		$file->move('assets/images');

		$name = $file->getName();
		$data['photo'] = $name;


		$profiles = $this->request->getVar('profiles');
		foreach ($profiles as $profile) {
			$userProfiles[] = [
				'idCV'   => $resume,
				'idProfil'   => $profile
			];
		}

		if ($model->add_persinfos($data, $userProfiles)) {
			echo json_encode(array("status" => TRUE, "message" => "Entreprise ajouté"));
		} else {
			echo json_encode(array("status" => false, "message" => "Failed"));
		}
	}

	public function edit_personal_infos()
	{
		$student_id = (new CvModel())->getStudentId(session('id'));
		$resume = (new CvModel())->user_cv(session('id'));
		$description =
			[
				'description' =>  $this->request->getVar('description')
			];

		// (new CvModel())->updateResumeDescription($resume, $description);

		$data = array(
			'idCV'          =>  $resume,
			'nom'           =>  $this->request->getVar('lstname'),
			'prenom'        =>  $this->request->getVar('fstname'),
			'email'         =>  $this->request->getVar('mail'),
			'telephone'     =>  $this->request->getVar('phone'),
			'adresse'       =>  $this->request->getVar('adress'),
			'genre'         =>  $this->request->getVar('sex'),
			'dateNaissance' =>  $this->request->getVar('bthDay'),
			'lieuNaissance' =>  $this->request->getVar('bthPlace'),
			'nationalite'   =>  $this->request->getVar('natnalty'),
			'idUtilisateur' =>  session('id')
		);

		// if ($_FILES['pict']['name']) {
		// 	$file = $this->request->getFile('pict');
		// 	$name = $file->getRandomName();
		// 	$file->move('assets/images', $name);
		// 	$data['photo'] = $name;
		// }

		$file = $this->validate([
			'pict' => [
				'uploaded[file]',
				'mime_in[file, image/png, image/jpg, image/jpeg]',
				'max_size[file,4096]',
			]
		]);

		$file = $this->request->getFile('pict');
		$file->move('assets/images');

		$name = $file->getName();
		$data['photo'] = $name;


		// $profiles = $this->request->getVar('profiles');
		// foreach ($profiles as $profile) {
		// 	$userProfiles[] = [
		// 		'idCV'   => $resume,
		// 		'idProfil'   => $profile
		// 	];
		// }

		if ((new CvModel())->edit_persinfos($student_id, $data, $resume))
			echo json_encode(array("status" => TRUE, "message" => "Informations modifiees"));

		else
			echo json_encode(array("status" => false, "message" => "Failed"));
	}
}
