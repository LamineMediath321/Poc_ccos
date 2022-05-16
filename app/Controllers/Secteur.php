<?php namespace App\Controllers;

use App\Models\SecteurModel;

class Secteur extends BaseController
{  
    public function __construct()
    {
        $this->model = new SecteurModel();
    }
    
    public function getSecteurs()
    {
        $data = [];	
        $data['secteurs'] = $this->model->getSecteurs();

        $this->adminPage('admin/entreprises/secteur', $data); 
    }

    public function ajax_get_secteur($id) 
    {
        $data = $this->model->getSecteur($id);
        echo json_encode($data);
    }
        
    public function add_secteur()
    {    
        helper('form','url');

        $data = array(
            'intitule' => $this->request->getVar('intituleSecteur'),
            
        );
        
        if ($this->model->insert($data)){
            echo json_encode(array("status" => TRUE, "message" => "Secteur ajouté"));
        }
        else {
            echo json_encode(array("status" => false, "message" => "Echec"));
        }
    }

    public function edit_secteur()
    {
        helper(['form','url']);

        $data = array(
                'intitule' => $this->request->getVar('intituleSecteur')
        );
        if ($this->model->edit_secteur(array('idSecteur' => $this->request->getVar('idSecteur')), $data)){
                echo json_encode(array("status" => TRUE, "message" => "Secteur modifié"));
        }
        else {
            echo json_encode(array("status" => false, "message" => "Failed to update"));
        } 
    }

    public function delete_secteur($id) 
    {
		helper(['form','url']);
		$data = array('archive' => 0);
		if ($this->model->delete_secteur(array('idSecteur' => $id)))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));

	}
}

		
		
