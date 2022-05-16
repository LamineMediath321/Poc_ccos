
<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
	<div class="container">
        <h2>Ajouiter son entreprise</h2>
	</div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<!-- General Detail Start -->
<div class="detail-desc advance-detail-pr gray-bg">
    <div class="container white-shadow">
        <div class="container bottom-mrg">
        <form method="post" action="<?php echo base_url(); ?>/Entreprises/create_company" id="form" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
                <div class="detail-pic js">
                    <div class="box">             
                        <input type="file" name="logo" id="upload-pic" class="inputfile"/>
                        <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nom entreprise" name="company_name" id="company_name" value="">
                    </div>
                </div>
                <div class=""> 
                        <input type="hidden" class="form-control" name="point_focal" value="<?= session('id') ?>">
                    </div>
                <div class="col-md-4 col-sm-4">                                                                                  
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="mail" value="">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">                                                                                  
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telephone" name="phone" value="">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Adresse" name="address" value="">
                    </div>
                </div>   
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <select name="villes" value="" class="select2 form-control custom-select" data-container="select_contain" required>
                            <option value="">Choisir la ville</option>
                            <?Php  if (isset($cities)): foreach($cities as $value):  ?>
                                <option value="<?php  echo $value['idVille']  ?>"><?php  echo $value['nom']  ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>  
                </div> 
                <div class="col-md-4 col-sm-4">                                                                                  
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Site web" name="website" value="">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group" id="select_contain" >
                        <label for="">Secteur d'activité: </label>
                        <select name="secteur[]" multiple class="bootstrap-select selectpicker" data-style="btn-success" data-container="select_contain" id="secteur" required>
                            <option>Select Secteur</option>
                            <?Php if(isset($secteurs)): foreach($secteurs as $value):  ?>
                                <option value="<?php  echo $value['idSecteur']  ?>"><?php  echo $value['intitule']  ?></option>
                            <?php endforeach; endif;?>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-12 col-sm-12">    
                    <textarea class="form-control textarea" name="presentation" placeholder="Pr&eacute;sentation de l'entreprise" id="pres"  placeholder=""> </textarea>							
                </div> 
            </div>
            <div class="col-md-12 col-sm-12 text-center mt-10">
                <button type="submit" class="btn btn-success">Ajouter</button>	
            </div>
        </form>
        </div>
    </div>
</div>
<!-- General Detail End -->
