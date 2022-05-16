
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h1>Changer son mot de passe</h1>
    </div>
</section>

<div class="page-header header-filter mb-5" style="background-image: url('<?php echo base_url('assets/img/bg1.jpg'); ?>'); background-size: cover; background-position: top center;">
<div class="container">
<div class="row">

<div class="row">
  <div class="col-md-6">
      <img src="<?php echo base_url('assets/img/profile.png'); ?>" class="img-responsive" alt=""/>
  </div>
  <div class="col-md-5">
  <div class="card login-card profile">
    <div class="card-body">
      <form class="form" action="<?php echo base_url("/user/edit");?>" method="post">

        <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" value="">
        <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="password_confirm" id="password_confirm" value="">         
        <?php if (isset($validation)): ?>
        <div class="col-12">
          <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors() ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-12 submit-btn">
              <button type="submit" class="btn btn-style">Confirmer</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>