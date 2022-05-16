<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">

</section>
<div class="clearfix"></div>
<section class="detail-desc">
    <div class="container white-shadow">

    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Mes candidatures</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Nom entreprise</td>
                                    <td>Intutile offre</td>
                                    <td>Statut</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mycandidacies as $offer) { ?>
                                    <tr>
                                        <td><?= $offer['nomEntreprise'] ?></td>
                                        <td><?= $offer['title'] ?></td>
                                        <td>
                                            <?php if ($offer['statut'] === "Validée") { ?>
                                                <span class="job-type bg-trans-success cl-success"><?php echo $offer['statut'] ?></span>
                                            <?php } elseif ($offer['statut'] === "Rejetée") { ?>
                                                <span class="job-type bg-trans-danger cl-danger"><?php echo $offer['statut'] ?></span>
                                            <?php } else { ?>
                                                <span class="job-type bg-trans-info cl-info"><?php echo $offer['statut'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="">
                                            <div class="btn-group-sm">
                                                <a class="btn btn-primary" href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>"><i class="fa fa-eye"></i>
                                                </a>
                                                <?php if ($offer['statut'] === "En attente") { ?>
                                                    <a class="btn btn-danger" href="#" onclick="delete_poste(<?php echo $offer['idOpportunite']; ?>)"><i class="fa fa-trash"></i></a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_offer_show" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="title_show">Fiche offer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="get" action="javascript:void(0)" id="offerShowForm" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body form">
                    <div class="row">
                        <div class="col-md-8">
                            <div>
                                <p id="entShow"></p>
                            </div>
                            <label>Details</label>
                            <div>
                                <p id="detailShow"></p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <label>Type d'Offre:</label>
                            <i id="tcShow"></i>
                            </br>
                            <label>Niveau Requis</label>
                            <i id="NEShow"></i>
                            </br>
                            <label>Ville</label>
                            <i id="villeShow"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group col-md-4">
                                <label>Mission</label>
                                <div id="misShow"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Prerequis</label>
                                <div id="preqShow"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Date de Cloture</label>
                                <div id="datCShow"></div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group col-md-4">
                                <label>Insérer votre CV</label>
                                <input type="file" name="cv" class="form-control" id="cvShow">
                            </div>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idOpShow" class="form-control" id="idOpShow">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>