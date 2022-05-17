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
                    <li class="active">competences</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
       
        <div class="row mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 style="color:brown">Liste des etudiants</h3>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive">
                            <table id="table_of" class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>UFR</th>
                                    <th>Candidatures</th>
                                    <th>Contacter</th>
                                    

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                 foreach ($students as $student) : ?>
                                    <tr>
                                    <th scope="row">
                                        <?= $i++ ?>
                                    </th>
                                    <td><a href="<?= base_url() ?>/admin/cv/<?= $student['idUtilisateur'] ?>" style="color:black"><?= $student['prenom'] ?></a></td>
                                    <td><a href="<?= base_url() ?>/admin/cv/<?= $student['idUtilisateur'] ?>" style="color:black"><?= $student['nom'] ?></a></td>
                                    <td><?= $student['email'] ?></td>
                                    <td><?= $student['intituleUfr'] ?></td>
                                    <td> <a href="<?= base_url() ?>/admin/candidatures/<?= $student['idUtilisateur'] ?>"><i class="fa fa-folder" aria-hidden="true" style="color:green"></i></a></td>
                                    <td><a  href="#" onclick="contacter(<?= $student['idUtilisateur'] ?>)"><i class="fa fa-envelope" aria-hidden="true" style="color:blue"></i></a></td>


                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>UFR</th>
                                        <th>Candidatures</th>
                                        <th>contacter</th>


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
    <div class="modal" id="add_comp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Nouveau mail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" action="javascript:void(0)" id="formComp" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body form">
                    <div class="row">
                           
                           <div class="form-group row ml-1">
                               <label for="objet" class="col-sm-2 col-form-label" style="font-weight:bold;">A</label>
                               <div class="col-sm-10">
                                   <input type="text" class="form-control" id="email" name="email" placeholder="">
                               </div>
                           </div>
                       </div>

                        <div class="row">
                           
                            <div class="form-group row ml-1">
                                <label for="objet" style="font-weight:bold;" class="col-sm-2 col-form-label">Objet</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="objet" placeholder="" name="objet" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-sm-12">
                                <label for="contenu" style="font-weight:bold;">Contenu</label>
                                <textarea class="form-control"  maxlength="1300" rows="4" placeholder="" name="contenu" required> </textarea>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-12 col-sm-6">

                                <div class="modal-footer">
                                    <input type="hidden" name="idCompetence" class="form-control" id="idCompetence">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="btn_save" onclick="save_contact()" class="btn btn-primary">Envoyer</button>
                                </div>
                        </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>




    
