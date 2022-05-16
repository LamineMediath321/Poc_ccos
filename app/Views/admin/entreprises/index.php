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
                        <li><a href="#">Entreprises</a></li>
                        <li class="active">Liste</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row m-b-10">
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-info" onclick="add_ent()">
                        <i class="fa fa-plus"></i>
                        <a class="text-white"><i class="" aria-hidden="true"></i>
                            Ajouter une entreprise
                        </a>
                    </button>
                </div>
            </div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h2>Liste des entreprises</h2>
            </div>
            <div id="result"></div>
            <div class="card-body">
                <div class="table-scrollable table-responsive">
                    <table id="table_id" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Pr&eacute;sentation</th>
                                <th>Site Web</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($companies as $company)  { ?>
                                <tr>
                                    <td><?= $company['nomEntreprise'] ?></td>
                                    <td><?= substr($company['presentation'], 0, 70) . ' . . . ' ?></td>
                                    <td><?= $company['siteWeb'] ?></td>
                                    <td class="py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-primary btn-success" href="#" data-toggle="modal" data-target="#show_ent_modal" onclick="show_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-eye"></i></button>
                                            <?php if (session()->get('isAdmin')):?>
                                                <button class="btn btn-primary btn-edit" href="#" onclick="edit_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btn-delete" onclick="delete_ent(<?php echo $company['idEntreprise']; ?>)"><i class="fa fa-trash"></i></button>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Pr&eacute;sentation</th>
                                <th>Site Web</th>
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
                                        <?Php foreach ($cities as $value) :  ?>
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