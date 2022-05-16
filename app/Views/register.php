<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h1>Inscription</h1>
    </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-offset-1 col-md-5 signup-img">
        <img src="<?php echo base_url('assets/img/signup.svg'); ?>" class="img-responsive" alt=""/>
    </div>
          
    <div class="col-md-5 ml-auto mr-auto">
      <div class="card login-card">
        <form class="p-3 form" action="<?php echo base_url(); ?>/register" method="post">
          <div class="card-header card-header-primary text-center">
            <h3 class="card-title login-title">Inscription</h3>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <input required type="text" placeholder="Pr&eacute;nom(s)" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <input required type="text" class="form-control" placeholder="NOM" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <input required type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                    <select name="ufr" value="" class="form-control">
                        <option value="">UFR</option>
                        <?php if(isset($ufrs)):
                          foreach($ufrs as $ufr):  ?>
                            <option value="<?= $ufr['idUfr']  ?>"><?= $ufr['intitule'] ?></option>
                        <?php endforeach;  
                          endif; 
                        ?>
                    </select>
                </div>  
              </div>
            <div class="col-sm-6">
              <div class="form-group">
              <select id="inputState" name="profil" class="form-control" required>
                <option selected>Vous etes...</option>
                  <?php if(isset($roles)):
                    foreach($roles as $role):  ?>
						<option value="<?= $role['idRole']  ?>"><?= strtoupper($role['intitule']) ?></option>
					<?php endforeach;  
						endif; 
				  ?>
              </select>
              </div>
            </div>
            <div id="code_etudiant" class="col-12 col-sm-6" style="display:none">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Code &eacute;tudiant" name="code_etudiant" id="code_etudiant" value="<?= set_value('code_etudiant') ?>">
              </div>
            </div>
              <div class="col-12 col-sm-6 personnel" style="display:none">
                <div class="form-group">
                  <select name="section" value="" class="form-control">
                      <option>Section</option>
                      <?php if (isset($sections)):  
                        foreach($sections as $section):  ?>
                          <option value="<?= $section['idsection']  ?>"><?= $section['intitule'] ?></option>
                      <?php endforeach;  
                      endif;?>
                  </select>
                </div>
              </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <input required type="password" placeholder="Mot de passe" class="form-control" name="password" id="password" value="">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                <input required type="password" placeholder="Confirmation mot de passe" class="form-control" name="password_confirm" id="password_confirm" value="">
              </div>
            </div>
            <?php if (isset($validation)) : ?>
              <div class="col-12 col-sm-12">
                <div class="alert alert-danger" role="alert">
                  <?= $validation->listErrors() ?>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 submit-btn">
              <button type="submit" class="btn  btn-style">S'inscrire</button>
            </div>
            <div class="col-12 ">
              <a href="<?php echo base_url();?>/connexion">Vous avez d&eacute;j&agrave; un compte ?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>