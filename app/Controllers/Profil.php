<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DomaineModel;
use App\Models\ProfilModel;

class Profil extends BaseController 
{
    public function __construct()
    {
        $this->model = new ProfilModel();
    }
    
    public function index()
    {
        $data['profiles'] = $this->model->getProfiles();
        $data['fields']     =   (new DomaineModel())->getFields();

        $this->adminPage('admin/elements/profile', $data); 
    } 

    public function getProfile($id) 
    {
        $data = $this->model->getProfile($id);
        echo json_encode($data);
    }

    public function add_profile()
    {    
        helper('form','url');

        $data = array(
            'intitule'  =>  $this->request->getVar('profile_title'),
            'idDomaine' =>  $this->request->getVar('field')
        );
        
        if ($this->model->insert($data)){
            echo json_encode(array("status" => TRUE, "message" => "Profil ajouté"));
        }
        else {
            echo json_encode(array("status" => false, "message" => "Echec"));
        }
    }

    public function edit_profile()
    {
        helper(['form','url']);

        $data = array(
                'intitule'  =>  $this->request->getVar('profile_title'),
                'idDomaine' =>  $this->request->getVar('field')
        );

        if ($this->model->edit_profile(array('idProfil' => $this->request->getVar('idProfile')), $data))
            echo json_encode(array("status" => TRUE, "message" => "Domaine modifié"));
        
        else 
            echo json_encode(array("status" => false, "message" => "Failed to update"));
    }

    public function delete_field($id) 
    {
		helper(['form','url']);
		if ($this->model->delete_profile(array('idProfil' => $id)))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));

	}
    
}