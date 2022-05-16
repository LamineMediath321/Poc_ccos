<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h1>Connexion</h1>
    </div>
</section>

<div class="page-header header-filter mb-5" style="background-image: url('<?php echo base_url('assets/img/bg1.jpg'); ?>'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">

            <div class="row">
                <div class="col-md-7">
                    <img src="<?php echo base_url('assets/img/signin.png'); ?>" class="img-responsive" alt="" />
                </div>
                <div class="col-md-4">
                    <div class="card login-card">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url(); ?>/user/login" method="post">
                                <div class="card-header text-center">
                                    <h3 class="card-title login-title">Connectez-vous</h3>
                                </div>

                                <input type="email" name="email" class="form-control" placeholder="Ex: mon_mail@mail.com...">

                                <input type="password" name="password" class="form-control" placeholder="Mot de passe...">
                                <?php if (isset($validation)) : ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= $validation->listErrors() ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row p-4">
                                    <div class="col-12 submit-btn">
                                        <button type="submit" class="btn btn-style">Se connecter</button>
                                    </div>
                                    <div class="col-12 ">
                                        <div> <a class="text-secondary" href="<?php echo base_url(); ?>/register">Pas encore inscrit ?</a></div>
                                        <div style="margin-top:20px;"><a class="text-secondary" href="<?php echo base_url(); ?>/profile">Mot de passe oublié 💁</a></div>
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