<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Administration</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Tableau de bord</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <!-- div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div -->

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-user text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Utilisateurs</div>
                            <div class="stat-digit">
                                <?= $usersNumbers ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-users text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Entreprise</div>
                            <div class="stat-digit">
                                <?= $companiesNumbers ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-file text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">CV</div>
                            <div class="stat-digit"><?= $resumesNumbers ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-calendar-o text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Activites</div>
                            <div class="stat-digit">0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="fa fa-user text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Etudiants</div>
                                <div class="stat-text">Total: <?= $studentsNumbers ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="fa fa-briefcase text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Offres</div>
                                <div class="stat-text">Total: <?= $offersNumbers ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="fa fa-suitcase text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Stages</div>
                                <div class="stat-text">Total: <?= $internshipsNumbers ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">Alumni</div>
                                <div class="stat-text">Total: <?= $alumniNumbers ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Dernieres offres</strong>
                </div>
                <div class="card-body table-responsive">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Intitul&eacute;</th>
                                <th scope="col">Entreprise</th>
                                <th scope="col">Date cloture</th>
                                <th>Nombre de candidatures</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($offers) :
                                $i = 1;
                                foreach ($offers as $offer) :
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>">
                                                <?= $i++ ?>
                                            </a>
                                        </th>
                                        <td><?= $offer['title'] ?></td>
                                        <td><?= $offer['nomEntreprise'] ?></td>
                                        <td>
                                            <?php
                                            setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                            echo strftime("%d %b %G", strtotime($offer['dateCloture']));
                                            ?>
                                        </td>
                                        <td><?= $offer['nombreCandidatures'] ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Candidats</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">UFR</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fatou</td>
                            <td>SAT</td>
                            <td>fatou@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Sohna</td>
                            <td>SAT</td>
                            <td>ndeye@gmail.com</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div -->


</div>
<!-- .content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->