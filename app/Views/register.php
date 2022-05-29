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
    <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url('assets/images/ugb_inscription.jpg'); ?>"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-10">
            <h1 class="mb-5 text-center" style="color: #3b5998;">Inscription</h1>

            <h3 class="mb-4">Plateforme <span> d'Opportunit&eacute;s</span></h3>
            <form action="<?php echo base_url(); ?>/register" method="post" id="registerForm">
              <div class="row">
                <div class="form-group col-12 col-sm-6">
                  <label for="firstname">Prenom</label>
                  <input type="text" placeholder="Pr&eacute;nom(s)" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
                </div>
                <div class="form-group first col-12 col-sm-6">
                  <label for="lastname">Nom</label>
                  <input required type="text" class="form-control" placeholder="NOM" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
                </div>
              </div>
              <div class="form-group last mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
              <div class="row">
                <div class="form-group last mb-3 col-12 col-sm-7">
                  <select name="ufr" value="" class="form-control">
                    <option value="">UFR</option>
                    <?php if (isset($ufrs)) :
                      foreach ($ufrs as $ufr) :  ?>
                        <option value="<?= $ufr['idUfr']  ?>"><?= $ufr['intitule'] ?></option>
                    <?php endforeach;
                    endif;
                    ?>
                  </select>
                </div>
                <div class="col-12 col-sm-5">
                  <div class="form-group">
                    <select id="inputState" name="profil" class="form-control">
                      <option value="">Vous etes...</option>
                      <?php if (isset($roles)) :
                        foreach ($roles as $role) :  ?>
                          <option value="<?= $role['idRole']  ?>"><?= strtoupper($role['intitule']) ?></option>
                      <?php endforeach;
                      endif;
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group last mb-3">
                <input type="text" class="form-control" placeholder="Code &eacute;tudiant" name="code_etudiant" id="code_etudiant" value="<?= set_value('code_etudiant') ?>">
              </div>

              <div class="row">
                <div class="form-group col-12 col-sm-5">
                  <input type="password" placeholder="Mot de passe" class="form-control" name="password" id="password" value="">
                </div>
                <div class="form-group first col-12 col-sm-7">
                  <input type="password" placeholder="Confirmation mot de passe" class="form-control" name="password_confirm" id="password_confirm" value="">
                </div>
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
                <a href="<?php echo base_url(); ?>/connexion" style="text-decoration: none;">Vous avez d&eacute;j&agrave; un compte ?</a>
              </div>
              <input type="submit" value="S'inscrire" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>



  <script src="<?php echo base_url('js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?php echo base_url('js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('js/main.js') ?>"></script>
  <script src="<?php echo base_url('js/jquery.validate.js') ?>"></script>
  <script>
    $().ready(function() {
      $("#registerForm").validate({
        rules: {
          firstname: {
            required: true,
            minlength: 3
          },
          lastname: {
            required: true,
            minlength: 2
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
          password_confirm: {
            required: true,
            minlength: 8,
            equalTo: "#password"
          },
          ufr: "required",
          profil: "required"
        },
        messages: {
          firstname: {
            required: "Veuillez saisir votre prenom",
            minlength: "Votre prenom doit contenir au moins 3 caracteres"
          },
          lastname: {
            required: "Veuillez saisir votre nom de famille",
            minlength: "Votre nom doit contenir au moins 2 caracteres"
          },
          email: {
            required: "Veuillez entrer votre login",
            email: "Veuillez saisir une adresse email correcte"
          },
          password: {
            required: "Veuillez fournir un mot de passe",
            minlength: "Votre mot de passe doit contenir au moins 8 caracteres"
          },
          password_confirm: {
            required: "Veuillez fournir un mot de passe",
            minlength: "Votre mot de passe doit contenir au moins 8 caractères",
            equalTo: "Entrez le même mot de passe"
          },
          ufr: "Veuillez choisr votre ufr",
          profil: "Veuillez precisez votre profil"
        }

      });
    });
  </script>
</body>

</html>