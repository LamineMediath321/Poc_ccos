<!doctype html>
<html lang="fr">
<!-- index35:56-->

<head>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/icon.png'); ?>" />

    <!-- Basic Page Needs==================================================-->
    <title>Plateforme Opportunit&eacute;s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/css/plugins.css'); ?>">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="<?php echo base_url('assets/css/colors/green-style.css'); ?>">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="<?php echo base_url('assets/css/colors/entreprise.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <div class="Loader"></div>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="navbar-header">
                    <h3 class="logo"> <a href="<?= base_url(); ?>"> Plateforme <span> Opportunit&eacute;s</span> </a></h3>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">

                    <ul class="nav navbar-nav navbar-right text-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="<?= base_url() ?>">Accueil</a></li>
                        <li>
                            <a class="nav-link" href="<?php echo base_url(); ?>/offres">
                                Offres
                            </a>
                        </li>

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="menu-icon fa fa-briefcase"></i>R&eacute;ferentiels
                            </a>
                            <ul class="sub-menu children dropdown-menu text-center">
                                <a href="<?php session()->set(['AsVisitor' => TRUE]);
                                            echo base_url(); ?>/entreprises">
                                    Entreprises
                                </a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/formations">
                                    Formations
                                </a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/competences">
                                    Comp&eacute;tences
                                </a>
                            </ul>
                        </li>
                        <li class="left-br">
                            <?php if (!session()->get('isLoggedIn')) : ?>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-home"></i>Mon Espace
                            </a>
                            <ul class="sub-menu children dropdown-menu text-center">
                                <a href="<?php echo base_url(); ?>/connexion">
                                    Connexion
                                </a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/register">
                                    Inscription
                                </a>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'etudiant') : ?>
                        <a href="<?php echo base_url(); ?>/monCv" class="signin">Mon cv</a>
                    <?php endif; ?>
                    </li>
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fa fa-user"></i> <?= session()->get('prenom') ?>
                            </a>
                            <ul class="sub-menu children dropdown-menu text-center">
                                <!--div class="dropdown-menu dropdown-with-icons"-->
                                <a href="<?php echo base_url(); ?>/dashboard" class="dropdown-item">
                                    Mon profil
                                </a>
                                <a href="<?php echo base_url(); ?>/profile" class="dropdown-item">
                                    Changer de mot de passe
                                </a>
                                <a href="<?php echo base_url(); ?>/logout" class="dropdown-item">
                                    <i class="fa fa-sign-out"></i> Se déconnecter
                                </a>
                            </ul>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>