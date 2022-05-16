<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DomaineModel;

class Domaine extends BaseController 
{
    public function index()
    {
        $data['fields'] = (new DomaineModel)->getFields();


        $this->adminPage('admin/elements/field', $data); 
    } 
    
    public function getField($id) 
    {
        $data = (new DomaineModel())->getField($id);
        echo json_encode($data);
    }

    public function add_field()
    {    
        helper('form','url');
            
        $model = new DomaineModel();

        $data = array(
            'intitule' => $this->request->getVar('field_title'),
            
        );
        
        if ((new DomaineModel())->insert($data)){
            echo json_encode(array("status" => TRUE, "message" => "Domaine ajouté"));
        }
        else {
            echo json_encode(array("status" => false, "message" => "Echec"));
        }
    }

    public function edit_field()
    {
        helper(['form','url']);

        $data = array(
                'intitule' => $this->request->getVar('field_title')
        );

        if ((new DomaineModel())->edit_field(array('idDomaine' => $this->request->getVar('idField')), $data))
            echo json_encode(array("status" => TRUE, "message" => "Domaine modifié"));
        
        else 
            echo json_encode(array("status" => false, "message" => "Failed to update"));
    }

    public function delete_field($id) 
    {
		helper(['form','url']);
		// $data = array('archive' => 0);
        
		if ((new DomaineModel())->delete_field(array('idDomaine' => $id)))
			echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
		else
			echo json_encode(array("status" => false, "message" => "Echec Suppression"));

	}
}