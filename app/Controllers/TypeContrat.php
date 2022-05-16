<?php namespace App\Controllers;

use App\Models\TypeContratModel;

class TypeContrat extends BaseController 
{
    public function __construct()
    {
        $this->model = new TypeContratModel();
    }
    
     /**
     * Liste des types de contrats
     *
     * @return void
     */
    public function index()
    {
      $data = [];
      $data['contrats'] = $this->model->get_all_typeContrat();

      $this->adminPage('admin/offre/listeContrat', $data);
    }

    //---------------- ajax edit---------------------------------
    public function ajax_get_contract_type($id) 
    {
        $data = $this->model->get_by_id($id);
        echo json_encode($data);
    }


   //-----------------------------
    public function add_contract_type()
    {    
      helper('form','url');
  
      $data = array(
        'intitule' => $this->request->getVar('intituleTC'),
        
      );
      
      if ($this->model->add_typeContrat($data)){
        echo json_encode(array("status" => TRUE, "message" => "Type Contrat ajoutée"));
      }
      else {
        echo json_encode(array("status" => false, "message" => "Failed"));
      }
    }

    //--------------------edit type Contrat ----------------------
    public function edit_contract_type()
    {
        helper(['form','url']);
        
        $data = array(
            'intitule' => $this->request->getVar('intituleTC')
        );

        if ($this->model->update_tc(array('idTypeContrat' => $this->request->getVar('idTC')), $data))
            echo json_encode(array("status" => TRUE, "message" => "TypeContrat modifié"));
        else 
            echo json_encode(array("status" => false, "message" => "Failed to update"));
    }


    //-------------------------Delete(archive) Type Contrat ------------------------

    public function delete_contract_type($id) 
    {
        helper(['form','url']);
        if ($this->model->delete_by_id($id))
            echo json_encode(array("status" => TRUE, "message" => "Suppression validé"));
        else
            echo json_encode(array("status" => false, "message" => "Echec Suppression"));

    }

}

  
 

