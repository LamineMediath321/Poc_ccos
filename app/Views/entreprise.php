<style>
    #container {
        height: 500px;
        min-width: 310px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 5px 25px 0 rgba(41, 128, 185, .15);
        -webkit-box-shadow: 0 5px 25px 0 rgba(41, 128, 185, .15);
        margin-bottom: 20px;
        border-radius: 5px;

    }

    .loading {
        margin-top: 10em;
        text-align: center;
        color: gray;
    }

    .btn-info {
        margin-top: 20px;
    }
</style>



<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h6></h6>
    </div>
</section>


<div class="container">
    <div class="mt-3">
        <h1 class="p-5 text-center">Référentiel des Entreprises</h1>
    </div>
    <div class="container">
        <form id="formSearchOffer" class="form-horizontal" method="post" action="<?php echo base_url() ?>/entreprises" enctype="multipart/form-data">
            <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-pad">
                <div class="input-group">
                    <input type="text" name="company" id="nomEntreprise" class="form-control" placeholder="Nom de l'entreprise">
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-pad">
                <div class="input-group">
                    <select id="choose-city" name="city" class="form-control">
                        <option value="">Choisissez une ville</option>
                        <?Php foreach ($GLOBALS['cities'] as $city) :  ?>
                            <option><?php echo $city['nom']  ?></option>
                        <?php endforeach;  ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-pad">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary" id="searchCriteria">Chercher</button>
                </div>
            </div>
        </form>
    </div>
    <?php if ($companies) { ?>
        <div class="mt-10 liste">
            <?php foreach ($companies as $company) : ?>
                <div class="item-click entr">
                    <article class="entreprises">
                        <div class="brows-job-list ent">
                            <div class="col-md-1 col-sm-2 small-padding">
                                <div class="brows-job-company-img">
                                    <img src="<?php echo base_url('assets/images/' . $company['logo']); ?>" class="img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5  mr-5 entrepresentation col-md-6 col-12">
                                <div class="">
                                    <p class=" nomEntreprise"><?= $company['nomEntreprise'] ?></p>
                                    <?= substr($company['presentation'], 0, 70) . ' . . .' ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 adressite">
                                <div>
                                    <p><i class="fa fa-map-marker"></i> <?= $company['adresse'] ?></p>
                                    <?= $company['siteWeb'] ?>
                                </div>

                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="py-0 align-middle eye">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-primary btn-success" href="#" data-toggle="modal" data-target="#show_ent_modal" onclick="show_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-eye"></i></button>
                                        <?php if (session()->get('isAdmin')) : ?>
                                            <button class="btn btn-primary btn-edit" href="#" onclick="edit_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-delete" onclick="delete_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-trash"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links() ?>
    <?php } else { ?>
        <div class="m-4 text-center text-secondary">
            <h3>Nous n'avons pas trouvé 😇</h3>
            <p>Veuillez continuer à Chercher</p>
        </div>

    <?php } ?>
</div>



<!--div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="container">
                <div class="jumbotron card-header liste">
                    <h1>Liste des entreprises</h1>
                    <p>Ci-dessous, nous vous présentons les différentes entreprises</p>
                </div>
                <div class="formulaire">
                    <form id="formSearchOffer" class="form-horizontal" method="post" action="<?php echo base_url() ?>/Offre/recherche" enctype="multipart/form-data">
                        <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-padd">
                            <div class="input-group">
                                <input type="text" name="nomEntreprise" id="nomEntreprise" class="form-control" placeholder="Nom de l'entreprise">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 m-5 no-padd">
                            <div class="input-group">
                                <select id="choose-city" name="nom" class="form-control">
                                    <option value="">Choisissez une ville</option>
                                    <!?Php foreach ($GLOBALS['cities'] as $value) :  ?-->
