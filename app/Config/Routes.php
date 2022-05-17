<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->match(['get', 'post'], 'entreprises', 'Entreprise::index');
// $routes->get('entreprises', 'Entreprise::index');
$routes->get('formations', 'Formation::formations');
$routes->match(['get', 'post'], 'competences', 'Competence::competences');
$routes->get('admin/offre/(:any)', 'Offre::show/$1', ['filter' => 'auth']);
$routes->get('/offre/(:any)', 'Offre::show/$1');
$routes->get('offres', 'Offre::index');
$routes->get('domaine_offres/(:any)', 'Offre::fieldOffers/$1');
$routes->get('logout', 'User::logout');
$routes->get('/connexion', 'User::login', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'register', 'User::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'profile', 'User::edit', ['filter' => 'auth']);
$routes->get('tableau_de_bord', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('ajout_entreprise', 'Entreprise::create_company', ['filter' => 'auth']);
$routes->get('/mes_candidatures', 'Offre::my_candidacies', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/Offre/recherche', 'Offre::search_offer');
$routes->match(['get', 'post'], '/Offre/recherche/(:any)', 'Offre::search_offer/$1');
$routes->match(['get', 'post'], 'monCv', 'Cv::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'cv/(:any)', 'Cv::cv/$1', ['filter' => 'auth']);


// Admin routes
$routes->get('admin/utilisateurs', 'User::users', ['filter' => 'auth']);
$routes->get('admin/utilisateurs/inactifs', 'User::inactives', ['filter' => 'auth']);
$routes->get('admin/user/activate/(:any)', 'User::activate/$1/$2', ['filter' => 'auth']);
$routes->get('admin/etudiants', 'User::students', ['filter' => 'auth']);
$routes->get('admin/CVtheque', 'Cv::resumes', ['filter' => 'auth']);
$routes->get('admin/entreprises', 'Entreprise::getListeEntreprise', ['filter' => 'auth']);
$routes->get('admin/categories', 'Offre::etudiantPostule', ['filter' => 'auth']);
$routes->get('admin/secteurs', 'Secteur::getSecteurs', ['filter' => 'auth']);
$routes->get('admin/domaines', 'Domaine::index', ['filter' => 'auth']);
$routes->get('admin/profils', 'Profil::index', ['filter' => 'auth']);
$routes->get('admin/offres', 'Offre::getOffersByAdmin', ['filter' => 'auth']);
$routes->get('admin/types_contrat', 'TypeContrat::index', ['filter' => 'auth']);
$routes->get('admin/competences', 'Competence::admin_competences', ['filter' => 'auth']);
$routes->get('admin/candidatures/(:any)', 'User::getEtudiantCandidatures/$1/$2', ['filter' => 'auth']);
$routes->get('admin/cv/(:any)', 'Cv::cv/$1/$2', ['filter' => 'auth']);


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
