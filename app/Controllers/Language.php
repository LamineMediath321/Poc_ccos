<?php namespace App\Controllers;

use App\Models\CvModel;
use App\Models\LanguageModel;

class Language extends BaseController
{
    public function __construct()
	{
		$this->model = new LanguageModel();
	}
      
    public function add()
    {
        if ($this->request->getMethod() == 'post')
        {
            $language = $this->request->getVar('language');
            $level = $this->request->getVar('level');
            $resume = (new CvModel())->user_cv(session('id'));
            
			$data = [];
            $data = [
                'idCV'  =>  $resume,
                'idLangue'  =>  $language,
                'niveau'    =>  $level
            ];
      
            
            if ($this->model->add($data)){
              echo json_encode(array("status" => TRUE, "message" => "Languages ajoutées"));
            }
            else {
              echo json_encode(array("status" => false, "message" => "Failed"));
            }
        }
    }
}
