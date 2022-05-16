<?php namespace App\Models;

use CodeIgniter\Model;


class EtablissementModel extends Model{
    protected $table = 'etablissement';
    // protected $allowedFields = ['idFormation','idVille','idEtablissement','typeFormation','diplomeEquivalent','intituleDiplome','debouches', 'description'];
   
    protected $db;
    
    
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('formation');
    }

    public function getSchools()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }


    public function getSchool($school)
    {
        return $this->select('idEtablissement')
                ->where('nom', $school)
                ->first();
    }

    public function addSchool($school)
    {
        $this->db->table($this->table)->insert($school);
     
        return $this->insertID();
    }
}