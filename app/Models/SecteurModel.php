<?php namespace App\Models;

use CodeIgniter\Model;


class SecteurModel extends Model{
    protected $table = 'secteur';
    protected $allowedFields = ['intitule'];
   
    protected $db;
    
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    
    public function getSecteurs()
    {
        return $this->asArray()->findAll();
    }

    public function getSecteur($id) 
    {
        return $this->where('idSecteur', $id)
                    ->get()->getRow();
    }

    public function edit_secteur($id, $data)
    {
        $this->db->table($this->table)->update($data, $id);
    }

    public function delete_secteur($id)
    {
        $this->db->table($this->table)->delete($id);
    }
}
