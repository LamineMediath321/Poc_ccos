<?php namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table = 'experience';
    protected $primary_key = 'idExperience';
    protected $returnType = 'array';
    protected $db;

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function add($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function update_experience($data, $id)
    {
        $this->db->table($this->table)->update($data, $id);
    }

    public function getResumeExperiences($resume) {

        return $this->asArray()
                ->where(['idCV' => $resume])
                ->get()->getResultArray();
    }

    public function getExperience($id)
    {
        return $this->where('idExperience', $id)
                ->first();
    }
}