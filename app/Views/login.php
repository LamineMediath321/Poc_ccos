<!doctype html>
<html lang="en">

<head>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/icon.png'); ?>" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/owl.carousel.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('css/login.css') ?>">

    <title>Plateforme Opportunit&eacute;s|login</title>
</head>

<body>



    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url('assets/images/ugb.jpg'); ?>"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h1 class="mb-5" style="color: #3b5998;">Connexion</h1>

                        <h3 class="mb-4">Plateforme <span> d'Opportunit&eacute;s</span></h3>
                        <form action="<?php echo base_url(); ?>/user/login" method="post" id="loginForm">
                            <div class="form-group first">
                                <label class="control-label" for="username">Login</label>
                                <input type="email" name="email" class="form-control" placeholder="login@example.com">
                            </div>
                            <div class="form-group last mb-3">
                                <label class="control-label" for="password">Mot de passe</label>
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                            </div>

                            <!--Les erreurs-->
                            <?php if (isset($validation)) : ?>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!--end-->

                            <div class="d-flex mb-5 align-items-center">
                                <a href="<?php echo base_url(); ?>/register" style="text-decoration:none; ">Pas encore un compte ?</a>
                                <a href="#" class="ml-auto forgot-pass" style="text-decoration:none; ">Mot de passe oublié ?</a>
                            </div>

                            <input type="submit" value="Se connecter" class="btn btn-block btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="<?php echo base_url('js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery.validate.js') ?>"></script>
    <script src="<?php echo base_url('js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('js/main.js') ?>"></script>
    <script>
        $().ready(function() {
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Veillez entrer votre login",
                        email: "Veillez saisir une adresse email correcte"
                    },
                    password: {
                        required: "Veillez entrer un mot de passe",
                        minlength: "Votre mot de passe doit contenir au moins 8 caracteres"
                    }
                }

            });
        });
    </script>
</body>

</html>