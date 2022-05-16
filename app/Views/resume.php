
<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
	<div class="container">
        <h2></h2>
	</div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Resume Detail Start -->
<section class="detail-desc">
	<div class="container white-shadow">
		<div class="row ">
			<div class="detail-pic">
			<img src="<?= $resume ? base_url() . '/assets/images/' . $persinfo['photo'] : base_url() . '/assets/images/avatar.png' ?>" width="133" height="133" alt="photo de profil">
			</div>

			<div class="detail-status">
                <?php if (!$resume):?>
                    <span>Informations personnelles incompletes</span>

                <?php elseif ($persinfo['idUtilisateur'] == session('id')):?>

                        <a href="#" onclick="edit_perso_info(<?php echo session('id'); ?>)">
                            <i class="fa fa-pencil"></i>
                        </a>
                <?php  endif; ?>
            </div>
        </div>
		<div class="row bottom-mrg mrg-0">
			<div class="col-md-8 col-sm-8">
				<div class="detail-desc-caption">
					<h4> <?= ucfirst($persinfo['prenom']) . ' ' . strtoupper($persinfo['nom']) ?></h4>
					<span class="designation">
					    <?= $resume && $persinfo['profils'] ? $persinfo['profils'] : '' ?>
					</span>
					<p>
                      	<?= $resume ? $persinfo['description'] : '' ?>
					</p>
                   
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="get-touch">
					<h4>Coordonn&eacute;es</h4>
					<ul>
						<li><i class="fa fa-map-marker"></i><span><?= $resume ? $persinfo['adresse'] : ' - - - ' ?></span></li>
						<li><i class="fa fa-envelope"></i><span><?= $resume ? $persinfo['email'] : ' - - - ' ?></span></li>
						<li><i class="fa fa-phone"></i><span><?= $resume ? $persinfo['telephone'] : ' - - - ' ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<?php if (!$resume):?>
		<div class="row no-padd mrg-0">
			<div class="detail pannel-footer">
				<div class="col-md-7 col-sm-7 padd-15">
					<p> <i class="fa fa-warning"></i> Veuillez completer vos informations pour pouvoir continuer le processus de creation</p>
				</div>
				<div class="col-md-5 col-sm-5">
					<div class="detail-pannel-footer-btn pull-right">
						<a href="#" class="footer-btn grn-btn" title="hdjhd"  onclick="perso_info(<?php echo session('id'); ?>)">Completer mes informations</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		<?php endif; ?>		
</section>
<!-- Resume Detail End -->


