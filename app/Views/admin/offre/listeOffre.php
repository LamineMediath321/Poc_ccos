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
                    <li><a href="#">offres</a></li>
                    <li class="active">Liste</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (session('CompanyAdd')) : ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Erreur</span>
            Veuillez ajouter l'entreprise avant de pouvoir poster une offre pour celle-ci.
            Cliquez <a href="<?php echo base_url(); ?>/admin/entreprises">ici</a> pour aller à la liste des entreprises
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

<?php
    session()->set(['CompanyAdd' => FALSE]);
endif;
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-info" href="#" data-target="modal_form_of" onclick="add_offer()">
                    <i class="fa fa-plus"></i>
                    <a class="text-white">
                        <i class="" aria-hidden="true"></i>
                        Ajouter une offre
                    </a>
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h1>Liste des offres</h1>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive col-md-12">
                            <table id="table_of" class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Intitul&eacute;</th>
                                        <th>Entreprise</th>
                                        <th>Type Contrat</th>
                                        <th>Niveau requis</th>
                                        <th>Ville</th>
                                        <th>Statut</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($offres as $offre) { ?>
                                        <tr>
                                            <td><?= $offre['title'] ?></td>
                                            <td><?= $offre['nomEntreprise'] ?></td>
                                            <td><?= $offre['contractType'] ?></td>
                                            <td><?= $offre['studyLevel'] ?></td>
                                            <td><?= $offre['nom'] ?></td>


                                            <td>
                                                <?php if ($offre['statut'] == 0) : ?>
                                                    <a>Actif</a>
                                                <?php elseif ($offre['statut'] == 1) : ?>
                                                    <a>Inactif</a>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td>
                                            <a href="#" data-toggle="modal" data-target="#modal_offer_post" onclick="postOffer(<?php echo $offre['idOpportunite']; ?>)"><i>Postuler</i></button>
                                        </td> -->
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-primary btn-success" href="<?php echo base_url(); ?>/admin/offre/<?= $offre['idOpportunite'] ?>"><i class="fa fa-eye"></i></a>

                                                    <?php if (session()->get('isAdmin')) : ?>
                                                        <button class="btn btn-primary btn-edit" href="#" onclick="edit_offer(<?php echo $offre['idOpportunite']; ?>)"><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-delete" onclick="delete_offer(<?php echo $offre['idOpportunite']; ?>)"><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Intitul&eacute;</th>
                                        <th>Entreprise</th>
                                        <th>Type Contrat</th>
                                        <th>Niveau requis</th>
                                        <th>Ville</th>
                                        <th>Statut</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add modal view -->
    <div class="modal" id="modal_form_of" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title_ad">Offre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" action="javascript:void(0)" id="form_of" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body form">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="intituleOP">Intitul&eacute;</label>
                                    <input type="text" class="form-control" name="intituleOP" id="intituleOP" value="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="company">Entreprise</label>
                                    <input type="text" list="companies" class="form-control" name="nomEnt" id="company">
                                    <datalist id="companies">
                                        <?php foreach ($ent as $company) :  ?>
                                            <option value="<?= $company['nomEntreprise']  ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="idTC">Type Offre</label>
                                    <select name="idTC" value="" id="idTC" class="select2 form-control custom-select" required>
                                        <option>Choisir le type d'offre</option>
                                        <?Php foreach ($tc as $value) :  ?>
                                            <option value="<?php echo $value['idTypeContrat']  ?>"><?php echo $value['intitule']  ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="ne">Niveau Etude</label>
                                    <select name="idNE" value="" id="ne" class="select2 form-control custom-select" required>
                                        <option>Choisir le niveau d'&eacute;tude requis</option>
                                        <?Php foreach ($ne as $value) :  ?>
                                            <option value="<?php echo $value['idNiveauEtude']  ?>"><?php echo $value['intitule']  ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="idV">Ville</label>
                                    <input type="text" list="cities" class="form-control" name="ville" id="idV">
                                    <datalist id="cities">
                                        <?php foreach ($cities as $city) :  ?>
                                            <option value="<?= $city['nom']  ?>"></option>
                                            <input type="hidden" name="idV" value="<?= $city['idVille'] ?>">
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="idP">Profil</label>
                                    <select name="idP" value="" class="select2 form-control custom-select" required>
                                        <option>Choisir le profil concern&eacute; par cette offre</option>
                                        <?Php foreach ($prof as $value) :  ?>
                                            <option value="<?php echo $value['idProfil']  ?>"><?php echo $value['intitule']  ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mis">Mission</label>
                                    <textarea class="form-control" name="mis" id="mis" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="preq">Pr&eacute;requis</label>
                                    <textarea class="form-control" name="preq" id="preq" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="det">D&eacute;tails</label>
                                    <textarea class="form-control" name="det" id="det" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="dateC">Date Cloture</label>
                                    <input type="date" class="form-control" name="dateC" id="dateC" value="">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idOp" class="form-control" id="idOp">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" id="btn_save" onclick="save_offer()" class="btn btn-primary">Valider</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>