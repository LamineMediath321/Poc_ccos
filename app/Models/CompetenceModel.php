<?php

namespace App\Models;

use CodeIgniter\Model;


class CompetenceModel extends Model
{
    protected $table = 'competence';
    protected $primary_key = 'idCompetence';
    protected $returnType = 'array';
    protected $db;

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getSkills()
    {
        return $this->asArray()->findAll();
    }

    public function add_skills($data)
    {
        $this->db->table('competence_cv')->insert($data);
    }

    public function get_competence_cv($data)
    {
        return $this->db->table('competence_cv')
            ->where('idCompetence', $data['idCompetence'])
            ->where('idCV', $data['idCv']);
    }

    public function getResumeSkills($resume)
    {

        return $this->select(['S.*'])
            ->from($this->table . ' AS S', true)
            ->join('competence_cv AS SCV', 'S.idCompetence = SCV.idCompetence', 'left')
            ->join('cv AS CV', 'CV.idCV = SCV.idCV')
            ->where('SCV.idCV', $resume)
            ->get()->getResultArray();
    }

    public function get_liste_competence($competence = null, $perPage = null, $offset = null)
    {

        // return $this->select(['CP.*','C.intitule AS competence','P.intitule AS metier'])
        //     ->from('competence_profil AS CP', true)
        //     ->join($this->table. ' AS C', 'CP.idCompetence = C.idCompetence', 'left')
        //     ->join('profil AS P', 'P.idProfil = CP.idProfil', 'left')
        //     ->get()->getResultArray();

        if ($competence) {
            return $this->select(['C.*', 'C.intitule AS intitule'])
                ->from($this->table . ' AS C', true)
                ->where('C.archive', '0')
                ->where('C.intitule', $competence)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } else {
            return $this->select(['C.*', 'C.intitule AS intitule'])
                ->from($this->table . ' AS C', true)
                ->where('C.archive', '0')
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        }
    }

    public function delete_competence_profil($id)
    {
        $this->db->table('competence_profil')->delete(array('idCompetence' => $id));
    }

    public function delete_competence($id)
    {
        $this->db->table($this->table)->update(array("archive" => '1'), array('idCompetence' => $id));
        //$this->db->table($this->table)->delete(array('idEntreprise'=>$id));
    }



    public function get_by_id($id)
    {
        return $this->where('idCompetence', $id)
            ->get()->getRow();
    }
    public function get_competence($attribute)
    {
        return $this->where('intitule', $attribute)
            ->get()->getRow();
    }

    public function update_competence($id, $data)
    {
        $this->db->table('competence')->update($data, $id);
    }

    public function add_competence($data)
    {
        $this->db->table('competence')->insert($data);
    }
}
