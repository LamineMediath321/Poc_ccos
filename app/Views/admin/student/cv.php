<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@icon/entypo@1.0.3/entypo.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 ">
            <div class="card left-profile-card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= $resume ? base_url() . '/assets/images/' . $persinfo['photo'] : base_url() . '/assets/images/avatar.png' ?>" width="133" height="133" alt="photo de profil">
                        <h4> <?= ucfirst($persinfo['prenom']) . ' ' . strtoupper($persinfo['nom']) ?></h4>
                        <span class="designation text-muted">
                            <?= $resume && $persinfo['profils'] ? $persinfo['profils'] : '' ?>
                        </span>

                    </div>
                    <div class="personal-info">
                        <h3 class="mt-3">Information personnelles</h3>
                        <ul class="personal-list">
                            <!-- <li><i class="fas fa-briefcase "></i><span>Web Designer</span></li> -->
                            <li><i class="fas fa-map-marker-alt "></i><span><?= $resume ? $persinfo['adresse'] : ' - - - ' ?></span></li>
                            <li><i class="far fa-envelope "></i><span><?= $resume ? $persinfo['email'] : ' - - - ' ?></span></li>
                            <li><i class="fas fa-mobile "></i><span><?= $resume ? $persinfo['telephone'] : ' - - - ' ?></span></li>
                        </ul>
                    </div>
                    <div class="skill">
                        <?php if ($userSkills) { ?>
                            <h3>Competences</h3>
                            <?php foreach ($userSkills as $skill) { ?>
                                <p><?= $skill['intitule'] ?></p>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="languages">
                        <?php if ($userLanguages) { ?>
                            <h3>Langues</h3>
                            <?php foreach ($userLanguages as $language) { ?>
                                <p> <?= $language['intitule'] ?> :
                                    <span class="badge badge-info"><small><?= $language['niveau'] ?></small></span>
                                </p>

                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card right-profile-card">
                <div class="card-header" style="background-color: #272c33;">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-selected="true">Experience Professionnelle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-education-tab" data-toggle="pill" href="#pills-education" role="tab" aria-selected="false">Formation</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p>
                                <?= $resume ? $persinfo['description'] : '' ?>
                            </p>
                            <?php if ($experiences) {
                                foreach ($experiences as $experience) { ?>

                                    <div class="work-container">
                                        <h3><?= $experience['intitulePoste'] ?> <small class="text-info"><?= $experience['employeur'] ?></small></h3>
                                        <h4><i class="far fa-calendar-alt"></i> <?php
                                                                                setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                                                echo strftime("%b %G", strtotime($experience['dateDebut']));
                                                                                ?> à <span class="badge badge-info"> <?php
                                                                                                                        setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                                                                                        echo strftime("%b %G", strtotime($experience['dateFin']));
                                                                                                                        ?>
                                            </span></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</br><?= $experience['realisation'] ?></p>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="text-center alert-info">Pas d'informations sur son Expérience</div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="pills-education" role="tabpanel">
                            <?php if ($formations) {
                                foreach ($formations as $formation) { ?>
                                    <div class="work-container">
                                        <h3><?= $formation['etablissement'] ?></h3>
                                        <p class="">
                                            <span class=""><?= $formation['niveau_etude'] ?> en <?= $formation['domaine'] ?></span>
                                        </p>
                                        <h4><i class="far fa-calendar-alt"></i> <?php
                                                                                setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                                                echo strftime("%b %G", strtotime($formation['dateDebut']));
                                                                                ?> à <span class="badge badge-info"> <?php
                                                                                                                        setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                                                                                        echo strftime("%b %G", strtotime($formation['dateFin']));
                                                                                                                        ?></span></h4>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="text-center alert-info">Pas d'information sur sa formation</div>
                            <?php } ?>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>
    <div class="row ml-3">
        <h2 class="text-center mb-2">Liste des candidatures de <?= $persinfo['prenom'] ?> <?= $persinfo['nom'] ?></h2>
        <div class="col-xl-11 text-center">
            <!-- Start My Candidacies List -->
            <div class="tab-pane">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Nom entreprise</td>
                                    <td>Intutile offre</td>
                                    <td>Statut</td>
                                    <td>Action(s)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mycandidacies as $offer) { ?>
                                    <tr>
                                        <td><?= $offer['nomEntreprise'] ?></td>
                                        <td><?= $offer['title'] ?></td>


                                        <td>
                                            <?php if ($offer['statut'] === "Validée") { ?>
                                                <span class="alert-success"><?php echo $offer['statut'] ?></span>
                                            <?php } elseif ($offer['statut'] === "Rejetée") { ?>
                                                <span class="alert-danger"><?php echo $offer['statut'] ?></span>
                                            <?php } else { ?>
                                                <span class="alert-info"><?php echo $offer['statut'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="">
                                            <div class="btn-group-sm">
                                                <a class="btn btn-primary" href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>"><i class="fa fa-eye"></i>
                                                </a>
                                                <?php if ($offer['statut'] == "En attente") { ?>
                                                    <a class="btn btn-danger" href="#" onclick="delete_poste(<?php echo $offer['idOpportunite']; ?>)"><i class="fa fa-trash-o"></i></a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End My Candidacies List -->

        </div>
    </div>
</div>

<style>
    /*profile page*/

    .left-profile-card .user-profile {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: auto;
        margin-bottom: 20px;
    }

    .left-profile-card h3 {
        font-size: 18px;
        margin-bottom: 0;
        font-weight: 700;
    }

    .left-profile-card p {
        margin-bottom: 5px;
    }

    .left-profile-card .progress-bar {
        background-color: var(--main-color);
    }

    .personal-info {
        margin-bottom: 30px;
    }

    .personal-info .personal-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .personal-list li {
        margin-bottom: 5px;
    }

    .personal-info h3 {
        margin-bottom: 10px;
    }

    .personal-info p {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .personal-info i {
        font-size: 15px;
        color: var(--main-color);
        ;
        margin-right: 15px;
        width: 18px;
    }

    .skill {
        margin-bottom: 30px;
    }

    .skill h3 {
        margin-bottom: 15px;
    }

    .skill p {
        margin-bottom: 5px;
    }

    .languages h3 {
        margin-bottom: 15px;
    }

    .languages p {
        margin-bottom: 5px;
    }

    .right-profile-card .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: var(--main-color);
    }

    .right-profile-card .nav>li {
        float: left;
        margin-right: 10px;
    }

    .right-profile-card .nav-pills .nav-link {
        border-radius: 26px;
    }

    .right-profile-card h3 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .right-profile-card h4 {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .right-profile-card i {
        font-size: 15px;
        margin-right: 10px;
    }

    .right-profile-card .work-container {
        border-bottom: 1px solid #eee;
        margin-bottom: 20px;
        padding: 10px;
    }


    /*timeline*/

    .img-circle {
        border-radius: 50%;
    }

    .timeline-centered {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-centered:before,
    .timeline-centered:after {
        content: " ";
        display: table;
    }

    .timeline-centered:after {
        clear: both;
    }

    .timeline-centered:before,
    .timeline-centered:after {
        content: " ";
        display: table;
    }

    .timeline-centered:after {
        clear: both;
    }

    .timeline-centered:before {
        content: '';
        position: absolute;
        display: block;
        width: 4px;
        background: #f5f5f6;
        /*left: 50%;*/
        top: 20px;
        bottom: 20px;
        margin-left: 30px;
    }

    .timeline-centered .timeline-entry {
        position: relative;
        /*width: 50%;
        float: right;*/
        margin-top: 5px;
        margin-left: 30px;
        margin-bottom: 10px;
        clear: both;
    }

    .timeline-centered .timeline-entry:before,
    .timeline-centered .timeline-entry:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry:after {
        clear: both;
    }

    .timeline-centered .timeline-entry:before,
    .timeline-centered .timeline-entry:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry:after {
        clear: both;
    }

    .timeline-centered .timeline-entry.begin {
        margin-bottom: 0;
    }

    .timeline-centered .timeline-entry.left-aligned {
        float: left;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner {
        margin-left: 0;
        margin-right: -18px;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-time {
        left: auto;
        right: -100px;
        text-align: left;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-icon {
        float: right;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label {
        margin-left: 0;
        margin-right: 70px;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label:after {
        left: auto;
        right: 0;
        margin-left: 0;
        margin-right: -9px;
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .timeline-centered .timeline-entry .timeline-entry-inner {
        position: relative;
        margin-left: -20px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:before,
    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        clear: both;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:before,
    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        clear: both;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time {
        position: absolute;
        left: -100px;
        text-align: right;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span {
        display: block;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:first-child {
        font-size: 15px;
        font-weight: bold;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:last-child {
        font-size: 12px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon {
        background: #fff;
        color: #737881;
        display: block;
        width: 40px;
        height: 40px;
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        text-align: center;
        -moz-box-shadow: 0 0 0 5px #f5f5f6;
        -webkit-box-shadow: 0 0 0 5px #f5f5f6;
        box-shadow: 0 0 0 5px #f5f5f6;
        line-height: 40px;
        font-size: 15px;
        float: left;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-primary {
        background-color: #303641;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-secondary {
        background-color: #ee4749;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-success {
        background-color: #00a651;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-info {
        background-color: #21a9e1;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-warning {
        background-color: #fad839;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-danger {
        background-color: #cc2424;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label {
        position: relative;
        background: #f5f5f6;
        padding: 1em;
        margin-left: 60px;
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label:after {
        content: '';
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9px 9px 9px 0;
        border-color: transparent #f5f5f6 transparent transparent;
        left: 0;
        top: 10px;
        margin-left: -9px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2,
    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p {
        color: #737881;
        font-size: 12px;
        margin: 0;
        line-height: 1.428571429;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p+p {
        margin-top: 15px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 a {
        color: #303641;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 span {
        -webkit-opacity: .6;
        -moz-opacity: .6;
        opacity: .6;
        -ms-filter: alpha(opacity=60);
        filter: alpha(opacity=60);
    }
</style>