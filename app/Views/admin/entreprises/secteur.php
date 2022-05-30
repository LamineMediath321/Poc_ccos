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
                    <li class="active">Secteurs d'activités</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row m-b-10">
            <div class="col-12 mb-3">
                <button type="button" class="btn btn-info" onclick="add_secteur()">
                    <i class="fa fa-plus"></i>
                    <a class="text-white"><i class="" aria-hidden="true"></i>
                        Ajouter un secteur
                    </a>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Liste des secteurs</h2>
                </div>
                <div class="card-body">
                    <div class="table-scrollable col-md-12">
                        <table id="table_secteur" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Intitule</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($secteurs as $secteur) { ?>
                                    <tr>
                                        <td><?= $secteur['intitule'] ?></td>
                                        <td class=" py-0 ">
                                            <div class="btn-group btn-group-sm">
                                                <?php if (session()->get('isAdmin')) : ?>
                                                    <button class="btn btn-primary btn-edit" href="#" onclick="edit_secteur(<?php echo $secteur['idSecteur']; ?>)"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-delete" onclick="delete_secteur(<?php echo $secteur['idSecteur']; ?>)"><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Intitule</th>
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
</div>

<div class="modal" id="modal_secteur_activite" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Secteur d'activité</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="javascript:void(0)" id="secteur_form" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="intituleSecteur">Intitule</label>
                                <input type="text" class="form-control" name="intituleSecteur" id="intituleSecteur" value="" onfocus="hideMessage()" onkeyup="ValiderInputSecteur()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                            <p id="error" style=" font-style:italic;"></p><i id="icon"></i>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idSecteur" class="form-control" id="idSecteur">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_save" onclick="save_secteur()" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>