<?php if ($resume): ?>
<section class="full-detail-description full-detail resume-detail">
	<div class="container">
	
		<div class="row row-bottom mrg-0">
			<h2 class="detail-title">
				Formations
                <?php if ($persinfo['idUtilisateur'] == session('id')):?>
                    <a href="#"  onclick="add_formation(<?php echo session('id'); ?>)">
                        <i class="pull-right fa fa-plus"></i>
                    </a>
                <?php endif; ?>
			</h2>
			<?php if ($formations): ?>
            <ul class="detail-list">
                <?php foreach ($formations as $formation) :?>
                <li>
                    <div class="row">
                    
                        <div class="col-md-9 col-sm-9 col-xs-9">
                                <h4 class="text-danger"><?= $formation['etablissement'] ?></h4>

                                <p class="">
                                    <span class=""><?= $formation['niveau_etude'] ?> en <?= $formation['domaine'] ?></span>
                                </p>
                                <p class="">
                                    <span>
                                        <?php 
                                            setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
                                            echo strftime("%b %G", strtotime($formation['dateDebut']));
                                        ?> 
                                        –
                                        <?php 
                                            setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
                                            echo strftime("%b %G", strtotime($formation['dateFin']));
                                        ?>

                                    </span>
                                </p>

                        </div>
                        <?php if ($persinfo['idUtilisateur'] == session('id')):?>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <a href="#"  onclick="edit_formation(<?= $formation['idFormation'] ?>)">
                                <i class="pull-right fa fa-pencil"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
					<hr>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif; ?>
		</div>
		<div class="row row-bottom mrg-0">
			<h2 class="detail-title">
                Experience Professionnelle
                <?php if ($persinfo['idUtilisateur'] == session('id')):?>
                    <a href="#"  onclick="add_experience(<?php echo session('id'); ?>)">
                        <i class="pull-right fa fa-plus"></i>
                    </a>
                <?php endif; ?>
			</h2>
			<?php if ($experiences): ?>
			<ul class="detail-list">
				<?php foreach ($experiences as $experience) :?>
				<li class="">
					<div class="row">
					
						<div class="col-md-8 col-sm-9 col-xs-9">
								<h4 class="text-danger"><?= $experience['intitulePoste'] ?></h4>

								<p class=" t-10 t-black t-normal">
									<span class=""><?= $experience['employeur'] ?></span>
								</p>
								<p class="t-14 t-black--light t-normal">
									<span>
										<?php 
											setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
											echo strftime("%b %G", strtotime($experience['dateDebut']));
										?> 
										–
										<?php 
											setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
											echo strftime("%b %G", strtotime($experience['dateFin']));
										?>

									</span>
								</p>
								<p class=" t-10 t-black t-normal">
									<?= $experience['realisation'] ?>
								</p>
						</div>

						<?php if ($persinfo['idUtilisateur'] == session('id')):?>
                        <div class="col-md-2 col-sm-2 col-xs-2">
							<a href="#"  onclick="update_experience(<?php echo $experience['idExperience']; ?>)">
								<i class="pull-right fa fa-pencil"></i>
							</a>
						</div>
                        <?php endif; ?>
					</div><hr>
				</li>
				<?php endforeach;?>
			</ul>
			<?php endif; ?>
		</div>
		
		<div class="row row-bottom">
			<div class="col-md-6 col-sm-6">
				<h2 class="detail-title">
					Competences
                    <?php if ($persinfo['idUtilisateur'] == session('id')):?>    
                        <a href="#"  onclick="add_skill(<?php echo session('id'); ?>)">
                            <i class="pull-right fa fa-plus"></i>
                        </a>
                    <?php endif; ?>
				</h2>
				<div class="ext-mrg row third-progress">
					<div class="panel-body">
						<?php if ($userSkills): ?>
							<div class="detail-desc-skill">
								<?php foreach($userSkills as $skill): ?>
									<span class="">
										<?= $skill['intitule'] ?>
									</span>
								<?php endforeach;?>					
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<h2 class="detail-title">
					Langues
					<?php if ($persinfo['idUtilisateur'] == session('id')):?>
                        <a href="#"  onclick="add_language()">
                            <i class="pull-right fa fa-plus"></i>
                        </a>
                    <?php endif; ?>
                </h2>
				<div class="ext-mrg row third-progress">
					<div class="panel-body">
						<?php if ($userLanguages): ?>
                            <?php foreach($userLanguages as $language): ?>
                                <div class="col-md-6">
                                    <span>
                                        <?= $language['intitule'] ?> : 
                                        <small><?= $language['niveau'] ?></small>
                                    </span>
                                </div>
                            <?php endforeach;?>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</section>
<?php endif; ?>
<!-- Modal d'ajout des informations personnelles -->
<div class="modal fade" id="personal_info" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
        <h4 class="modal-title">Informations personnelles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="student_form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label for="lstname">Nom</label>
                            <input type="text" class="form-control" name="lstname" id="lstname" value="" readonly>
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label for="fstname">Prenom</label>
                            <input type="text" class="form-control" name="fstname" id="fstname" value="" readonly>
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="" readonly>
                        </div>
                    </div>   
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="phone">Numero de telephone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="">
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="adress">Adresse</label>
                            <input type="text" class="form-control" name="adress" id="adress" value="">
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">

                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="sex">Genre</label>
                            <select name="sex" id="sex" class="form-control custom-select">
                                <option>Genre</option>
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class=""  for="bthDay">Date de Naissance</label>
                            <input type="date" class="form-control" name="bthDay" id="bthDay" value="">
                        </div>
                    </div>  
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="bthPlace">Lieu de Naissance</label>
                            <input type="text" class="form-control" name="bthPlace" id="bthPlace" value="">
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="natnalty">Nationnalite</label>
                            <input type="text" class="form-control" name="natnalty" id="natnalty" value="">
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-6">                                        
                        <div class="form-group">
                            <label class="bmd-label-floating" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                        </div> 
                    </div>
                    <div class="col-xs-9 col-sm-6">
                        <div class="form-group">
                            <label for="pic"><img src="" width="130" height="130" id="pict" alt="" ></label> 
                            <input type="file" name="pict" class="form-control" id="pic" > 
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

