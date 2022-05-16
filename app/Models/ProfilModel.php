<?php namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model{
    protected $table = 'profil';
    protected $primary_key = 'idProfil';
    protected $returnType = 'array';
    protected $allowedFields = ['intitule', 'idDomaine'];
    protected $db;

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getProfiles()
    {
        return $this->select(['P.*',
                        'D.intitule AS field_title'
                        ])
                    ->from($this->table . ' AS P', true)
                    ->join('domaine AS D', 'D.idDomaine = P.idDomaine', 'left')
                    ->findAll();
    }

    public function getProfile($id) {
        return $this->where('idProfil', $id)
            ->get()->getRow();
    }

    public function edit_profile($id, $data)
    {
        $this->db->table($this->table)->update($data, $id);
    }

    public function delete_profile($id)
    {
        $this->db->table($this->table)->delete($id);
    }

    public function getResumeProfiles($resume) 
    {
        return $this->select(['P.*'])
                    ->from($this->table . ' AS P', true)
                    ->join('profil_cv AS PCV', 'P.idProfil = PCV.idProfil', 'left')
                    ->join('cv AS CV', 'CV.idCV = PCV.idCV')
                    ->where('PCV.idCV', $resume)
                    ->get()->getResultArray();
    }
}