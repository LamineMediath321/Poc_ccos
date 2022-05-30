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
                    <li><a href="#">Elements</a></li>
                    <li class="active">Profils</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-info" onclick="add_profile()">
                    <i class="fa fa-plus"></i>
                    <a class="text-white"><i class="" aria-hidden="true"></i>
                        Ajouter un profil
                    </a>
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h3 class="card-title" style="color:brown">Liste des profils</h3>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive  col-md-12">
                            <table id="table_of" class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Intitul&eacute;</th>
                                        <th>Domaine</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($profiles as $profile) { ?>
                                        <tr>
                                            <td><?= $profile['intitule'] ?></td>
                                            <td><?= $profile['field_title'] ?></td>


                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <!-- <button class="btn btn-success" href="#" data-toggle="modal" data-target="#modal_competence_show" onclick=""><i class="fa fa-eye"></i></button> -->

                                                    <?php if (session()->get('isAdmin')) : ?>
                                                        <button class="btn btn-primary btn-edit" href="#" onclick="edit_profile(<?php echo $profile['idProfil']; ?>)"><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-delete" onclick="delete_profile(<?php echo $profile['idProfil']; ?>)"><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Intitul&eacute;</th>


                                        <th colspan="2">Action</th>
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
    <div class="modal" id="profile_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Profil</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body form">
            <form method="post" action="javascript:void(0)" id="profile_form" enctype="multipart/form-data" class="form-horizontal">
               
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="profile_title">Intitule</label>
                            <input type="text" class="form-control" name="profile_title" id="profile_title" value="" onfocus="hideMessage()" onkeyup="ValiderInputProfile()">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="">Domaine</label>
                            <select name="field" id="" class="select2 form-control custom-select"  onfocus="hideMessage()">
                                <option value="">Sélectionnez le domaine</option>
                                <?Php  foreach($fields as $field):  ?>
                                    <option value="<?php  echo $field['idDomaine']  ?>"><?php  echo $field['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                        
                 <p id="error" style=" font-style:italic;"></p><i id="icon"></i>
                </div>
            </div>
                <div class="modal-footer">
                    <input type="hidden" name="idProfile" class="form-control" id="idProfile">                                       
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_save" onclick="save_profile()" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>