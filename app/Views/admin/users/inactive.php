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
                    <li><a href="#">Utilisateurs</a></li>
                    <li class="active">Inactifs</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title" style="color:brown">Liste des inactifs</h3>
                    </div>
                    <div id="result"></div>
                    <div class="card-body">
                    <div class="table-scrollable table-responsive col-md-12">
                        <table id="table_users" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 30px">#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($users as $user):
                                if (session('id') != $user['idUtilisateur']): ?>
                                    <tr>
                                    <th scope="row" class="text-center">
                                        <?= $i++ ?>
                                    </th>
                                    <td><?= $user['nom'] ?></td>
                                    <td><?= $user['prenom'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><span class="badge badge-info"><?= $user['role'] ?></span></td>
                                    <td value="<?= $user['actif'] ?>">
                                        <?php
                                            if ($user['actif']):    
                                        ?>
                                        <a
                                            <?php
                                                echo 'href="'.base_url('/admin/user/activate').'/'.$user['idUtilisateur'].'/'. $user['actif'].'"';
                                            ?>
                                            class="btn btn-outline-warning"  value="<?= $user['actif'] ?>"               
                                        >
                                            Désactiver
                                        </a>
                                        <?php
                                            else:
                                        ?>
                                        <a
                                            <?php 
                                                echo 'href="'.base_url('/admin/user/activate').'/'.$user['idUtilisateur'].'/'. $user['actif'].'"';
                                            ?>
                                            class="btn btn-outline-primary"  value="<?= $user['actif'] ?>"
                                        >
                                            Activer
                                        </a>
                                        <?php
                                            endif;
                                        ?>
                                    </td>
                                    </tr>
                                <?php endif; endforeach; ?>                        
                            </tbody>

                            <tfoot>
                                <tr>
                                <th></th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Activation</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>