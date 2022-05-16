
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h1>Connexion</h1>
    </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-12 mt-5 mb-5">
        <div class="row">
            <div class="col-md-2">
                <img src="<?= $resume ? base_url() . '/assets/images/' . $persinfo['photo'] : base_url() . '/assets/images/avatar.png' ?>" width="133" height="133" alt="photo de profil">
            </div>
            <div class="col-md-8">
                <span> 
                    <strong>Nom & prenom(s) :</strong>
                    <?= strtoupper($persinfo['nom']) . ' ' . ucfirst($persinfo['prenom']) ?>
                </span><br>
                <span> 
                    <strong>Email :</strong>
                    <?= $persinfo['email'] ?>
                </span><br>
                <span> 
                    <strong>Sexe :</strong>
                    <?= $resume ? $persinfo['genre'] : '' ?>
                </span><br>
                <span> 
                    <strong>Date de naissance :</strong>
                    <?= $resume ? $persinfo['dateNaissance'] : '' ?>
                </span><br>
                <span> 
                    <strong>Lieu de naissance :</strong>
                    <?= $resume ? $persinfo['lieuNaissance'] : '' ?>
                </span><br>
                <span> 
                    <strong>Adresse :</strong>
                    <?= $resume ? $persinfo['adresse'] : '' ?>
                </span><br>
                <span> 
                    <strong>Nationalite :</strong>
                    <?= $resume ? $persinfo['nationalite'] : '' ?>
                </span><br>
                <span> 
                    <strong>Profils :</strong>
                    <?php 
                        $i = 0;
                        foreach($userProfiles as $profile)
                        {   
                            echo ($i == 1) ? ' - ' : '';
                            echo ucfirst($profile['intitule']);
                            $i = 1;
                        }
                    ?>
                </span><br>
            </div>
            <div class="col-md-10">
                <?= $resume ? $persinfo['description'] : '' ?>
            </div>
            <?php if(!$resume){?>
        <div class="col-12">
        <p><i class="material-icons">warning</i> Completez vos informations personnelles pour pouvoir creer votre cv</p>
            <button class="btn"  onclick="perso_info(<?php echo session('id'); ?>)">
            <i class="material-icons">add</i> 
            </button>
        </div>
        <?php }?>
        </div>
    </div>
    <?php if ($resume) {?>
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">
                Experience Professionnelle
                <a href="#"  onclick="add_experience(<?php echo session('id'); ?>)">
                    <i class="pull-right material-icons">add</i>
                </a>
            </h3>
            <div class="card-body">
                <?php if ($experiences): ?>
                <ul class="list-group list-group-flush">
                    <?php foreach ($experiences as $experience) :?>
                    <li class="list-group-item">
                        <div class="row">
                        
                            <div class="col-md-9">
                                    <h3 class="t-16 t-black t-bold"><?= $experience['intitulePoste'] ?></h3>

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

                            <div class="col-md-2">
                                <a href="#"  onclick="">
                                    <i class="pull-right material-icons">edit</i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">
                Formations
                <a href="#"  onclick="add_formation(<?php echo session('id'); ?>)">
                    <i class="pull-right material-icons">add</i>
                </a>
            </h3>
            <div class="card-body">
            <?php if ($formations): ?>
            <ul class="list-group list-group-flush">
                <?php foreach ($formations as $formation) :?>
                <li class="list-group-item">
                    <div class="row">
                    
                        <div class="col-md-9">
                                <h3 class="t-16 t-black t-bold"><?= $formation['etablissement'] ?></h3>

                                <p class=" t-10 t-black t-normal">
                                    <span class=""><?= $formation['niveau_etude'] ?> en <?= $formation['domaine'] ?></span>
                                </p>
                                <p class="t-14 t-black--light t-normal">
                                    <span>
                                        <?php 
                                            setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
                                            echo strftime("%d %B %G", strtotime($formation['dateDebut']));
                                        ?> 
                                        –
                                        <?php 
                                            setlocale(LC_TIME, 'fr_FR.utf8','french','French_France.1252','fr_FR.ISO8859-1','fra');
                                            echo strftime("%d %B %G", strtotime($formation['dateFin']));
                                        ?>

                                    </span>
                                </p>

                        </div>

                        <div class="col-md-2">
                            <a href="#"  onclick="">
                                <i class="pull-right material-icons">edit</i>
                            </a>
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">
                Competences
                <a href="#"  onclick="add_skill(<?php echo session('id'); ?>)">
                    <i class="pull-right material-icons">add</i>
                </a>
            </h3>
            <div class="card-body">
                <?php if ($userSkills): ?>
                <ol class="list-group">
                    <?php foreach($userSkills as $skill): ?>
                        <li class="list-group-item">
                            <?= $skill['intitule'] ?>
                        </li>
                    <?php endforeach;?>
                </ol>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <h3 class="card-header">
                Langues
                <a href="#"  onclick="add_language()">
                    <i class="pull-right material-icons">add</i>
                </a>
            </h3>
            <div class="card-body">
                <?php if ($userLanguages): ?>
                    <ol class="list-group">
                        <?php foreach($userLanguages as $language): ?>
                            <li class="list-group-item">
                                <p>
                                    <?= $language['intitule'] ?> <br> 
                                    <small><?= $language['niveau'] ?></small>
                                </p>
                            </li>
                        <?php endforeach;?>
                    </ol>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php }?>
  </div>
