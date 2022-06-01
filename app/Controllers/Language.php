<?php

namespace App\Controllers;

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
        if ($this->request->getMethod() == 'post') {
            $language = $this->request->getVar('language');
            $level = $this->request->getVar('level');
            $resume = (new CvModel())->user_cv(session('id'));

            $data = [];
            $data = [
                'idCV'  =>  $resume,
                'idLangue'  =>  $language,
                'niveau'    =>  $level
            ];

            $rules = [
                'language' => 'required',
                'level' => 'required'
            ];
            if ($this->validate($rules)) {
                $this->model->add($data);
                echo json_encode(array("status" => true, "message" => "success"));
            } else {
                $data['validation'] = $this->validator;
                echo_json($data);
            }
        }
    }
}
