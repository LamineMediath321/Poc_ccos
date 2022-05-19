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
      $comp = $this->model->get_typeContrat($data['intitule']);
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'intituleTC' => 'required'
			];
			if ($this->validate($rules)) {
				if (empty($comp))
					$this->model->add_typeContrat($data);
			} else {
				$data['validation'] = $this->validator;
				echo_json($data);
			}
		}
    }

    //--------------------edit type Contrat ----------------------
    public function edit_contract_type()
    {
        helper(['form','url']);
        
        $data = array(
            'intitule' => $this->request->getVar('intituleTC')
        );
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'intituleTC' => 'required'
			];
			if ($this->validate($rules)) {
				$this->model->update_tc(array('idTypeContrat' => $this->request->getVar('idTC')), $data);
			} else {
				$data['validation'] = $this->validator;
				echo_json($data);
			}
		}
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

  
 

