<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CompetenceModel;
use App\Models\CvModel;

class Competence extends BaseController
{
	public function __construct()
	{
		$this->model = new CompetenceModel();
		$this->pager = service('pager');
	}

	public function add_skills()
	{
		if ($this->request->getMethod() == 'post') {
			$skill = $this->request->getVar('skill');
			$resume = (new CvModel())->user_cv(session('id'));
			$data = array(
				'idCv' => $resume,
				'idCompetence' => $skill
			);
			// $comp = $this->model->get_competence_cv($data);
			$rules = [
				'skill' => 'required'
			];
			if ($this->validate($rules)) {

				$this->model->add_skills($data);
				echo json_encode(array("status" => true, "message" => "success"));
			} else {
				$data['validation'] = $this->validator;
				echo json_encode($data);
			}
		}
	}

	public function competences()
	{

		$data = [];

		$competence = $this->request->getVar('competence');

		$this->page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$offset =  PER_PAGE * $this->page;

		$competences = $this->model->get_liste_competence($competence, PER_PAGE, $offset);
		$total = count($this->model->get_liste_competence());
		$this->pager->makeLinks($this->page, PER_PAGE, $total);
		$data['pager'] = $this->pager;
		$data['competences'] = $competences;


		$this->charger('formations/competences', $data);
	}


	public function admin_competences()
	{

		$data = [];

		$data['competences'] = $this->model->get_liste_competence();
		$this->adminPage('admin/elements/competences', $data);
	}

	public function delete_competence($id)
	{
		helper(['form', 'url']);

		if ($this->model->delete_competence($id))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validée"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));
	}


	public function ajax_get_competence($id)
	{
		$data = (new CompetenceModel())->get_by_id($id);
		echo json_encode($data);
	}



	protected function getCompetenceFormData()
	{
		$data = array(
			'idCompetence' =>  $this->request->getVar('id'),
			'intitule' => $this->request->getVar('intitule'),

		);


		return $data;
	}

	public function edit_competence()
	{
		helper(['form', 'url']);

		$data = array(
			'intitule' => $this->request->getVar('intitule'),
		);

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'intitule' => 'required'
			];
			if ($this->validate($rules)) {
				$this->model->update_competence(array('idCompetence' => $this->request->getVar('idCompetence')), $data);
			} else {
				$data['validation'] = $this->validator;
				echo_json($data);
			}
		}
	}


	public function add_competence()
	{
		helper('form', 'url');

		$data = array(
			'intitule' => $this->request->getVar('intitule'),
		);
		$comp = $this->model->get_competence($data['intitule']);


		if ($this->request->getMethod() == 'post') {
			$rules = [
				'intitule' => 'required'
			];
			if ($this->validate($rules)) {
				if (empty($comp))
					$this->model->add_competence($data);
			} else {
				$data['validation'] = $this->validator;
				echo_json($data);
			}
		}
	}
}
