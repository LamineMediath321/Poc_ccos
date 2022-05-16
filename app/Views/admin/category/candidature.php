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
                    <li><a href="#">categories</a></li>
                    <li class="active">Candidature</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des etudiants qui ont postulé</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="table_users" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Intitule de l'offre</th>
                                    <th>Entreprise</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date Postulée</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra'); ?>
                                <?php foreach ($etudiants_postules as $etudiant_postule) { ?>
                                    <tr>
                                        <td><?= $etudiant_postule['intitule'] ?></td>
                                        <td><?= $etudiant_postule['nomEntreprise'] ?></td>
                                        <td><?= $etudiant_postule['nom'] ?></td>
                                        <td><?= $etudiant_postule['prenom'] ?></td>
                                        <td><?= strftime("%d %b %G", strtotime($etudiant_postule['date_postulee'])) ?></td>
                                        <?php if ($etudiant_postule['statut'] === "En attente") { ?>
                                            <td class="text-white bg-info"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } elseif ($etudiant_postule['statut'] === "Validée") { ?>
                                            <td class="text-white bg-success"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } else { ?>
                                            <td class="text-white bg-warning"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } ?>
                                        <td class="">
                                            <div class="btn-group-sm">
                                                <a href="<?= base_url() ?>/cv/<?= $etudiant_postule['idUtilisateur'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <?php if ($etudiant_postule['statut'] !== "Validée") { ?>
                                                    <a href="#" class="btn btn-success" onclick="valider_poste(<?php echo $etudiant_postule['idOpportunite']; ?>)"><i class="fa fa-check"></i></a>
                                                <?php } ?>
                                                <?php if ($etudiant_postule['statut'] !== "Rejetée") { ?>
                                                    <a class="btn btn-danger" href="#" onclick="rejeter_poste(<?php echo $etudiant_postule['idOpportunite']; ?>)"><i class="fa fa-eject"></i></a>
                                                <?php } ?>
                                            </div> 
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?= $pager->links() ?>
                    </div>

                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>