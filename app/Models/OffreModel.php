<?php

namespace App\Models;

use CodeIgniter\Model;

class OffreModel extends Model
{
    protected $table = 'offre';
    protected $primaryKey = "idOpportunite";


    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }


    public function offersNumbers()
    {
        return $this->db->table($this->table)->countAll();
    }

    //-----------------------Nombre de Stages ---------------------
    public function internshipsNumbers()
    {
        return $this->db->table($this->table . ' AS O')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat')
            ->where('tc.intitule', 'Stage')
            ->countAllResults();
    }

    //--------------------------Liste Offres ----------------------------------------
    public function get_all_offers($perPage = null, $offset = null)
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'op.statut',
            'E.nomEntreprise',
            'E.adresse',
            'E.logo',
            'tc.intitule AS contractType',
            'V.nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profil'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->where('O.archive', '0')
            ->limit($perPage, $offset)
            ->get()->getResultArray();
    }

    public function offerCandidaciesCount($offer_id)
    {
        return $this->select()
            ->from('opportunite_etudiant AS STDOP', true)
            ->where('STDOP.idOpportunite', $offer_id)
            ->groupBy('STDOP.idEtudiant')
            ->countAllResults();
    }

    public function lastsOffers()
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'op.statut',
            'E.nomEntreprise',
            'E.adresse',
            'E.logo',
            'tc.intitule AS contractType',
            'V.nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profil'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->limit(8)
            ->get()->getResultArray();
    }

    //--------------------------Une Offre ----------------------------------------
    public function getOf_by_id($id)
    {


        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'op.statut',
            'E.*',
            'tc.intitule AS contractType',
            'V.nom AS nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profile'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->where('O.idOpportunite', $id)
            ->first();
    }

    //----------------------------- Ajout Opportunite --------------------------------
    public function add_opportunite($op)
    {
        $this->db->table('opportunite')->insert($op);
        return $this->insertID();
    }
    //----------------------------- Ajout Offre --------------------------------
    public function add_offer($offre)
    {
        $this->db->table('offre')->insert($offre);
    }

    //----------------------------Update Opportunity --------------------------
    public function update_op($id, $op)
    {
        $this->db->table('opportunite')->update($op, $id);
    }

    //------------------------------------------------------------------------

    //----------------------------Update Offer --------------------------
    public function update_offer($id, $of)
    {
        $this->db->table($this->table)->update($of, $id);
    }

    /**Crud sur les candidatures des etudiants */
    public function delete_offer($id)
    {
        $this->db->table('offre')->update(array('archive' => '1'), array('idOpportunite' => $id));
    }

    public function valider_poste($id)
    {
        $this->db->table('opportunite_etudiant')->update(array('statut' => 'Validée'), array('idOpportunite' => $id));
    }

    public function rejeter_poste($id)
    {
        $this->db->table('opportunite_etudiant')->update(array('statut' => 'Rejetée') , array('idOpportunite' => $id));
    }
    //-----------------------------------------------------------------

    public function delete_poste($idPoste)
    {

        $this->db->table('opportunite_etudiant')->delete(['idOpportunite' => $idPoste]);
    }
    /**End of crud */

    public function apply_to_offer($etudiantId, $offerId)
    {
        date_default_timezone_set('Africa/Dakar'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $data = [
            'idEtudiant' => $etudiantId,
            'idOpportunite'  => $offerId,
            'date_postulee' => $now,
            'statut' => 'En attente'
        ];

        $this->db->table('opportunite_etudiant')->insert($data);
    }



    public function getStudentCandidacies($user_id)
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'STDOP.statut',
            'E.*',
            'tc.intitule AS contractType',
            'V.nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profile'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('opportunite_etudiant AS STDOP', 'O.idOpportunite = STDOP.idOpportunite', 'left')
            ->join('etudiant AS STD', 'STD.idEtudiant = STDOP.idEtudiant', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->where('STD.idUtilisateur', $user_id)
            ->get()->getResultArray();
    }

    public function getStudentPostule($perPage = null, $offset = null)
    {
        return $this->select([
            'STD.nom',
            'STD.prenom',
            'E.nomEntreprise',
            'STDOP.statut',
            'STDOP.date_postulee',
            'STD.idUtilisateur',
            'op.intitule',
            'STDOP.idOpportunite',
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite')
            ->join('opportunite_etudiant AS STDOP', 'O.idOpportunite = STDOP.idOpportunite')
            ->join('etudiant AS STD', 'STD.idEtudiant = STDOP.idEtudiant')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude')
            ->join('ville AS V', 'O.idVille = V.idVille')
            ->join('profil AS P', 'O.idProfil = P.idProfil')
            ->limit($perPage, $offset)
            ->get()->getResultArray();
    }

    public function haveApply($idStudent, $idOffer)
    {
        return $this->select()
            ->from('opportunite_etudiant AS STDOP', true)
            ->where('STDOP.idOpportunite', $idOffer)
            ->where('STDOP.idEtudiant', $idStudent)
            ->first();
    }

    public function getOfferCandidacies($offer_id,$perPage = null, $offset = null)
    {
        return $this->select([
            'STD.nom',
            'STD.prenom',
            'E.nomEntreprise',
            'STDOP.statut',
            'STDOP.date_postulee',
            'STD.idUtilisateur',
            'op.intitule',
            'STDOP.idOpportunite',
            'O.dateCloture'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite')
            ->join('opportunite_etudiant AS STDOP', 'O.idOpportunite = STDOP.idOpportunite')
            ->join('etudiant AS STD', 'STD.idEtudiant = STDOP.idEtudiant')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude')
            ->join('ville AS V', 'O.idVille = V.idVille')
            ->join('profil AS P', 'O.idProfil = P.idProfil')
            ->where('O.idOpportunite', $offer_id)
            ->limit($perPage, $offset)
            ->get()->getResultArray();
    }

    public function getCompanyOffersCandidacies($idCompany)
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'E.*',
            'STD.*',
            'tc.intitule AS contractType',
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('opportunite_etudiant AS STDOP', 'O.idOpportunite = STDOP.idOpportunite', 'left')
            ->join('etudiant AS STD', 'STD.idEtudiant = STDOP.idEtudiant')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->where('O.idEntreprise', $idCompany)
            ->groupBy('O.idOpportunite, STD.idEtudiant')
            ->get()->getResultArray();
    }

    public function getCompanyOffersCandidaciesCount($idCompany)
    {
        return $this->select()
            ->from('opportunite_etudiant AS STDOP', true)
            ->join($this->table . ' AS O',  'O.idOpportunite = STDOP.idOpportunite', 'left')
            ->where('O.idEntreprise', $idCompany)
            ->countAllResults();
    }

    public function companyOffersNumbers($idCompany)
    {
        return $this->select(['count(O.idOpportunite) as total'])
            ->from($this->table . ' AS O')
            ->where('O.idEntreprise', $idCompany)
            ->groupBy('O.idOpportunite')
            ->countAllResults();
    }

    public function getCompanyOffers($idCompany)
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'op.statut',
            'E.nomEntreprise',
            'E.adresse',
            'E.logo',
            'tc.intitule AS contractType',
            'V.nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profil'
        ])
            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->where('O.idEntreprise', $idCompany)
            ->get()->getResultArray();
    }

    public function getFieldOffersCount()
    {
        return $this->select(['D.*', 'count(O.idOpportunite) as total'])
            ->from('domaine AS D', true)
            ->join('profil AS P', 'P.idDomaine = D.idDomaine', 'left')
            ->join($this->table . ' AS O', 'O.idProfil = P.idProfil', 'left')
            ->groupBy('idDomaine')
            ->get()->getResultArray();
    }

    public function getFieldOffers($field, $perPage = null, $offset = null)
    {
        return $this->select([
            'O.*', 'op.intitule AS title',
            'op.datePublication',
            'op.statut',
            'E.nomEntreprise',
            'E.adresse',
            'E.logo',
            'tc.intitule AS contractType',
            'V.nom',
            'NE.intitule AS studyLevel',
            'P.intitule AS profil'
        ])

            ->from($this->table . ' AS O', true)
            ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
            ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
            ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
            ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
            ->join('ville AS V', 'O.idVille = V.idVille', 'left')
            ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
            ->where('P.idDomaine', $field)
            ->limit($perPage, $offset)
            ->get()->getResultArray();
    }

    public function searchOfferWithCriteria($profil = null, $city = null, $typeContract = null, $perPage = null, $offset = null)
    {
        if ($profil != null && $city != null && $typeContract != null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('P.intitule', $profil)
                ->where('V.nom', $city)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($profil == null && $city != null && $typeContract != null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('tc.intitule', $typeContract)
                ->where('V.nom', $city)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($profil != null && $city == null && $typeContract != null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('P.intitule', $profil)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($profil != null && $city != null && $typeContract == null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('P.intitule', $profil)
                ->where('V.nom', $city)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($profil != null && $city == null && $typeContract == null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('P.intitule', $profil)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($profil == null && $city != null && $typeContract == null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('V.nom', $city)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } elseif ($city == null && $profil == null && $typeContract != null) {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->where('tc.intitule', $typeContract)
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        } else {
            return $this->select([
                'O.*', 'op.intitule AS title',
                'op.datePublication',
                'op.statut',
                'E.nomEntreprise',
                'E.adresse',
                'E.logo',
                'tc.intitule AS contractType',
                'V.nom',
                'NE.intitule AS studyLevel',
                'P.intitule AS profil'
            ])

                ->from($this->table . ' AS O', true)
                ->join('opportunite AS op', 'O.idOpportunite = op.idOpportunite', 'left')
                ->join('entreprise AS E', 'O.idEntreprise = E.idEntreprise', 'left')
                ->join('typecontrat AS tc', 'O.idTypeContrat = tc.idTypeContrat', 'left')
                ->join('niveauetude AS NE', 'O.idNiveauEtude = NE.idNiveauEtude', 'left')
                ->join('ville AS V', 'O.idVille = V.idVille', 'left')
                ->join('profil AS P', 'O.idProfil = P.idProfil', 'left')
                ->limit($perPage, $offset)
                ->get()->getResultArray();
        }
    }
}
