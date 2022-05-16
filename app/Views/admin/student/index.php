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
                    <li><a href="#">Elements</a></li>
                    <li class="active">competences</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
       
        <div class="row mt-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h1>Liste des etudiants</h1>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                        <div class="table-scrollable table-responsive">
                            <table id="table_of" class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>UFR</th>
                                    <th>Candidatures</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                 foreach ($students as $student) : ?>
                                    <tr>
                                    <th scope="row">
                                        <?= $i++ ?>
                                    </th>
                                    <td><a href="<?= base_url() ?>/admin/cv/<?= $student['idUtilisateur'] ?>"><?= $student['prenom'] ?></a></td>
                                    <td><a href="<?= base_url() ?>/admin/cv/<?= $student['idUtilisateur'] ?>"><?= $student['nom'] ?></a></td>
                                    <td><a href="mailto:<?= $student['email'] ?>"><?= $student['email'] ?></a></td>
                                    <td><?= $student['intituleUfr'] ?></td>
                                    <td> <a href="<?= base_url() ?>/admin/candidatures/<?= $student['idUtilisateur'] ?>"><i class="fa fa-eye"></a></td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>UFR</th>
                                        <th>Candidatures</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add modal view -->
    <div class="modal fade" id="modal_competence_show" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Description Competence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="get" action="javascript:void(0)" id="formationShowForm" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body form">
                        <div class="row">
                            <div class="col-md-12">
                                Le développeur PHP est-ce qu’on appelle un développeur back-end par opposition au développeur ou intégrateur front-end qui travaille en grande majorité sur la partie visible d’un site internet. Un développeur PHP peut travailler à son compte, au sein d’une agence digitale ou encore dans une ESN (entreprise de services du numérique). D’autres professions plus polyvalentes peuvent demander des connaissances plus ou moins approfondies en langage PHP afin de pouvoir lire ou modifier des lignes de code ou tout simplement dans le but de communiquer et de se faire comprendre auprès des développeurs. C’est le cas du webmaster, du consultant SEO ou du chef de projet web.
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" id="footerShow">
                        <input type="hidden" name="idForm" class="form-control" id="idForm">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div class="modal" id="add_comp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Competence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" action="javascript:void(0)" id="formComp" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body form">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="">
                                    <label for="intitule">Intitule</label>
                                    <input type="text" class="form-control" name="intitule" id="intitule" value="">
                                </div>
                            </div>


                            <div class="modal-footer">
                                <input type="hidden" name="idCompetence" class="form-control" id="idCompetence">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" id="btn_save" onclick="save_comp()" class="btn btn-primary">Valider</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>