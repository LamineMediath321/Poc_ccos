<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Models\EntrepriseModel;
use App\Models\FormationModel;
use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	protected $model;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	public function adminPage($page, $data)
	{
		session()->set(['AsVisitor' => FALSE]);

		echo view('templates/admin/sidebar');
		echo view($page, $data);
		echo view('templates/footer');
	}

	/* Cette methode permet de charger une pages avec ses layout : footer et header */
	public function charger($page, $data = [])
	{
		session()->set(['AsVisitor' => TRUE]);

		echo view('templates/header');
		echo view($page, $data);
		echo view('templates/footer');
	}

	public function getCitiesFormationsNCompanies()
	{
		$data = [];

		$entrepriseModel = new EntrepriseModel();
		$formationModel = new FormationModel();
		$villes = $formationModel->getCities();

		foreach ($villes as $ville) {
			$data[] = [
				'ville' => $ville['nom'],
				'formationCount' =>	$formationModel->formationsCount($ville['nom'])->villes,
				'entrepriseCount' =>	$entrepriseModel->entreprisesCount($ville['nom'])->villes,
			];
		}

		return json_encode($data);
	}
}
