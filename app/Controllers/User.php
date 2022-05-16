<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OffreModel;


class User extends BaseController
{
	public function __construct()
	{
		$this->model = new UserModel();
	}

	/**
	 * Celle-ci est la methode principale.
	 * Celle qui renvoie a la page d'accueil
	 */
	public function index()
	{
		$data = [];
		$data['fieldOffersCount'] = (new OffreModel())->getFieldOffersCount();
		$data['offersCount'] 		= 	(new OffreModel())->offersNumbers();
		$data['offers'] = (new OffreModel())->lastsoffers();
		$data['offers_'] = (new OffreModel())->lastsoffers();

		$this->charger('index', $data);
	}

	public function user_info($id)
	{
		$data = $this->model->getUser($id);

		echo json_encode($data);
	}

	/**
	 * Methode connexion de l'utilisateur
	 * Elle redirige l'utilisateur vers la page 'dashboard'
	 * ou La page de connexion avec comme message:
	 * 	Login ou mot de passe incorrect
	 * 	ou Compte desactive si l'attribut actif est faux
	 */
	public function login()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {

			//Regles de validation des donnees 
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]',
			];

			$errors = [
				'email' => [
					'valid_email' => 'Adresse email incorrect'
				],
				'password' => [
					'required' => 'Le champ {field} est obligatoire',
					'validateUser' => 'adresse email ou mot de passe incorrect'
				]
			];

			if (!$this->validate($rules, $errors)) {
				// Une erreur de validation sera renvoye si les donnees sont invalides 
				$data['validation'] = $this->validator;
			} else {

				$user = $this->model->getUser($this->request->getVar('email'));

				$session = session();
				if (!$user['actif']) {
					$session->setFlashdata('warning', 'Vous ne pouvez pas vous connecter, votre compte est désactivé');
					return redirect()->to(base_url('/connexion'));
				}

				$session->set(['role' 		=> $this->model->getRole($user['idUtilisateur'])['intitule']]);
				$session->set(['isAdmin'	=> $this->model->isAdmin($user['idUtilisateur'])]);

				$this->model->setUserSession($user);

				return redirect()->to(base_url('/tableau_de_bord'));
			}
		}

		$this->charger('login', $data);
	}

	/**
	 * Methode inscription d'un utilisateur
	 * 
	 */
	public function register()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {

			//Règles de Validation des donnees
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[2]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[utilisateur.email]',
				'password' => 'required|min_length[8]|max_length[50]',
				'password_confirm' => 'matches[password]',
				'profil'	=> 'required'
				// 'code_etudiant' => 'norequired|min_length[5]|max_length[9]',
			];

			$errors = [
				'firstname' => [
					'required' => 'Le champ prénom est obligatoire',
					'min_length' => 'Le prénom doit contenir au moins 3 caractères'
				],
				'lastname' => [
					'required' => 'Le champ nom est obligatoire',
					'min_length' => 'Le nom doit contenir au moins 2 caractères'
				],
				'email' => [
					'required' => 'Le champ email est obligatoire',
					'valid_email' => 'Adresse email incorrect',
					'is_unique' => 'Cette adresse email a déjà un compte'
				],
				'password' => [
					'required' => 'Le champ mot de passe est obligatoire',
					'min_length' => 'Le mot de passe doit contenir au moins 8 caractères',
					'max_length' => 'Le mot de passe ne peut contenir plus de 50 caractères',
					'validateUser' => 'Adresse email ou mot de passe incorrect'
				],
				'password_confirm' => [
					'matches' => 'Vous devez répéter le même mot de passe pour le confirmer'
				],
				'profil' => [
					'required' => 'Vous ne pouvez pas créer de compte sans préciser qui vous êtes'
				]
			];

			if (!$this->validate($rules, $errors)) {
				// Une erreur de validation sera renvoye si les donnees sont invalides
				$data['validation'] = $this->validator;
			} else {

				$newData = [
					'prenom' 		=> 	$this->request->getVar('firstname'),
					'nom' 			=> 	$this->request->getVar('lastname'),
					'email' 		=>	$this->request->getVar('email'),
					'password' 		=>	password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
					'code_etudiant'	=> 	$this->request->getVar('code_etudiant'),
				];


				$ufr = $this->request->getVar('ufr');
				if ($ufr != 'null')
					$newData['idUfr'] = $ufr;

				$role = $this->request->getVar('profil');
				$user = $this->model->saveUser($newData, $role);

				session()->set(['role' => $this->model->getRole($user)['intitule']]);
				session()->set(['isAdmin' => $this->model->isAdmin($user)]);

				$user = $this->model->getUser($user);

				$this->model->setUserSession($user);

				return redirect()->to(base_url('/tableau_de_bord'));
			}
		}

		$data['ufrs']		= 	$this->model->getUfrs();
		$data['sections']	= 	$this->model->getSections();
		$data['roles']		=	$this->model->getRoles();

		$this->charger('register', $data);
	}

	/**
	 * Methode permettant a utilisateur de modifier ses informations 
	 */
	public function edit()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//Règles de validation
			if ($this->request->getPost('password') != '') {
				$rules['password'] = 'required|min_length[8]|max_length[50]';
				$rules['password_confirm'] = 'matches[password]';

				if (!$this->validate($rules)) {
					// Une erreur de validation sera renvoye si les donnees sont invalides
					$data['validation'] = $this->validator;
				} else {
					$newData = [
						'idUtilisateur' => session()->get('id'),
						'password' => $this->request->getVar('password')
					];
					$this->model->save($newData);
					session()->setFlashdata('success', 'Modification effectu&eacute;e avec succ&egrave;s');
					return redirect()->to(base_url('/tableau_de_bord'));
				}
			}
		}
		$data['user'] = $this->model->getUser(session()->get('id'));
		$this->charger('/profile', $data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/'));
	}

	/**
	 * Methode permettant d'activer ou desactiver un compte
	 * Elle recoit l'identifiant et l'etat d'activation du compte
	 */
	public function activate($id, $is_active)
	{

		$ret = $this->model->activate($id, $is_active);
		$session = session();

		if ($ret)
			$session->setFlashdata('success', 'Operation reussie');
		else
			$session->setFlashdata('danger', 'Erreur d\'activation');

		return redirect()->to(base_url('/admin/utilisateurs'));
	}

	public function inactives()
	{
		$data = [];

		$data['users'] = $this->model->getInactivesUsers();

		if (!session()->get('isAdmin'))
			return redirect()->to(base_url('/'));

		$this->adminPage('admin/users/inactive', $data);
	}

	public function students()
	{
		$data = [];

		$data['students'] = $this->model->getACategoryOfUsers('etudiant');


		if (!session()->get('isAdmin'))
			return redirect()->to(base_url('/'));

		$this->adminPage('admin/student/index', $data);


	}

	public function getEtudiantCandidatures($id){

		$data = [];
		$data['mycandidacies'] 	=	(new OffreModel())->getStudentCandidacies($id);
		$this->charger('admin/student/candidatures', $data);


	}


	public function users()
	{
		$data = [];

		$data['users']		= 	$this->model->getUsers();
		$data['ufrs'] 		= 	$this->model->getUfrs();
		$data['sections']	= 	$this->model->getSections();

		if (!session()->get('isAdmin'))
			return redirect()->to(base_url('/'));

		$this->adminPage('admin/users/index', $data);
	}

	public function get_email($id){
		$data = (new UserModel())->getEmail($id);
		echo json_encode($data);

	}

	public function send_mail()
	{
		helper('form', 'url');

		$data = array(
			'objet' => $this->request->getVar('objet'),
			'contenu' => $this->request->getVar('contenu'),
			'email' => $this->request->getVar('email'),
		);

		echo json_encode($data);
	}
		

}
