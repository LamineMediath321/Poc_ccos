<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h6></h6>
    </div>
</section>

<div class="container">
    <div class="clearfix"></div>
    <!-- ========== Begin: Brows job Category ===============  -->
    <section class="brows-job-category">
        <div class="container">
            <form id="formSearchOffer" class="form-horizontal" method="post" action="<?php echo base_url() ?>/Offre/recherche" enctype="multipart/form-data">

                <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-padd">
                    <div class="input-group">
                        <select id="choose-contrat" name="tc" class="form-control">
                            <option value="">Choisissez un type de contrat</option>
                            <?Php foreach ($GLOBALS['typeContrats'] as $value) :  ?>
                                <option><?php echo $value['intitule']  ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-padd">
                    <div class="input-group">
                        <select id="choose-profile" name="profil" class="form-control">
                            <option value="">Choisissez un profil</option>
                            <?Php foreach ($GLOBALS['profiles'] as $value) :  ?>
                                <option><?php echo $value['intitule']  ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-padd">
                    <div class="input-group">
                        <select id="choose-city" name="city" class="form-control">
                            <option value="">Choisissez une ville</option>
                            <?Php foreach ($GLOBALS['cities'] as $value) :  ?>
                                <option><?php echo $value['nom']  ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-offset-1 col-sm-2 col-xs-12 m-5 no-padd">
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary" id="searchCriteria">Chercher</button>
                    </div>
                </div>
            </form>
            <div class="mt-10">
                <?php if ($offres) { ?>
                    <?php foreach ($offres as $offer) : ?>
                        <div class="item-click">
                            <article>
                                <div class="brows-job-list">
                                    <div class="col-md-1 col-sm-2 small-padding">
                                        <div class="brows-job-company-img">
                                            <a href="<?php echo base_url(); ?>/offre/<?php echo $offer['idOpportunite']; ?>">
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
                                                <span class="job-type cl-success bg-trans-success"><?php echo $offer['contractType']; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="brows-job-location">
                                            <p><i class="fa fa-map-marker"></i><?= $offer['nom'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <div class="brows-job-link">
                                            <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>" class="btn btn-default">
                                                Detail <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach;
                } else {
                    ?>
                    <div class="m-4 text-center text-secondary">
                        <h3>Nous n'avons pas trouvé 😇</h3>
                        <p>Veillez continuer à Chercher</p>
                    </div>
                <?php } ?>
                <?= $pager->links() ?>

                <!--/.row-->
                <!--div class="row">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li> 
                    <li><a href="#">4</a></li> 
                    <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
                    <li><a href="#">&raquo;</a></li> 
                </ul>
            </div-->
            </div>
        </div>
    </section>
</div>
<!-- Add modal view -->
<div class="modal fade" id="modal_form_of" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <div class="container">
                    <h4 class="modal-title" id="title_ad">Offre</h4>
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
                            <div class="col-md-6 col-sm-6">
                                <div class="">
                                    <label class="control-label" for="company">Entreprise</label>
                                    <input type="text" list="companies" class="form-control" name="nomEnt" id="company">
                                    <datalist id="companies">
                                        <?php foreach ($ent as $company) :  ?>
                                            <option value="<?= $company['nomEntreprise']  ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="">
                                    <label class="control-label" for="idTC">Type Offre</label>
                                    <select name="idTC" value="" id="idTC" class="select2 form-control custom-select" required>
                                        <option>Choisir le type d'offre</option>
                                        <?Php foreach ($tc as $value) :  ?>
                                            <option value="<?php echo $value['idTypeContrat']  ?>"><?php echo $value['intitule']  ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="">
                                    <label class="control-label" for="ne">Niveau Etude</label>
                                    <select name="idNE" value="" id="ne" class="select2 form-control custom-select" required>
                                        <option>Choisir le niveau d'&eacute;tude requis</option>
                                        <?Php foreach ($ne as $value) :  ?>
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
                                        <?php foreach ($cities as $city) :  ?>
                                            <option value="<?= $city['nom']  ?>"></option>
                                            <input type="hidden" name="idV" value="<?= $city['idVille'] ?>">
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="">
                                    <label class="control-label" for="idP">Profil</label>
                                    <select name="idP" value="" class="select2 form-control custom-select" required>
                                        <option>Choisir le profil concern&eacute; par cette offre</option>
                                        <?Php foreach ($prof as $value) :  ?>
                                            <option value="<?php echo $value['idProfil']  ?>"><?php echo $value['intitule']  ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="">
                                    <label for="mis">Mission</label>
                                    <textarea class="form-control textarea" name="mis" id="mis" minlength="10" maxlength="1300" rows="7" placeholder=""> </textarea>
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
                            <div class="col-md-6 col-sm-6">
                                <div class="">
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
</div>