<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <?php if (session('Resume404')) : ?>
        <div class="container">
            <div class="alert  alert-danger alert-dismissible show" role="alert">
                <span class="badge badge-pill badge-danger">Erreur</span> Veuillez créer votre cv pour pouvoir postuler.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session()->set(['Resume404' => FALSE]);
    endif;
        ?>
        <h2></h2>
        </div> 
</section>

<div class="clearfix"></div>
<!-- Title Header End -->

<section class="detail-desc  advance-detail-pr gray-bg">
    <div class="container white-shadow">
        <div class="row ">
            <div class="detail-pic">
                <img src="<?= $resume ? base_url() . '/assets/images/' . $persinfo['photo'] : base_url() . '/assets/images/avatar.png' ?>" width="133" height="133" alt="photo de profil">
            </div>


            <div class="detail-status">
                <?php if (!$resume) : ?>
                    <span>Informations personnelles incompletes</span>
                <?php else : ?>
                    <a href="#" onclick=" edit_perso_info(<?php echo session('id'); ?>)">
                        <i class="fa fa-pencil"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row bottom-mrg mrg-0">
            <div class="col-md-8 col-sm-8">
                <div class="detail-desc-caption">
                    <h4> <?= ucfirst($persinfo['prenom']) . ' ' . strtoupper($persinfo['nom']) ?></h4>
                    <span class="designation">
                        <?= $persinfo['profils'] ? $persinfo['profils'] : '' ?>
                    </span>
                    <p>
                        <?= $resume ? $persinfo['description'] : '' ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="get-touch">
                    <h4>Coordonn&eacute;es</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span><?= $resume ? $persinfo['adresse'] : ' - - - ' ?></span></li>
                        <li><i class="fa fa-envelope"></i><span><?= $resume ? $persinfo['email'] : ' - - - ' ?></span></li>
                        <li><i class="fa fa-phone"></i><span><?= $resume ? $persinfo['telephone'] : ' - - - ' ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if (!$resume) : ?>
            <div class="row no-padd mrg-0">
                <div class="detail pannel-footer">
                    <div class="col-md-7 col-sm-7 padd-15">
                        <p> <i class="fa fa-warning"></i> Veuillez completer vos informations pour pouvoir continuer le processus de creation</p>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="detail-pannel-footer-btn pull-right">
                            <a href="#" class="footer-btn grn-btn" title="hdjhd" onclick="perso_info(<?php echo session('id'); ?>)">Completer mes informations</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php endif; ?>
