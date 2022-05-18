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
        $profil = $this->model->get_profile_by_intitule($data['intitule']);


        if($this->request->getMethod() == 'post'){
			$rules = [
				'profile_title' => 'required',
                'field' =>  'required'

			];
			if($this->validate($rules)) {
                if(empty($profil))
                    $this->model->insert($data);
			}
			else{
				$data['validation'] = $this->validator;
				echo_json($data);

			}
		}
        
       
    }

    public function edit_profile()
    {
        helper(['form','url']);

        $data = array(
                'intitule'  =>  $this->request->getVar('profile_title'),
                'idDomaine' =>  $this->request->getVar('field')
        );

           if($this->request->getMethod() == 'post'){
			    $rules = [
                    'profile_title' => 'required',
                    'field' =>  'required'

			    ];
			    if($this->validate($rules)) {
                    if(empty($profil))
                        $this->model->edit_profile(array('idProfil' => $this->request->getVar('idProfile')), $data);
			    }
			    else{
                    $data['validation'] = $this->validator;
                    echo_json($data);

			    }
		}

      
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