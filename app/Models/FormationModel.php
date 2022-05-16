<?php namespace App\Models;

use CodeIgniter\Model;


class FormationModel extends Model{
    protected $table = 'formation';
    protected $allowedFields = ['idFormation','idVille','idEtablissement','typeFormation','diplomeEquivalent','intituleDiplome','debouches', 'description'];
   
    protected $db;
    
    
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function get_by_id($id) 
    {
        return $this->select(['F.*', 
                        'E.nom AS etablissement', 
                        'D.idDomaine AS domaine', 
                        'N.idNiveauEtude AS niveau_etude'])
                    ->from($this->table. ' AS F', true)
                    ->join('etablissement AS E', 'E.idEtablissement = F.idEtablissement', 'left')
                    ->join('domaine_formation AS DF', 'DF.idFormation = F.idFormation', 'left')
                    ->join('domaine AS D', 'D.idDomaine = DF.idDomaine')
                    ->join('niveauetude_formation AS NF', 'F.idFormation = NF.idFormation', 'left')
                    ->join('niveauetude AS N', 'NF.idNiveauEtude = N.idNiveauEtude')
                    ->where('F.idFormation', $id)
                    ->get()->getRow();
    }

    public function add_formation($data, $field, $resume, $studyLevel) 
    {
        $this->db->table($this->table)->insert($data);
        $formation = $this->insertID();

        $formationFields = [
            'idDomaine'     =>  $field,
            'idFormation'   =>  $formation
        ];
        $this->db->table('domaine_formation')->insert($formationFields);

        $formationResume = [
            'idFormation'   =>  $formation,
            'idCV'          =>  $resume
        ];
        $this->db->table('formation_cv')->insert($formationResume);

        $formationStudyLevel = [
            'idFormation'   =>  $formation,
            'idNiveauEtude' =>  $studyLevel
        ];
        $this->db->table('niveauetude_formation')->insert($formationStudyLevel);
    }

    public function edit_formation($id, $data, $field, $studyLevel) 
    {
        $this->db->table($this->table)->update($data, $id);
      
        $formationFields = [
            'idDomaine'     =>  $field
        ];
        $this->db->table('domaine_formation')->update($formationFields, $id);

        $formationStudyLevel = [
            'idNiveauEtude' =>  $studyLevel
        ];
        $this->db->table('niveauetude_formation')->update($formationStudyLevel, $id);
    }

    public function delete_formation($id)
    {
        $this->db->table($this->table)->delete(array('idFormation'=>$id));
    }

    public function getFormationsList() 
    {    
        return $this->select(['F.*','E.nom AS nomEtab', 'V.nom AS nomVille'])
            ->from($this->table. ' AS F', true)
            ->join('ville AS V', 'F.idVille = V.idVille', 'left')
            ->join('etablissement AS E', 'F.idEtablissement = E.idEtablissement', 'left')
            ->get()->getResultArray();
    }

    public function getResumeFormations($resume)
    {
        return $this->select(['F.idFormation',
                            'F.description', 
                            'E.nom AS etablissement', 
                            'F.dateDebut',
                            'F.dateFin',
                            'D.intitule AS domaine',
                            'N.intitule AS niveau_etude'
                        ])
                    ->from($this->table. ' AS F', true)
                    ->join('formation_cv AS FCV', 'F.idFormation = FCV.idFormation', 'left')
                    ->join('cv AS CV', 'FCV.idCV = CV.idCV')
                    ->join('etablissement AS E', 'E.idEtablissement = F.idEtablissement', 'left')
                    ->join('domaine_formation AS DF', 'F.idFormation = DF.idFormation', 'left')
                    ->join('domaine AS D', 'DF.idDomaine = D.idDomaine')
                    ->join('niveauetude_formation AS NF', 'F.idFormation = NF.idFormation', 'left')
                    ->join('niveauetude AS N', 'NF.idNiveauEtude = N.idNiveauEtude')
                    ->where('CV.idCV', $resume)
                    ->get()->getResultArray();
    }

    public function getCities()
    {
        return $this->select()
                    ->from('ville AS V', true)
                    ->get()->getResultArray();
    }
    
    public function getEtablissements()
    {
        return $this->select()
                ->from('etablissement', true)
                ->findAll();
    }
    public function getDebouches()
    {
        return $this->select()
                ->from('debouches', true)
                ->findAll();
    }

    public function getStudyLevels()
    {
        return $this->select()
                ->from('niveauetude', true)
                ->findAll();
    }
    
    public function formationsCount($ville)
    {
        return  $this->select('COUNT(F.idVille) AS villes')
        ->from($this->table. ' AS F', true)
        ->join('ville AS V', 'F.idVille = V.idVille', 'left')
        ->where('V.nom', $ville)
        ->get()->getRow();
    }

    public function getVilleFormations($ville)
    {
        return  $this->select('F.typeFormation AS formations')
        ->from($this->table. ' AS F', true)
        ->join('ville AS V', 'F.idVille = V.idVille', 'left')
        ->where('V.nom', $ville)
        ->get()->getResult();
    }

}

