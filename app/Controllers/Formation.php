<?php namespace App\Controllers;

use App\Models\CvModel;
use App\Models\EntrepriseModel;
use App\Models\EtablissementModel;
use App\Models\FormationModel;   

class Formation extends BaseController
{
    public function __construct()
    {
        $this->model = new FormationModel();
    }
	
	public function formations()
	{
		$data = [];
	
		$data['formations']	= 	$this->model->getFormationsList();
		$data['ville'] 		= 	$this->model->getCities();
		$data['etab'] 		= 	$this->model->getEtablissements();
		$data['debouches'] 	=	$this->model->getDebouches();

		$this->charger('formations/listeFormation', $data);
	}
	
	public function ajax_get_formation($id) 
    {
      $data = $this->model->get_by_id($id);
   
      echo json_encode($data);
    }

    public function add_formation() 
	{
      	helper('form','url');
      
	
		$data = array(
			// 'intituleDiplome' => $this->request->getVar('diploma'),
			'description'  => $this->request->getVar('description'),
			'dateDebut'  => $this->request->getVar('startDate'),
			'dateFin'  => $this->request->getVar('endDate'),
		);

		$school = (new EtablissementModel())->getSchool($this->request->getVar('school'));

		if (!$school)
		{
			$new_school['nom'] = $this->request->getVar('school');
			$school = (new EtablissementModel())->addSchool($new_school);
			$data['idEtablissement'] = $school;
		}
		else
			$data['idEtablissement'] = $school['idEtablissement'];

		$studyLevel = $this->request->getVar('studyLevel');
		$field = $this->request->getVar('field');
		$resume = (new CvModel())->user_cv(session('id'));
		
		if ($this->model->add_formation($data, $field, $resume, $studyLevel)){
			echo json_encode(array("status" => TRUE, "message" => "Formation ajoutée"));
		}
		else {
			echo json_encode(array("status" => false, "message" => "Failed"));
		}
    }

	public function edit_formation() 
	{
		helper('form','url');
		
	
		$data = array(
			// 'intituleDiplome' => $this->request->getVar('diploma'),
			'description'  => $this->request->getVar('description'),
			'dateDebut'  => $this->request->getVar('startDate'),
			'dateFin'  => $this->request->getVar('endDate'),
		);

		$school = (new EtablissementModel())->getSchool($this->request->getVar('school'));

		if (!$school)
		{
			$new_school['nom'] = $this->request->getVar('school');
			$school = (new EtablissementModel())->addSchool($new_school);
			$data['idEtablissement'] = $school;
		}
		else
			$data['idEtablissement'] = $school['idEtablissement'];

		$studyLevel = $this->request->getVar('studyLevel');
		$field = $this->request->getVar('field');
		
		if ($this->model->edit_formation(array('idFormation' => $this->request->getVar('idForm')), $data, $field, $studyLevel)){
			echo json_encode(array("status" => TRUE, "message" => "Formation modifiée"));
		}
		else {
			echo json_encode(array("status" => false, "message" => "Failed"));
		}
	}
        
	//methode permettant de supprimer une formation
	public function delete_formation($id) 
	{
		helper(['form','url']);
		
		$this->model->delete_formation($id);
		echo json_encode(array("status" => TRUE));
	}
    
	public function getCityFormationsNCompanies($ville)
	{
		$data = [];

		$data[] = [
			'ville' => $ville, 
			'formations' =>		$this->model->getVilleFormations($ville),
			'entreprises' =>	(new EntrepriseModel())->getVilleEntreprises($ville),
		];
		
		return json_encode($data);
	}
   

     
}

    
    
