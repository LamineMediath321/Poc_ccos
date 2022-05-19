<?php namespace App\Models;

use CodeIgniter\Model;

class TypeContratModel extends Model
{
    protected $table = 'typecontrat';
    protected $primaryKey = "idTypeContrat";

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function get_all_typeContrat() 
    {
        return $this->asArray()
                    ->where('archive', 0)
                    ->findAll();          
    }

    public function add_typeContrat($tc)
    {
        $this->db->table('typecontrat')->insert($tc);
    }

    public function get_by_id($id) 
    {
        return $this->where('idTypeContrat', $id)
                    ->get()->getRow();
    }
    
    public function get_typeContrat($attribute) {
        return $this->where('intitule', $attribute)
            ->get()->getRow();
    }

    public function update_tc($id,$tc)
    {
        $this->db->table('typecontrat')->update($tc, $id);
    }

    public function delete_by_id($id)
    {
        $this->db->table('typecontrat')->update(array('archive'=>'1'),array('idTypeContrat'=>$id));
    }
   
}