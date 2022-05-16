<?php namespace App\Controllers;

use App\Models\CvModel;
use App\Models\ExperienceModel;

class Experience extends BaseController
{
    public function __construct()
    {
        $this->model = new ExperienceModel();
    }
    public function get_by_ajax($id)
    {
        $data = (new ExperienceModel())->getExperience($id);

        echo json_encode($data);
    }

    protected function getExperienceFormData()
    {
        $data = [
            'idCV'          =>  (new CvModel())->user_cv(session('id')),
            'intitulePoste' =>  $this->request->getVar('jobTitle'),
            'employeur'     =>  $this->request->getVar('company'),
            'dateDebut'     =>  $this->request->getVar('startDate'),
            'dateFin'       =>  $this->request->getVar('endDate'),
            'realisation'   =>  $this->request->getVar('realisation')
        ];

        return $data;
    }

    public function add()
    {
        $data = $this->getExperienceFormData();
        
        if ($this->model->add($data)){
            echo json_encode(array("status" => TRUE, "message" => "Experience ajoutée"));
        }
        else {
        echo json_encode(array("status" => false, "message" => "Failed"));
        }
    }

    public function update_experience()
    {
        helper(['form','url']);
        
        $data = $this->getExperienceFormData();

        if ($this->model->update_experience(array('idExperience' => $this->request->getVar('idExp')), $data))
            echo json_encode(array("status" => TRUE, "message" => "Experience modifiée"));
        else 
            echo json_encode(array("status" => false, "message" => "Failed to update"));
    }

}