</section>
<!-- Resume Detail End -->
<section class="full-detail-description full-detail gray-bg">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="full-card profile-tab-mt">
                <div class="deatil-tab-employ tool-tab">
                    <ul class="nav nav-tabs" id="simple-design-tab">
                        <li class="nav-item"><a class="nav-link active" href="#offers">Offres</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#candidacies">Mes candidatures</a></li>
                        <li class="nav-item"><a class="nav-link" href="#activities">Activit&eacute;s</a></li>
                        <!--li><a href="#messages">Messages <span class="info-bar">6</span></a></li>
                        <li><a href="#settings">Settings</a></li -->
                    </ul>
                    <!-- Start All Sec -->
                    <div class="tab-content">
                        
                             
                        <!-- Start Job List -->
                        <div id="offers" class="tab-pane fade">
                            <div class="row">
                                <?php foreach ($offers as $offer) { ?>
                                    <div class="item-click">
                                        <article>
                                            <div class="row brows-job-list">
                                                <div class="col-md-1 col-sm-2 small-padding">
                                                    <div class="brows-job-company-img">
                                                        <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>">
                                                            <img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" class="img-responsive" alt="" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-5">
                                                    <div class="brows-job-position">
                                                        <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>">
                                                            <h3><?= $offer['title'] ?></h3>
                                                        </a>
                                                        <p>
                                                            <span><?= $offer['nomEntreprise'] ?></span><span class="brows-job-sallery"><?= $offer['studyLevel'] ?></span>
                                                            <span class="job-type cl-success bg-trans-success"><?= $offer['contractType'] ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="brows-job-location">
                                                        <p><i class="fa fa-map-marker"></i><?= $offer['adresse'] ?></p>
                                                    </div>
                                                </div>
                                                <?php if (session()->get('role') == 'etudiant') : ?>
                                                    <div class="">
                                                        <div class="brows-job-link">
                                                            <?php if (!$offer['have_apply']) : ?>
                                                                <a href="<?= base_url() . '/Offre/applyToAOffer/' . $offer['idOpportunite']; ?>" class="btn btn-default">
                                                                    Postuler
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <!--span class="tg-themetag tg-featuretag">Premium</span-->
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>
                            
                        </div>
                        <!-- End Offer List -->

                        <!-- Start My Candidacies List -->
                        <div id="candidacies" class="tab-pane fade">
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
                                                            <span class="job-type bg-trans-success cl-success"><?php echo $offer['statut'] ?></span>
                                                        <?php } elseif ($offer['statut'] === "Rejetée") { ?>
                                                            <span class="job-type bg-trans-danger cl-danger"><?php echo $offer['statut'] ?></span>
                                                        <?php } else { ?>
                                                            <span class="job-type bg-trans-info cl-info"><?php echo $offer['statut'] ?></span>
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
                    <!-- Start All Sec -->
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal d'ajout des informations personnelles -->
<div class="modal fade" id="personal_info" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Informations personnelles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="javascript:void(0)" id="student_form" enctype="multipart/form-data" class="">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label for="lstname">Nom</label>
                                <input type="text" class="form-control" name="lstname" id="lstname" value="" readonly>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label for="fstname">Prénom</label>
                                <input type="text" class="form-control" name="fstname" id="fstname" value="" readonly>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="mail" id="mail" value="" readonly>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="phone">Numéro de téléphone</label>
                                <input type="tel" class="form-control" name="phone" id="phone" value="">
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="adress">Adresse</label>
                                <input type="text" class="form-control" name="adress" id="adress" value="">
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label for="profile">Profil</label>
                                <select name="profiles[]" multiple class="select2 form-control custom-select selectpicker" data-style="btn-success" data-container="select_contain" id="profile">
                                    <option>Choisissez...</option>
                                    <?Php foreach ($profiles as $profile) :  ?>
                                        <option value="<?php echo $profile['idProfil']  ?>"><?php echo $profile['intitule']  ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="sex">Genre</label>
                                <select name="sex" id="sex" class="form-control custom-select">
                                    <option>Genre</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="" for="bthDay">Date de Naissance</label>
                                <input type="date" class="form-control" name="bthDay" id="bthDay" value="">
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="bthPlace">Lieu de Naissance</label>
                                <input type="text" class="form-control" name="bthPlace" id="bthPlace" value="">
                            </div>
                        </div>
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="natnalty">Nationalité</label>
                                <input type="text" class="form-control" name="natnalty" id="natnalty" value="">
                            </div>
                        </div>
                        <!-- <div class="col-xs-9 col-sm-12">
                            <div class="form-group ">
                                <label class="bmd-label-floating" for="description">Description</label>
                                <textarea class="form-control textarea" name="description" id="description" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                            </div>
                        </div> -->
                        <div class="col-xs-9 col-sm-6">
                            <div class="form-group">
                                <label for="pict"><img src="" width="130" height="130" id="pict" alt=""></label>
                                <input type="file" name="pict" class="form-control" id="pic"  accept="image/*">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="modal-footer">
                        <input type="hidden" name="idE" class="form-control" id="idE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                         

                       

                       <button type="submit" id="btn_save"  onclick="save_cv()" class="btn btn-primary">Enregistrer</button>
                 

                 </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<style>
    .form-group{
        width:85%;
        padding-left:3.5em;
    }
    
</style>