<?php namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table = 'langue';
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getLanguages()
    {
        return $this->asArray()->findAll();
    }

    public function add($data)
    {
        $this->db->table('langue_cv')->insert($data);
    }

    public function getResumeLanguages($resume) {

        return $this->select(['L.*', 'LCV.niveau'])
                    ->from($this->table. ' AS L', true)
                    ->join('langue_cv AS LCV', 'L.idLangue = LCV.idLangue', 'left')
                    ->join('cv AS CV', 'CV.idCV = LCV.idCV')
                    ->where('LCV.idCV', $resume)
                    ->get()->getResultArray();
    }
}