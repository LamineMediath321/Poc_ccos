<?php

namespace App\Models;

use CodeIgniter\Model;


class EntrepriseModel extends Model
{
    protected $table = 'entreprise';
    protected $allowedFields = ['nom', 'idPointFocal', 'presentation', 'logo', 'adresse', 'siteWeb', 'archive'];

    protected $db;

    const ORDERABLE = [
        1 => 'nom',
        2 => 'presentation',
        3 => 'adresse'
    ];
    public $orderable = ['nom', 'presentation', 'adresse'];

    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('entreprise');
    }

    public function get_by_id($id)
    {
        return $this->select([
            'E.*, 
                        P.prenom, 
                        P.nom AS nomPF, 
                        V.nom AS nomV, 
                        GROUP_CONCAT(S.idSecteur) as idSecteur, 
                        GROUP_CONCAT(S.intitule SEPARATOR ",") as intitule'
        ])
            ->from($this->table . ' AS E', true)
            ->join('pointfocal AS P', 'P.idPointFocal = E.idPointFocal', 'left')
            ->join('secteur_entreprise AS SE', 'SE.idEntreprise = E.idEntreprise')
            ->join('secteur AS S', 'SE.idSecteur = S.idSecteur')
            ->join('ville AS V', 'V.idVille = E.idVille', 'left')
            ->where('E.idEntreprise', $id)
            ->first();
    }

    public function get_entreprises($city = null, $nomEntreprise = null, $perPage = null, $offset = null)
    {

        if ($city != null && $nomEntreprise != null) {
            return $this->select(['E.*', 'P.prenom', 'P.nom AS nomPF', 'V.nom'])
                ->from($this->table . ' AS E', true)
                ->join('pointfocal AS P', 'E.idPointFocal = P.idPointFocal', 'left')
                ->join('ville AS V', 'E.idVille = V.idVille', 'left')
                ->where('E.archive', '0')
                ->where('V.nom', $city)
                ->where('E.nomEntreprise', $nomEntreprise)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($city != null && $nomEntreprise == null) {
            return $this->select(['E.*', 'P.prenom', 'P.nom AS nomPF', 'V.nom'])
                ->from($this->table . ' AS E', true)
                ->join('pointfocal AS P', 'E.idPointFocal = P.idPointFocal', 'left')
                ->join('ville AS V', 'E.idVille = V.idVille', 'left')
                ->where('E.archive', '0')
                ->where('V.nom', $city)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($city == null && $nomEntreprise != null) {
            return $this->select(['E.*', 'P.prenom', 'P.nom AS nomPF', 'V.nom'])
                ->from($this->table . ' AS E', true)
                ->join('pointfocal AS P', 'E.idPointFocal = P.idPointFocal', 'left')
                ->join('ville AS V', 'E.idVille = V.idVille', 'left')
                ->where('E.archive', '0')
                ->where('E.nomEntreprise', $nomEntreprise)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } else {
            return $this->select(['E.*', 'P.prenom', 'P.nom AS nomPF', 'V.nom'])
                ->from($this->table . ' AS E', true)
                ->join('pointfocal AS P', 'E.idPointFocal = P.idPointFocal', 'left')
                ->join('ville AS V', 'E.idVille = V.idVille', 'left')
                ->where('E.archive', '0')
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        }
    }

    public function get_all()
    {
        return $this->select(['E.*', 'P.prenom', 'P.nom AS nomPF', 'V.nom'])
            ->from($this->table . ' AS E', true)
            ->join('pointfocal AS P', 'E.idPointFocal = P.idPointFocal', 'left')
            ->join('ville AS V', 'E.idVille = V.idVille', 'left')
            ->where('E.archive', '0')
            ->get()->getResultArray();
    }


    public function companiesNumbers()
    {
        return $this->db->table($this->table)->countAll();
    }

    public function getListe() {
        
        return $this->asArray()->findAll();
    }

    public function getPFbyid($id)
    {
        $this->db->table('pointfocal');
        $builder = $this->asArray()->find($id);
        return $builder;
    }

    public function getEntrepriseId($idPointFocal)
    {
        return $this->select('idEntreprise')
            ->where('idPointFocal', $idPointFocal)
            ->first();
    }

    public function getEntreprise($idPointFocal)
    {
        return $this->select(['E.*, GROUP_CONCAT(S.idSecteur) as idSecteur, GROUP_CONCAT(S.intitule SEPARATOR ",") as intitule'])
            ->from($this->table . ' AS E', true)
            ->join('secteur_entreprise AS SE', 'E.idEntreprise = SE.idEntreprise', 'left')
            ->join('secteur AS S', 'SE.idSecteur = S.idSecteur')
            ->where('E.idEntreprise', $idPointFocal)
            ->first();
    }

    public function getSecteurs()
    {
        $sql = "SELECT * FROM secteur";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function getCityByName($name)
    {
        return $this->select('idVille')
            ->from('ville', true)
            ->where('nom', $name)
            ->first();
    }

    public function addCity($data)
    {
        $this->db->table('ville')->insert($data);

        return $this->insertID();
    }

    public function delete_ent($id)
    {
        $this->db->table($this->table)->update(array("archive" => '1'), array('idEntreprise' => $id));
        //$this->db->table($this->table)->delete(array('idEntreprise'=>$id));
    }

    //----------------------------
    public function update_ent($id, $ent, $sec)
    {
        $this->db->table($this->table)->update($ent, $id);
        $this->db->table('secteur_entreprise')->delete(array('idEntreprise' => $id));

        $result = array();
        if (is_array($sec) || is_object($sec)) {
            foreach ($sec as $key => $val) {
                $result[] = array(
                    'idEntreprise'   => $id,
                    'idSecteur'   => $_POST['secteur'][$key]
                );
            }
            $this->db->table('secteur_entreprise')->insertBatch($result);
        }
        //MULTIPLE INSERT TO DETAIL TABLE
    }

    //-----------------------------
    public function add_ent($ent, $sec)
    {

        $query = $this->db->table($this->table)->insert($ent);
        //RECUPERER ID ENTREPRISE
        $ent_id = $this->insertID();
        $result = array();
        foreach ($sec as $key => $val) {
            $result[] = array(
                'idEntreprise'   => $ent_id,
                'idSecteur'   => $_POST['secteur'][$key]
            );
        }
        //MULTIPLE INSERTION A LA TABLE SECTEUR_ENTREPRISE
        $this->db->table('secteur_entreprise')->insertBatch($result);
    }

    public function getEntrepriseByName($name)
    {
        return $this->select('idEntreprise')
            ->where('nomEntreprise', $name)
            ->first();
    }

    public function addEntrepriseByName($data)
    {
        $this->db->table($this->table)->insert($data);

        return $this->insertID();
    }

    public function entreprisesCount($ville)
    {
        return  $this->select('COUNT(E.idVille) AS villes')
            ->from($this->table . ' AS E', true)
            ->join('ville AS V', 'E.idVille = V.idVille', 'left')
            ->where('V.nom', $ville)
            ->get()->getRow();
    }

    public function add_secteur($secteur)
    {
        $this->db->table('secteur')->insert($secteur);
    }

    public function getSecteur($id)
    {
        return $this->select('s.*')
            ->from('secteur AS s', true)
            ->where('s.idSecteur', $id)
            ->get()->getRow();
    }

    public function update_secteur($id, $data)
    {
        $this->db->table('secteur')->update($id, $data);
    }

    public function getVilleEntreprises($ville)
    {
        return  $this->select('E.nomEntreprise AS entreprises')
            ->from($this->table . ' AS E', true)
            ->join('ville AS V', 'E.idVille = V.idVille', 'left')
            ->where('V.nom', $ville)
            ->get()->getResult();
    }

    public function getCompanyByName($company)
    {
        return $this->select('idEntreprise')
            ->where('nomEntreprise', $company)
            ->first();
    }

    public function addCompany($company)
    {
        $this->db->table($this->table)->insert($company);

        return $this->insertID();
    }

    public function searchCompanieWithCriteria($nomEntreprise, $city, $perPage = 0, $offset = 1)
    {

        $conditions = array();
        $conditions[] = 'entreprise.nomEntreprise LIKE "%' . $nomEntreprise . '%"';
        $conditions[] = 'entreprise.nom LIKE "%' . $city . '%"';
        $query = "SELECT * FROM entreprise WHERE " . implode(' AND ', $conditions) . "LIMIT ${perPage},${offset}";
        return $this->db->query($query)->getResultArray();
    }
}