</div>

<!-- Modal d'ajout des informations personnelles -->
<div class="modal fade" id="personal_info" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
        <h4 class="modal-title">Informations personnelles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="formcv" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="lstname">Nom</label>
                            <input type="text" class="form-control" name="lstname" id="lstname" value="" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="fstname">Prenom</label>
                            <input type="text" class="form-control" name="fstname" id="fstname" value="" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input type="email" class="form-control" name="mail" id="mail" value="" readonly>
                        </div>
                    </div>   
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="phone">Numero de telephone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="adress">Adresse</label>
                            <input type="text" class="form-control" name="adress" id="adress" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="profile">Profil</label>
                            <select name="profiles[]" multiple class="select2 form-control custom-select selectpicker" data-style="btn-success" data-container="select_contain" id="profile">
                                <option>Choisissez...</option>
                                <?Php  foreach($profiles as $profile):  ?>
                                    <option value="<?php  echo $profile['idProfil']  ?>"><?php  echo $profile['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="sex">Genre</label>
                            <select name="sex" id="sex" class="form-control custom-select">
                                <option>Genre</option>
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class=""  for="bthDay">Date de Naissance</label>
                            <input type="date" class="form-control" name="bthDay" id="bthDay" value="">
                        </div>
                    </div>  
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="bthPlace">Lieu de Naissance</label>
                            <input type="text" class="form-control" name="bthPlace" id="bthPlace" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="natnalty">Nationnalite</label>
                            <input type="text" class="form-control" name="natnalty" id="natnalty" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">                                        
                        <div class="form-group">
                            <label class="bmd-label-floating" for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                        </div> 
                    </div>
                    <div class="col-12 col-sm-6">
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
                <button type="submit" id="btn_save" onclick="save_cv()" class="btn btn-primary">Valider</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

<!-- Modal d'ajout d'une formation -->
<div class="modal fade" id="add_formation" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h4 class="modal-title">Ajouter une formation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="javascript:void(0)" id="form" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-12 col-sm-6">                                                                                  
                        <div class="form-group">
                            <label class="bmd-label-floating" for="school">Etablissement</label>
                            <input type="text" class="form-control" name="school" id="school" value="">
                        </div>
                    </div> 
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="studyLevel">Niveau d'étude</label>
                            <!--input type="text" class="form-control" name="diploma" id="diploma" value="" -->
                            <select name="studyLevel" value="" class="select2 form-control custom-select">
                                <option>Choisissez...</option>
                                <?Php  foreach($studyLevels as $studyLevel):  ?>
                                    <option value="<?php  echo $studyLevel['idNiveauEtude']  ?>"><?php  echo $studyLevel['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 field">
                        <div class="form-group">
                            <label for="field">Domaine</label>
                            <select name="field" value="" class="select2 form-control custom-select">
                                <option>Choisissez...</option>
                                <?Php  foreach($fields as $field):  ?>
                                    <option value="<?php  echo $field['idDomaine']  ?>"><?php  echo $field['intitule']  ?></option>
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
                <input type="hidden" name="idEntreprise" class="form-control" id="idEntreprise">                                       
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_save" onclick="save_form()" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal d'ajout d'une experience professionnelle -->
<div class="modal fade" id="add_experience" role="dialog">
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
                            <textarea class="form-control" name="realisation" id="realisation" minlength="10" maxlength="1300" rows="4" placeholder=""> </textarea>

                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idEntreprise" class="form-control" id="idEntreprise">                                       
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_save" onclick="save_experience()" class="btn btn-primary">Submit</button>
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
                                    <option value="<?php  echo $skill['idCompetence']  ?>"><?php  echo $skill['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">                                      
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            <h4 class="modal-title">Ajout une langue</h4>
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
                                    <option value="<?php  echo $language['idLangue']  ?>"><?php  echo $language['intitule']  ?></option>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_save" onclick="save_language()" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    </div>
</div>