<!--option><!?php echo $value['nom']  ?></!--option>
                                    <!?php endforeach;  ?>
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
                        
                        <div class="item-click">
                            <article>
                            <?php foreach ($companies as $company) : ?>
                                <div class="brows-job-list">
                                    <div class="col-md-1 col-sm-2 small-padding">
                                        <div class="brows-job-company-img">
                                            <img src="<?php echo base_url('assets/img/images/' . $company['logo']); ?>" class="img-responsive" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-5 nomEntreprise">
                                        <p><?= $company['nomEntreprise'] ?></p> <br>
                                        <?= substr($company['presentation'], 0, 70) . ' . . . ' ?> ?>
                                    </div>
                                    <div class="col-md-6 col-sm-5 brows-job-location">
                                        <p><i class="fa fa-map-marker"></i> <?= $company['adresse'] ?></p>
                                        <?= $company['siteWeb'] ?>
                                    </div>
                                    <div class="py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-primary btn-success" href="#" data-toggle="modal" data-target="#show_ent_modal" onclick="show_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-eye"></i></button>
                                            <?php if (session()->get('isAdmin')) : ?>
                                                <button class="btn btn-primary btn-edit" href="#" onclick="edit_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-delete" onclick="delete_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-trash"></i></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            <article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h2>Cartographie</h2>
            </div>
            <div id="result"></div>
            <div class="card-body">
                <div id="container" data-content='<?= $donnees ?>'>
                    <div class="loading">
                        <i class="icon-spinner icon-spin icon-large"></i>
                        Chargement...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


<!-- Add modal view -->


<div class="modal" id="add_ent_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Entreprise</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="javascript:void(0)" id="formEnt" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="nameE">Nom Entreprise</label>
                                <input type="text" class="form-control" name="company_name" id="nameE" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label class="control-label" for="nomV">Ville</label>
                                <select name="city" value="" class="select2 form-control custom-select" data-container="select_contain" required>
                                    <option>Choisir la ville</option>
                                    <?Php foreach ($GLOBALS['cities'] as $value) :  ?>
                                        <option value="<?php echo $value['idVille']  ?>"><?php echo $value['nom']  ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="adWeb">Site Web</label>
                                <input type="text" class="form-control" name="website" id="adWeb" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="phone">Telephone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="mail">Email</label>
                                <input type="email" class="form-control" name="mail" id="mail" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="ad">Adresse</label>
                                <input type="text" class="form-control" name="address" id="ad" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="stat">Partenaire</label>
                                <select name="partner" class="select2 form-control custom-select" required>
                                    <option>Statut</option>
                                    <option value="1">OUI</option>
                                    <option value="0">NON</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group" id="select_contain_show">
                                <label for secteur>Selectionner Secteurs d'Activité de l'Entreprise</label>
                                <select name="secteur[]" multiple class="select2 form-control custom-select " data-style="btn-success" data-container="select_contain" required>
                                    <option>Select Secteur</option>
                                    <?Php foreach ($secteurs as $value) :  ?>
                                        <option value="<?php echo $value['idSecteur']  ?>"><?php echo $value['intitule']  ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="">
                                <label for="pres">Pr&eacute;sentation</label>
                                <textarea class="form-control" name="presentation" id="pres" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                            </div>
                        </div>
                        <div class=" col-md-3 m-t-20">
                            <label for="log"><img src="" width="133" height="133" id="logo" alt=""></label>
                            <input type="file" name="logo" class="form-control" id="log">
                        </div>
                        <div id="srclog"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="idCompany" class="form-control" id="idE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btn_save" onclick="save_ent()" class="btn btn-primary">Valider</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Show modal view -->


<div class="modal fade" id="show_ent_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-center pb-4">Fiche Entreprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="get" action="javascript:void(0)" id="formShow2" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                <div id="logoShow"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="">
                                <div id="presShow"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="font-weight-bold">Secteurs d'activités:</p>

                            <div class="">
                                <div id="sectShow" class="selecpicker">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="font-weight-bold">Nous Contacter:</p>
                            <div class="">
                                <!--i class=""></i>Point focal : <i id="pfc"></i>
                            </br-->
                                <i class="fa fa-location-arrow"></i> <i id="adShow"></i>
                                </br>
                                <i class="fa fa-phone"></i> <i id="phoneShow"></i>
                                </br>
                                <i class="fa fa-envelope"></i> <i id="mailShow"></i>
                                </br>
                                <i class="fa fa-link"></i> <i id="swShow"></i>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="footerShow">
                    <input type="hidden" name="idEnt" class="form-control" id="idEnt">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="modal_ville_ent_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h3 class="modal-title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row pl-5">
                    <div class="col-md-5 listFormations"></div>
                    <div class="col-md-5 listEntreprises"></div>
                </div>
            </div>
        </div>
    </div>
</div>