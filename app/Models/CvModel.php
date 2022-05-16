<?php namespace App\Models;

use CodeIgniter\Model;

class CvModel extends Model 
{
    protected $table = 'etudiant';  
    protected $db;
    /**
     * Ce model est celui de la table CV mais on y utilise la table 
     * etudiant, parce que c'est cette derniere qui contient les informations
     * personnelles de l'etudiant et que l'id du cv s'y trouve aussi 
     * */
        
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getStudentId($id)
    {
        return $this->select('idEtudiant')
        ->where('idUtilisateur', $id)
        ->first();
    }

    public function user_cv($id)
    {
        return $this->select('idCV')
        ->where('idUtilisateur', $id)
        ->first();
    }

    public function getResumes()
    {
        return $this->select(['E.*', 'GROUP_CONCAT(P.intitule SEPARATOR " - ") as profils'])
                    ->from($this->table. ' AS E')
                    ->join('cv AS CV', 'CV.idCV = E.idCV', 'left')
                    ->join('profil_cv AS PCV', 'PCV.idCV = CV.idCV', 'left')
                    ->join('profil AS P', 'P.idProfil = PCV.idProfil')
                    ->groupBy('idEtudiant')
                    ->get()->getResultArray();
    }


    

    public function studentsNumbers()
    {        
        return $this->db->table($this->table)->countAll();
    }

    public function resumesNumbers()
    {
        return $this->db->table('cv')->countAll();
    }

    public function addResume($description)
    {
        $this->db->table('cv')->insert($description);
        return $this->insertID();
    }
    
    // public function updateResumeDescription($id, $description)
    // {
    //     $this->db->table('cv')->update($id, $description);
    // }
    
    public function getPersinfo($attribute)
    {
        return $this->select(['E.*', 
                            'U.*',
                            'CV.description',
                            'GROUP_CONCAT(P.idProfil) as idProfil, GROUP_CONCAT(P.intitule SEPARATOR " - ") as profils'
                        ])
                    ->from($this->table. ' AS E', true)
                    ->join('utilisateur AS U', 'U.idUtilisateur = E.idUtilisateur')
                    ->join('cv AS CV', 'E.idCV = CV.idCV', 'left')
                    ->join('profil_cv AS PCV', 'PCV.idCV = CV.idCV', 'left')
                    ->join('profil AS P', 'P.idProfil = PCV.idProfil')
                    ->where('E.idEtudiant', $attribute)
                    ->first();
    }
    
    public function add_persinfos($data, $profiles) 
    {
        $this->db->table($this->table)->insert($data);

        $this->db->table('profil_cv')->insertBatch($profiles);
    }


     public function getCV_by_id($id)
    {
        return $this->db->table('cv')->where('idCV', $id)
            ->get()->getRow();
    }


    public function edit_persinfos($student_id, $data, $resume)
    {
        $this->db->table($this->table)->update($data, $student_id);
        // $this->db->table('cv')->delete(array('idCV' => $resume));

        // $this->db->table('profil_cv')->delete(array('idCV' => $resume));
        // $this->db->table('profil_cv')->insertBatch($profiles);

        
        // $result = array();
        // if (is_array($profiles) || is_object($profiles)){
        //     foreach($profiles AS $profil){
        //         $result[] = array(
        //             'idCV'   => $resume,
        //             'idProfil'   => $profil
        //         );
        //     } 
        
        //     $this->db->table('profil_cv')->insertBatch($result);
        // }
    }

}