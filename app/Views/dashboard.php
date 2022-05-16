<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h4></h4>
    </div>
</section>
<section class="detail-desc advance-detail-pr gray-bg">
    <div class="container white-shadow">
        <?php if ($pfCompany) : ?>
            <div class="row">
                <div class="detail-pic">
                    <img src="<?= ($pfCompany['logo']) ? base_url() .  '/assets/images/' .  $pfCompany['logo']  : base_url() . '/assets/img/company.png' ?>" class="img" alt="" />
                </div>
            </div>


            <div class="row bottom-mrg">
                <div class="col-md-12 col-sm-12">
                    <div class="advance-detail detail-desc-caption">
                        <h4><?= $pfCompany['nomEntreprise'] ?></h4>
                        <span class="designation"><?= $pfCompany['intitule'] ?></span>
                        <ul class="pull-center">

                            <li><strong class="j-applied"><?= $companyOfNumber; ?></strong>Offres postees</li>
                            <li><strong class="j-shared"><?= $cpOfCandidaciesNumber; ?></strong>Candidatures</li>
                            <li><strong class="j-view">0</strong>Activites</li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <div class="row">
                <div class="detail-pic">
                    <img src="assets/img/company.png" class="img" alt="" />
                </div>
                <div class="detail-status">
                    <span>Entreprise <c class="text-lowercase">pas encore ajoutée</c></span>
                </div>

            </div>


            <div class="row bottom-mrg">
                <div class="col-md-12 col-sm-12">
                    <div class="advance-detail detail-desc-caption">
                        <h4>
                            Veuillez saisir les informations de votre entreprise pour pouvoir poster des offres.
                            <br> En cliquant sur le bouton "Ajouter mon entreprise"
                        </h4>

                    </div>
                </div>
            </div>

            <div class="row no-padd">
                <div class="detail pannel-footer pull-right">
                    <div class="detail-pannel-footer-btn pull-right">
                        <a href="<?php echo base_url(); ?>/ajout_entreprise" class="footer-btn grn-btn" title="">
                            Ajouter <span class="text-lowercase">mon entreprise</span>
                        </a>
                    </div>
                </div>


            <?php endif; ?>
            </div>
</section>

