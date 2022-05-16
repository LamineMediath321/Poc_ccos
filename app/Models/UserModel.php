<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
	protected $table = 'utilisateur';
	protected $allowedFields = ['prenom', 'nom', 'email', 'actif', 'password'];
	protected $primaryKey = "idUtilisateur";

	protected function passwordHash(array $data){
		if(isset($data['password']))
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		return $data;
	}

	public function saveUser($data, $role)
	{
		$this->db->table($this->table)->insert($data);

		$user_id = $this->insertID();
		$user_role = [
			'idUtilisateur' => $user_id,
			'idRole'  => $role
		];
		
		$this->db->table('utilisateur_role')->insert($user_role);

		return $user_id;
		
	}

	public function usersNumbers()
	{
		return $this->db->table($this->table)->countAll();
	}

	public function studentsNumbers()
	{
		return $this->like('R.intitule', 'etudiant')
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'UR.idUtilisateur = U.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->countAllResults();
	}

	public function alumniNumbers()
	{
		return $this->like('R.intitule', 'alumni')
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'UR.idUtilisateur = U.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->countAllResults();
	}

	public function getUser($attribute)
	{
		return $this->asArray()
					->where(['idUtilisateur' => $attribute])
					->orWhere(['email' => $attribute])
					->first();  
	}

	

	public function getEmail($id)
	{
		return $this->asArray()
					->where(['idUtilisateur' => $id])
					->first();  
	}

	public function getUsers()
	{
		return $this->select(['U.*', 'R.intitule AS role'])
					->from($this->table. ' AS U', true)
					->join('utilisateur_role AS UR', 'UR.idUtilisateur = U.idUtilisateur', 'left')
					->join('role AS R', 'R.idRole = UR.idRole')
					->get()->getResultArray();  
	}

	

	public function getRoles()
	{
		return $this->from('role AS R', true)
					->where('R.intitule !=', 'admin')
					->get()->getResultArray();
	}

    public function getACategoryOfUsers($role)
	{
		return $this->select(['U.*', 'ufr.intitule AS intituleUfr'])
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'UR.idUtilisateur = U.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->join('ufr', 'ufr.idUfr = U.idUfr', 'left')
                        ->Where('R.intitule', $role)
						->get()->getResultArray();  
	}

	public function getInactivesUsers()
	{
		return $this->select(['U.*', 'R.intitule AS role'])
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'UR.idUtilisateur = U.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->where('actif', 0)
						->get()->getResultArray();  
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['idUtilisateur'],
			'prenom' => $user['prenom'],
			'nom' => $user['nom'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function activate($id, $is_active)
	{
		
		try {
			$this->db->query("UPDATE utilisateur SET actif = !'$is_active'  
									WHERE idUtilisateur ='$id'");
			
			return true;
		} catch (\Throwable $th) {
			//throw $th;
			return false;
		}
	}

	public function getUsersWhereLike($field, $search)
	{
		$db = \Config\Database::connect();
		
		$sql = "SELECT * FROM utilisateur WHERE $field LIKE '%" . $db->escapeLikeString($search)."%' ESCAPE '!'";

		$query = $db->query($sql);
		
		return $query->getResultArray();
	}

	public function getRoleId($role)
	{
		return $this->select('idRole')
					->from('role')
					->where('intitule', $role)
					->first();
	}

	public function isAdmin($idUser)
	{
		$result = $this->select()
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'U.idUtilisateur = UR.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->where('R.intitule', 'admin')
						->where('U.idUtilisateur', $idUser)
						->first();
	
		if (empty($result))
		{
			return false;
		}

		return true;
	}

	public function getRole($idUser)
	{
		return $this->select('R.intitule')
						->from($this->table. ' AS U', true)
						->join('utilisateur_role AS UR', 'U.idUtilisateur = UR.idUtilisateur', 'left')
						->join('role AS R', 'R.idRole = UR.idRole')
						->where('U.idUtilisateur', $idUser)
						->first();
	
	}

	public function getUfrs()
	{
        return $this->select()
                    ->from('ufr', true)
                    ->get()->getResultArray();
	}

	public function getSections()
	{
        return $this->select()
                    ->from('section', true)
                    ->get()->getResultArray();
	}

}
