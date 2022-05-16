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
                    <li><a href="#">Etudiants</a></li>
                    <li class="active">CVtheque</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <?php foreach ($resumes as $resume) :?>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="<?= base_url() . '/assets/images/' .  $resume['photo']?>" style="width: 50%;" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">
                                    <a href="<?= base_url() ?>/cv/<?= $resume['idUtilisateur'] ?>">
                                    <?= $resume['nom'] ?> <?= $resume['prenom'] ?></a>
                                </h5>
                                <div class=" text-sm-center"><?= $resume['profils']?></div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <div class="pull-left">
                                <i class="fa fa-envelope"></i> <?= $resume['email'] ?>
                                </div>
                                <div class="pull-right">
                                <i class="fa fa-phone"></i>  <?= $resume['telephone'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>                 
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>