<section class="full-detail-description full-detail gray-bg">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="full-card profile-tab-mt">
                <div class="deatil-tab-employ tool-tab">
                    <ul class="nav simple nav-tabs" id="simple-design-tab">
                        <li class="active"><a href="#about">A propos</a></li>
                        <li><a href="#address">Adresse</a></li>
                        <li><a href="#post-job">Offres Postees</a></li>
                        <li><a href="#candidacies">Candidats</a></li>
                        <!--li><a href="#messages">Messages <span class="info-bar">6</span></a></li>
								<li><a href="#settings">Settings</a></li -->
                    </ul>
                    <!-- Start All Sec -->
                    <div class="tab-content">
                        <!-- Start About Sec -->
                        <div id="about" class="tab-pane fade in active">
                            <?php if ($pfCompany) : ?>
                                <?= $pfCompany['presentation'] ?>
                            <?php endif; ?>
                        </div>
                        <!-- End About Sec -->

                        <!-- Start Address Sec -->
                        <div id="address" class="tab-pane fade">
                            <?php if ($pfCompany) : ?>
                                <ul class="job-detail-des">
                                    <li><span>Adresse:</span><?= $pfCompany['adresse'] ?></li>
                                    <li><span>Telephone:</span><?= $pfCompany['telephone'] ?></li>
                                    <li><span>Email:</span><?= $pfCompany['email'] ?></li>
                                    <li><span>Site web:</span><?= $pfCompany['siteWeb'] ?></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!-- End Address Sec -->

                        <!-- Start Job List -->
                        <div id="post-job" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <h3>Vous avez <?= $companyOfNumber; ?> offres</h3>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-6">
                                    <?php if ($pfCompany) : ?>
                                        <a href="#" onclick="add_offer()" class="btn btn-primary pull-right">Poster une offre</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">

                                <?php if ($companyOffers) : ?>
                                    <?php foreach ($companyOffers as $offer) :
                                    ?>
                                        <div class="col-md-12">
                                            <article>
                                                <div class="mng-company">
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="mng-company-pic"><img src="<?= ($pfCompany['logo']) ? base_url() .  '/assets/images/' .  $pfCompany['logo']  : base_url() . '/assets/img/company.png' ?>" class="img-responsive" alt=""></div>
                                                    </div>

                                                    <div class="col-md-5 col-sm-5">
                                                        <div class="mng-company-name">
                                                            <h4><?= $offer['title'] ?></h4><span class="cmp-time"><?= $offer['contractType'] ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="mng-company-location">
                                                            <p><i class="fa fa-hourglass-half"></i>
                                                                <?php
                                                                setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                                echo strftime("%d %b %G", strtotime($offer['dateCloture']));
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="mng-company-action">
                                                            <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>"><i class="fa fa-eye"></i></a>
                                                            <a href="#" onclick="edit_offer(<?php echo $offer['idOpportunite']; ?>)"><i class="fa fa-edit"></i></a>
                                                            <a href="#" onclick="delete_offer(<?php echo $offer['idOpportunite']; ?>)"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--span class="tg-themetag tg-featuretag">Premium</span-->
                                            </article>
                                        </div>
                                <?php endforeach;
                                endif; ?>

                            </div>
                            <!-- div class="row">
										<ul class="pagination">
											<li><a href="#">«</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
											<li><a href="#">»</a></li>
										</ul>
									</div -->
                        </div>
                        <!-- End Job List -->

                        <!-- Start Friend List -->
                        <div id="candidacies" class="tab-pane fade">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Intutile offre</td>
                                                <td>Candidat</td>
                                                <td>Type contrat</td>
                                                <td>Date cloture</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cpOfCandidacies as $offer) { ?>
                                                <tr>
                                                    <td> <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>">
                                                            <?= $offer['title'] ?></a>
                                                    </td>
                                                    <td> <a href="<?php echo base_url(); ?>/cv/<?= $offer['idUtilisateur'] ?>"><?= $offer['prenom'] . ' ' . $offer['nom'] ?></a> </td>

                                                    <td>
                                                        <?= $offer['contractType'] ?>

                                                    </td>

                                                    <td>
                                                        <?php
                                                        setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                                        echo strftime("%d %b %G", strtotime($offer['dateCloture']));
                                                        ?>
                                                    </td>
                                                    <td class="">
                                                        <div class="btn-group-sm">
                                                            <a class="btn btn-primary" href="<?php echo base_url(); ?>/cv/<?= $offer['idUtilisateur'] ?>"><i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Friend List -->

                    </div>
                    <!-- Start All Sec -->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal_form_of" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h4 class="modal-title" id="title_ad">Ajouter une offre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body form">
                    <form method="post" action="javascript:void(0)" id="form_of" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="">
                                    <label for="intituleOP">Intitul&eacute;</label>
                                    <input type="text" class="form-control" name="intituleOP" id="intituleOP" value="">
                                </div>
                            </div>

                            <<<<<<< HEAD <div class="col-md-6 col-sm-6">
                                <input type="hidden" class="form-control" name="idEnt" value="<?= $pfCompany ? $pfCompany['idEntreprise'] : '' ?>">
                                =======
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control" name="idEnt" value="<?= $pfCompany ? $pfCompany['idEntreprise'] : '' ?>">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="">
                                        <label for="idTC">Type Offre</label>
                                        <select name="idTC" value="" class="select2 form-control custom-select" required>
                                            <option>Choisir le type d'offre</option>
                                            <?Php foreach ($contractTypes as $value) :  ?>
                                                <option value="<?php echo $value['idTypeContrat']  ?>"><?php echo $value['intitule']  ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="">
                                        <label for="ne">Niveau Etude</label>
                                        <select name="idNE" value="" class="select2 form-control custom-select" required>
                                            <option>Choisir le niveau d'&eacute;tude requis</option>
                                            <?Php foreach ($studyLevels as $value) :  ?>
                                                <option value="<?php echo $value['idNiveauEtude']  ?>"><?php echo $value['intitule']  ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="">
                                        <label class="control-label" for="idV">Ville</label>
                                        <input type="text" list="cities" class="form-control" name="ville" id="idV">
                                        <datalist id="cities">
                                            <?php foreach ($GLOBALS['cities'] as $city) :  ?>
                                                <option value="<?= $city['nom']  ?>"></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="">
                                        <label for="idP">Profil</label>
                                        <select name="idP" value="" class="select2 form-control custom-select" required>
                                            <option>Choisir le profil concern&eacute; par cette offre</option>
                                            <?Php foreach ($GLOBALS['profiles'] as $value) :  ?>
                                                <option value="<?php echo $value['idProfil']  ?>"><?php echo $value['intitule']  ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="">
                                        <label for="dateC">Date Cloture</label>
                                        <input type="date" class="form-control" name="dateC" id="dateC" value="">
                                        >>>>>>> e0afd778fa0da98c4aeb98097268deb5792455f7
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <label for="idTC">Type Offre</label>
                                            <select name="idTC" value="" class="select2 form-control custom-select" required>
                                                <option>Choisir le type d'offre</option>
                                                <?Php foreach ($contractTypes as $value) :  ?>
                                                    <option value="<?php echo $value['idTypeContrat']  ?>"><?php echo $value['intitule']  ?></option>
                                                <?php endforeach;  ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <label for="ne">Niveau Etude</label>
                                            <select name="idNE" value="" class="select2 form-control custom-select" required>
                                                <option>Choisir le niveau d'&eacute;tude requis</option>
                                                <?Php foreach ($studyLevels as $value) :  ?>
                                                    <option value="<?php echo $value['idNiveauEtude']  ?>"><?php echo $value['intitule']  ?></option>
                                                <?php endforeach;  ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <label class="control-label" for="idV">Ville</label>
                                            <input type="text" list="cities" class="form-control" name="ville" id="idV">
                                            <datalist id="cities">
                                                <?php foreach ($GLOBALS['cities'] as $city) :  ?>
                                                    <option value="<?= $city['nom']  ?>"></option>
                                                <?php endforeach; ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <label for="idP">Profil</label>
                                            <select name="idP" value="" class="select2 form-control custom-select" required>
                                                <option>Choisir le profil concern&eacute; par cette offre</option>
                                                <?Php foreach ($GLOBALS['profiles'] as $value) :  ?>
                                                    <option value="<?php echo $value['idProfil']  ?>"><?php echo $value['intitule']  ?></option>
                                                <?php endforeach;  ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="">
                                            <label for="dateC">Date Cloture</label>
                                            <input type="date" class="form-control" name="dateC" id="dateC" value="">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="">
                                                <label for="idTC">Type Offre</label>
                                                <select name="idTC" value="" class="select2 form-control custom-select" required>
                                                    <option>Choisir le type d'offre</option>
                                                    <?Php foreach ($contractTypes as $value) :  ?>
                                                        <option value="<?php echo $value['idTypeContrat']  ?>"><?php echo $value['intitule']  ?></option>
                                                    <?php endforeach;  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="">
                                                <label for="ne">Niveau Etude</label>
                                                <select name="idNE" value="" class="select2 form-control custom-select" required>
                                                    <option>Choisir le niveau d'&eacute;tude requis</option>
                                                    <?Php foreach ($studyLevels as $value) :  ?>
                                                        <option value="<?php echo $value['idNiveauEtude']  ?>"><?php echo $value['intitule']  ?></option>
                                                    <?php endforeach;  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="">
                                                <label class="control-label" for="idV">Ville</label>
                                                <input type="text" list="cities" class="form-control" name="ville" id="idV">
                                                <datalist id="cities">
                                                    <?php foreach ($GLOBALS['cities'] as $city) :  ?>
                                                        <option value="<?= $city['nom']  ?>"></option>
                                                    <?php endforeach; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="">
                                                <label for="idP">Profil</label>
                                                <select name="idP" value="" class="select2 form-control custom-select" required>
                                                    <option>Choisir le profil concern&eacute; par cette offre</option>
                                                    <?Php foreach ($GLOBALS['profiles'] as $value) :  ?>
                                                        <option value="<?php echo $value['idProfil']  ?>"><?php echo $value['intitule']  ?></option>
                                                    <?php endforeach;  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="">
                                                <label for="dateC">Date Cloture</label>
                                                <input type="date" class="form-control" name="dateC" id="dateC" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="mis">Mission</label>
                                                <textarea class="form-control textarea" name="mis" id="mis" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="preq">Pr&eacute;requis</label>
                                                <textarea class="form-control textarea" name="preq" id="preq" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="det">D&eacute;tails</label>
                                                <textarea class="form-control textarea" name="det" id="det" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

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
</div>

<div class="modal fade" id="personal_info" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Informations personnelles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="javascript:void(0)" id="formcv" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lstname">Nom</label>
                                <input type="text" class="form-control" name="lstname" id="lstname" value="" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="fstname">Prenom</label>
                                <input type="text" class="form-control" name="fstname" id="fstname" value="" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="mail" id="mail" value="" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="phone">Numero de telephone</label>
                                <input type="tel" class="form-control" name="phone" id="phone" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="adress">Adresse</label>
                                <input type="text" class="form-control" name="adress" id="adress" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="profile">Profil</label>
                                <select name="profiles[]" multiple class="select2 form-control custom-select selectpicker" data-style="btn-success" data-container="select_contain" id="profile">
                                    <option>Choisissez...</option>
                                    <?Php foreach ($GLOBALS['profiles'] as $profile) :  ?>
                                        <option value="<?php echo $profile['idProfil']  ?>"><?php echo $profile['intitule']  ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="sex">Genre</label>
                                <select name="sex" id="sex" class="form-control custom-select">
                                    <option>Genre</option>
                                    <option value="H">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="" for="bthDay">Date de Naissance</label>
                                <input type="date" class="form-control" name="bthDay" id="bthDay" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="bthPlace">Lieu de Naissance</label>
                                <input type="text" class="form-control" name="bthPlace" id="bthPlace" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="natnalty">Nationnalite</label>
                                <input type="text" class="form-control" name="natnalty" id="natnalty" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating" for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="pic"><img src="" width="130" height="130" id="pict" alt=""></label>
                                <input type="file" name="pict" class="form-control" id="pic">
                            </div>
                            <div id="srcpict"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idE" class="form-control" id="idE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_save" onclick="save_cv()" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>