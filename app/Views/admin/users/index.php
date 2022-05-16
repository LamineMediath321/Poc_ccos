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
                    <li class="active">Liste</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des utilisateurs</strong>
                    </div>
                    <div class="card-body">
                    <div class="table-scrollable table-responsive">
                        <table id="table_users" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 30px">#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Activation</th>
                                    <th style="display:none"></th>
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
                                <td class="text-uppercase"><?= $user['role'] ?></td>
                                <td>
                                    <?php
                                        if ($user['actif']):    
                                    ?>
                                    <a
                                        <?php
                                            echo 'href="'.base_url('/admin/user/activate').'/'.$user['idUtilisateur'].'/'. $user['actif'].'"';
                                        ?>
                                        class="btn btn-outline-warning" value="1"               
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
                                        class="btn btn-outline-primary" value="0"
                                    >
                                        Activer
                                    </a>
                                    <?php
                                        endif;
                                    ?>
                                </td>
                                <td style="display:none"><?= $user['actif'] ?></td>
                                </tr>
                            <?php endif;  
                                endforeach; ?>                                        
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