<!-- Modal d'ajout d'une formation -->
<div class="modal fade" id="formation_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Ajouter une formation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="formationForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">                                                                                  
                        <div class="form-group">
                            <label class="bmd-label-floating" for="school">Etablissement</label>
                            <input type="text" list="schools" class="form-control" name="school" id="school" >
                            <datalist id="schools">
                                <?php
                                    foreach($schools as $school):
                                ?>
                                    <option value="<?= $school['nom']  ?>"></option>
                                <?php
                                    endforeach;
                                ?>
                            </datalist>
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="studyLevel">Niveau d'étude</label>
                            <!--input type="text" class="form-control" name="diploma" id="diploma" value="" -->
                            <select name="studyLevel" class="select2 form-control custom-select">
                                <option>Choisissez...</option>
                                <?Php  foreach($studyLevels as $studyLevel):  ?>
                                    <option value="<?= $studyLevel['idNiveauEtude']  ?>"><?= $studyLevel['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 field">
                        <div class="form-group">
                            <label for="field">Domaine</label>
                            <select name="field" class="select2 form-control custom-select">
                                <option>Choisissez...</option>
                                <?Php  foreach($fields as $field):  ?>
                                    <option value="<?= $field['idDomaine']  ?>"><?= $field['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="startDate">Date debut</label>
                            <input type="date" class="form-control" name="startDate" id="startDate" value="">
                        </div>
                    </div>     
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="endDate">Date fin</label>
                            <input type="date" class="form-control" name="endDate" id="endDate" value="">
                        </div>
                    </div>               
                    <div class="col-12 col-sm-6">                                        
                        <div class="form-group">
                            <label class="bmd-label-floating" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">          
                <input type="hidden" name="idForm">                            
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" id="btn_save" onclick="save_form()" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal d'ajout d'une experience professionnelle -->
<div class="modal fade" id="experience_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Ajouter une experience professionnelle</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="experience_form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">                                                                                  
                        <div class="form-group">
                            <label class="bmd-label-floating" for="jobTitle">Intitulé poste</label>
                            <input type="text" class="form-control" name="jobTitle" id="jobTitle" value="">
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6">                                                                                  
                        <div class="form-group">
                            <label class="bmd-label-floating" for="company">Entreprise</label>
                            <input type="text" class="form-control" name="company" id="company" value="">
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="startDate">Date debut</label>
                            <input type="date" class="form-control" name="startDate" id="startDate" value="">
                        </div>
                    </div>     
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="endDate">Date fin</label>
                            <input type="date" class="form-control" name="endDate" id="endDate" value="">
                        </div>
                    </div>               
                    <div class="col-12 col-sm-10">                                        
                        <div class="form-group">
                            <label class="" for="realisation">Réalisation</label>
                            <div id="editor" style="height: 200px;"></div>
                            <textarea class="form-control hidden" name="realisation" id="realisation" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <input type="hidden" name="idExp">                                  
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" id="btn_save" onclick="save_experience()" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal d'ajout d'une competence -->
<div class="modal fade" id="add_skill" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Ajout des competences</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="skill_form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="skill">Competences</label>
                            <select name="skills[]" multiple class="select2 form-control custom-select selectpicker" data-style="btn-success" data-container="select_contain" id="skill">
                                <option>Choisissez...</option>

                                <?Php  foreach($skills as $skill):  ?>
                                    <option value="<?= $skill['idCompetence']  ?>"><?= $skill['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">                                      
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" id="btn_save" onclick="save_skill()" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal d'ajout d'une competence -->
<div class="modal fade" id="add_language" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Ajout d'une langue</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="language_form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="language">Langue</label>
                            <select name="language" class="select2 form-control custom-select" id="language">
                                <option>Selectionnez la langue...</option>

                                <?Php  foreach($languages as $language):  ?>
                                    <option value="<?= $language['idLangue']  ?>"><?= $language['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="level">Niveau</label>
                            <select name="level" class="select2 form-control" data-container="select_contain" id="level">
                                <option>Selectionnez votre niveau de comprehension...</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Assez bien">Assez bien</option>
                                <option value="Tres bien">Tres bien</option>
                                <option value="Excellent">Excellent</option>
                                <option value="Maternelle">Maternelle</option>
                                <option value="Technique">Technique</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                                      
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" id="btn_save" onclick="save_language()" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    </div>
</div>