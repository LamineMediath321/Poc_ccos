<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <h6></h6>
    </div>
</section>

<div class="container-fluid">
    <div class="clearfix"></div>
    <form id="formSearchOffer" class="form-horizontal" method="post" action="<?php echo base_url() ?>/Competence/competences" enctype="multipart/form-data">
        <div class="col-md-6 col-sm-6 col-xs-12 m-5">
            <div class="input-group pull-right">
                <input type="text" name="competence" id="competence" class="form-control form-lg" placeholder="Chercher ici une compétence">
            </div>
        </div>
        <div class="col-md-3 col-sm-offset-2 col-sm-3 col-xs-12 m-5">
            <div class="input-group pull-right">
                <button type="submit" class="btn btn-primary" id="searchCriteria">Chercher</button>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="clearfix"></div>
    <!-- ========== Begin: Brows job Category ===============  -->
    <section class="brows-job-category">
        <div class="container">
            <div class="card-header">
                <h1 class="mb-4 text-center">Référentiel des Compétences</h1>
            </div>
            <div class="mt-10">
                <?php if ($competences) { ?>
                    <?php foreach ($competences as $competence) : ?>
                        <div class="item-click">
                            <article>
                                <div class="brows-job-list">
                                    <div class="col-md-1 col-sm-2 small-padding">
                                        <a href="">
                                            <span><?= $competence['intitule'] ?></span>
                                        </a>

                                    </div>
                                    <div class="col-md-6 col-sm-5">

                                    </div>
                                    <div class="col-md-3 col-sm-3">

                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="brows-job-link">

                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach;
                } else {
                    ?>
                    <div class="m-4 text-center text-secondary">
                        <h3>Nous n'avons pas trouvé 😇</h3>
                        <p>Veillez continuer à Chercher</p>
                    </div>
                <?php } ?>

            </div>
        </div>
</div>
</section>
<?= $pager->links() ?>
</div>