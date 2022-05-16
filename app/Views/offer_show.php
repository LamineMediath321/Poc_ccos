<?php if (!session('isAdmin')) : ?>
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>);">
	<div class="container">
		<h2></h2>
	</div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Job Detail Start -->
<section class="detail-desc">
	<div class="container white-shadow">
		<div class="row">
			<div class="detail-pic">
				<img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" class="img" alt="" />
			</div>
		</div>
		<div class="row bottom-mrg">
			<div class="col-md-8 col-sm-8">
				<div class="detail-desc-caption">
					<h4><?= $offer['nomEntreprise'] ?></h4>
					<span class="designation"><?= $offer['profile'] ?></span>
					<p><?= $offer['details'] ?></p>
					<ul>
						<li>
							Type de contrat:
							<span class="text-primary"><?= $offer['contractType'] ?></span>
						</li>
						<li>
							Date limite:
							<span class="text-danger">
								<?php
								setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
								echo strftime("%d %b %G", strtotime($offer['datePublication']));
								?>
							</span>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="get-touch">
					<h4>Contact</h4>
					<ul>
						<li><i class="fa fa-map-marker"></i><span><?= $offer['adresse'] ?>, <?= $offer['nom'] ?></span></li>
						<li><i class="fa fa-envelope"></i><span><?= $offer['email'] ?></span></li>
						<li><i class="fa fa-globe"></i><span><?= $offer['siteWeb'] ?></span></li>
						<li><i class="fa fa-phone"></i><span><?= $offer['telephone'] ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Job Detail End -->

<!-- Job full detail Start -->
<section class="full-detail-description full-detail offer-detail">
	<div class="container">
		<div class="row row-bottom mrg-0">
			<h2 class="detail-title">Prerequis</h2>
			<p><?= $offer['prerequis'] ?></p>
		</div>
		<div class="row row-bottom mrg-0">
			<h2 class="detail-title">Mission</h2>
			<p><?= $offer['mission'] ?></p>
		</div>

		<div class="row no-padd mrg-0">
			<div class="detail pannel-footer">
				<div class="col-md-7 col-sm-7 pull-right">
					<div class="detail-pannel-footer-btn pull-right">
						<?php if ((session()->get('role') == 'etudiant') && !$haveApply) : ?>
							<a href="<?= base_url() . '/Offre/applyToAOffer/' . $offer['idOpportunite']; ?>" class="footer-btn grn-btn" title="">
								Postuler
							</a>
						<?php endif; ?>
						<a href="<?php echo base_url(); ?>/offres" class="footer-btn blu-btn" title="">Liste des offres</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif ?>
<!-- Job full detail End -->

<!-- Appliers for the offer -->
<?php if (session('isAdmin')) : ?>
	<div class="container">
		<section class="detail-desc">
			<div class="container white-shadow">
				<div class="row">
					<div class="detail-pic">
						<img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" class="img" alt="" />
					</div>
				</div>
				<div class="row bottom-mrg">
				<div class="col-md-8 col-sm-8">
					<div class="detail-desc-caption">
						<h4><?= $offer['nomEntreprise'] ?></h4>
						<span class="designation"><?= $offer['profile'] ?></span>
						<p><?= $offer['details'] ?></p>
						<ul>
							<li>
								Type de contrat:
								<span class="text-primary"><?= $offer['contractType'] ?></span>
							</li>
							<li>
								Date limite:
								<span class="text-danger">
									<?php
									setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
									echo strftime("%d %b %G", strtotime($offer['datePublication']));
									?>
								</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="get-touch">
						<h4>Contact</h4>
						<ul>
							<li><i class="fa fa-map-marker"></i><span><?= $offer['adresse'] ?>, <?= $offer['nom'] ?></span></li>
							<li><i class="fa fa-envelope"></i><span><?= $offer['email'] ?></span></li>
							<li><i class="fa fa-globe"></i><span><?= $offer['siteWeb'] ?></span></li>
							<li><i class="fa fa-phone"></i><span><?= $offer['telephone'] ?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Job Detail End -->

<!-- Job full detail Start -->
	<section class="full-detail-description full-detail offer-detail">
		<div class="container">
			<div class="row row-bottom mrg-0">
				<h2 class="detail-title">Prerequis</h2>
				<p><?= $offer['prerequis'] ?></p>
			</div>
			<div class="row row-bottom mrg-0">
				<h2 class="detail-title">Mission</h2>
				<p><?= $offer['mission'] ?></p>
			</div>

			<div class="row no-padd mrg-0">
				<div class="detail pannel-footer">
					<!--div class="col-md-7 col-sm-7 pull-right"-->
						<div class="col-md-7 col-sm-7 detail-pannel-footer-btn pull-right">
							<?php if ((session()->get('role') == 'etudiant') && !$haveApply) : ?>
								<a href="<?= base_url() . '/Offre/applyToAOffer/' . $offer['idOpportunite']; ?>" class="footer-btn grn-btn" title="">
									Postuler
								</a>
							<?php endif; ?>
							<!--a href="<?php echo base_url(); ?>/offres" class="footer-btn blu-btn" title="">Liste des offres</a-->
						</div>
					<!--/div-->
				</div>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header">
					<h2>Liste des postulants</h2>
				</div>
				<div class="card-body">
					<div class="table-scrollable">
						<table id="table_offer_cand" class="table table-striped table-bordered first">
							<thead>
                                <tr>
                                    <th>Intitule de l'offre</th>
                                    <th>Entreprise</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date Postulée</th>
									<th>Date de Cloture</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra'); ?>
                                <?php foreach ($ofcandidacies as $etudiant_postule) { ?>
									<?php if ($etudiant_postule['statut'] !== "Rejetée") { ?>
                                    <tr>
                                        <td><?= $etudiant_postule['intitule'] ?></td>
                                        <td><?= $etudiant_postule['nomEntreprise'] ?></td>
                                        <td><?= $etudiant_postule['nom'] ?></td>
                                        <td><?= $etudiant_postule['prenom'] ?></td>
                                        <td><?= strftime("%d %b %G", strtotime($etudiant_postule['date_postulee'])) ?></td>
										<td><?= strftime("%d %b %G", strtotime($etudiant_postule['dateCloture'])) ?></td>
                                        <?php if ($etudiant_postule['statut'] === "En attente") { ?>
                                            <td class="text-white bg-info"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } elseif ($etudiant_postule['statut'] === "Validée") { ?>
                                            <td class="text-white bg-success"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } else { ?>
                                            <td class="text-white bg-warning"><?= $etudiant_postule['statut'] ?></td>
                                        <?php } ?>
                                        <td class="">
                                            <div class="btn-group-sm">
                                                <a href="<?= base_url() ?>/cv/<?= $etudiant_postule['idUtilisateur'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <?php if ($etudiant_postule['statut'] !== "Validée") { ?>
                                                    <a href="#" class="btn btn-success" onclick="valider_poste(<?php echo $etudiant_postule['idOpportunite']; ?>)"><i class="fa fa-check"></i></a>
                                                <?php } ?>
                                                <?php if ($etudiant_postule['statut'] !== "Rejetée") { ?>
                                                    <a class="btn btn-danger" href="#" onclick="rejeter_poste(<?php echo $etudiant_postule['idOpportunite']; ?>)"><i class="fa fa-eject"></i></a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
									<?php } ?>
                                <?php } ?>
                            </tbody>
							</table>
							<?= $pager->links() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>