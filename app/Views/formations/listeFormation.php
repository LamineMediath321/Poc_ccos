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

.btn-info{
    margin-top: 40px;
}

</style>

<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
<div class="container">
        <h6></h6>
    </div>
</section>
        <div class="container">
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h1>Liste des Formations</h1>
                </div>
                <div id="result"></div>
                <div class="card-body">
                    <div class="table-scrollable table-responsive">
                        <table id="table_form" class="table table-striped table-bordered table-hover first">
                            <thead>
                                <tr>
                                    <th>Intitulé du Diplome</th>
                                    <th>Type Formation</th>
                                    <th>Etablissement</th>
                                    <th>Ville</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                    foreach ($formations as $formation)
                                    {
                                ?>
                                        <td><?= $formation['intituleDiplome'] ?></td>
                                        <td><?= $formation['typeFormation'] ?></td>
                                        <td><?= $formation['nomEtab'] ?></td>
                                        <td><?= $formation['nomVille'] ?></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-primary btn-success" href="#" data-toggle="modal" data-target="#modal_formation_show" onclick="showFormation(<?php echo $formation['idFormation']; ?>)"><i class="fa fa-eye"></i></button>
                                                <?php if (session()->get('isAdmin')):?>
                                                    <button class="btn btn-primary btn-edit" href="#" onclick="edit_form(<?php echo $formation['idFormation']; ?>)"><i class="material-icons">edit</i></button>
                                                <?php endif;?>
                                            </div>
                                        </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Intitulé du diplome</th>
                                    <th>Type de Formation</th>
                                    <th>Etablissement</th>
                                    <th>Ville</th>
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

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
        <h4 class="modal-title">Formation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
<!--                             <input type="text" class="form-control" name="idEntreprise" id="idEntreprise" value="" hidden>
 -->                            <label for="nameF">Nom de la formation</label>
                            <input type="text" class="form-control" name="nameF" id="nameF" value="" >
                        </div>
                    </div> 
                <div class="col-12">                                        
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" name="desc" id="desc" minlength="10" maxlength="1300" rows="4" placeholder="" > </textarea>
                    
                    </div> 
                </div> 
                <div class="col-12">                                                                                  
                    <div class="form-group">
                        <label for="typeF">Type de formation</label>
                        <input type="text" class="form-control" name="typeF" id="typeF" value="" >
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="dip">Diplome équivalent</label>
                        <input type="text" class="form-control" name="dip" id="dip" value="" >
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="nomVille">Ville</label>
                        <?php /* $pfvalue = $this->getPF(); */ ?>
                        <select name="ville" value="" class="select2 form-control custom-select col-md-6" required >
                            <option>Select Ville</option>
                            <?Php  foreach($ville as $value):  ?>
                                <option value="<?php  echo $value['idVille']  ?>"><?php  echo $value['nom']  ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>  
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-md-4" for="nomEtab">Etablissement</label>
                        <?php /* $pfvalue = $this->getPF(); */ ?>
                        <select name="etab" value="" class="select2 form-control custom-select col-md-6" required >
                            <option>Select Etablissement</option>
                            <?Php  foreach($etab as $value):  ?>
                                <option value="<?php  echo $value['idEtablissement']  ?>"><?php  echo $value['nom']  ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>  
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="select_contain" >
                        <label for debouches>Selectionner les débouchés</label>
<!--                         <select name="secteur[]" id="secteur" class="js-example-basic-multiple" multiple style="width: 50%">
 -->
<!--                         <select multiple class="bootstrap-select" name="secteur[]" data-style="btn btn-link" id="secteur">
 -->
                        <select name="debouches[]" multiple class="bootstrap-select selectpicker" data-style="btn-success" data-container="select_contain" id="debouches" required>
                            <option>Select Débouchés</option>

                            <?Php  foreach($debouches as $value):  ?>
                                <option value="<?php  echo $value['idDebouches']  ?>"><?php  echo $value['intitule']  ?></option>
                            <?php endforeach;  ?>
                        </select>

                    </div>
                </div>
                <div id="srclog"></div>                                          
                                    
                
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idF" class="form-control" id="idF">                                       
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" id="btn_save" onclick="saveF()" class="btn btn-primary">Valider</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>

<!-- Show modal view -->
<div class="modal fade" id="modal_formation_show" role="dialog" >
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
        <h4 class="modal-title">Fiche Formation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="get" action="javascript:void(0)" id="formationShowForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="row">-->
                            <div class="form-group col-md-12">
                                <label style="float:left;margin-right:5px;">Etablissement:</label>
                                <div id="etbl"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label style="float:left;margin-right:5px;">Intitule diplome:</label>
                                <div><p id="intDip"></p></div>
                            </div>
                            <div class="form-group col-md-12">
                                <label style="float:left;margin-right:5px;">Diplome equivalant:</label>
                                <div><p id="dpeq"></p></div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label style="float:left;margin-right:5px;">Type Formation:</label>
                                <div id="typeForm"></div>
                            </div>
                            <div class="form-group col-md-12">
                                <div id="desc1"></div>
                            </div> 
                            <div class="form-group col-md-12">
                                <label style="float:left;margin-right:5px;">Débouchés</label>
                                <div id="deb"></div>
                            </div>
                            
                        <!--</div>-->
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer" id="footerShow">
                <input type="hidden" name="idForm" class="form-control" id="idForm">                                       
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         </div>
           
        </form>
        </div>
    </div>
</div>
