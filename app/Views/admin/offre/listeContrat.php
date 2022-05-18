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
                    <li class="active">Types de contrat</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
    <div class="row"> 
    <div class="col-12">
        <button type="button" class="btn btn-info" href="#" data-target="modal_form_of" onclick="add_contract_type()">
            <i class="fa fa-plus"></i>
            <a class="text-white">
                <i class="" aria-hidden="true"></i> 
                Ajouter
            </a>
        </button>
    </div>
    </div>
<div class="row mt-5">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h1>Liste des types de contrat</h1>
                </div>
                <div id="result"></div>
                <div class="card-body">
                    <div class="table-scrollable">
                        <table id="table_tc" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Intitule du contrat</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contrats as $opportunite)  { ?>
                                	<tr>
                                        <td><?= $opportunite['intitule'] ?></td>
                                        
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                               <?php if (session()->get('isAdmin')):?>
                                                    <button class="btn btn-primary btn-edit" href="#" onclick="edit_contract_type(<?php echo $opportunite['idTypeContrat']; ?>)"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger btn-delete" onclick="delete_contract_type(<?php echo $opportunite['idTypeContrat']; ?>)"><i class="fa fa-trash"></i></button>
                                                <?php endif;?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add modal view -->

<div class="modal" id="modal_form_tc" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
            <h4 class="modal-title">Type Contrat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="javascript:void(0)" id="formtc" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="intituleTC">Intitule</label>
                                <input type="text" class="form-control" name="intituleTC" id="intituleTC" value="" onfocus="hideMessage()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <p id="error" style=" font-style:italic;"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idTC" class="form-control" id="idTC">                                       
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_save" onclick="save_contract_type()" class="btn btn-primary">Valider</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
