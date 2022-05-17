<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- meta -->
				<div class="profile-user-box card-box bg-custom">
					<div class="row">
						<div class="col-sm-6"><span class="float-left mr-3"><img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" alt="" class="thumb-lg rounded-circle"></span>
							<div class="media-body text-white">
								<h4 class="mt-1 mb-1 font-18">Nom du postuleur: <span class="text-info"><?= $offer['nomEntreprise'] ?></span></h4>
								<p class="font-16 text-white">Profil recherché: <span class="text-info "><?= $offer['profile'] ?></span></p>
								<p class="text-light mb-0"><i class="fa fa-map-marker"></i><?php echo $offer['nom'] ?></p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="text-right">
							</div>
						</div>
					</div>
				</div>
				<!--/ meta -->
			</div>
		</div>
		<!-- end row -->
		<div class="row">
			<div class="col-xl-4">
				<!-- Personal-Information -->
				<div class="card-box">
					<h4 class="header-title mt-0">Concernant <?= $offer['nomEntreprise'] ?></h4>
					<div class="panel-body">
						<p class="text-muted font-13">Hye, I’m Johnathan Doe residing in this beautiful world. I create websites and mobile apps with great UX and UI design. I have done work with big companies like Nokia, Google and Yahoo. Meet me or Contact me for any queries. One Extra line for filling space. Fill as many you want.</p>
						<hr>
						<div class="text-left">
							<p class="text-muted font-13"><strong>Adresse locale :</strong> <i class="fa fa-map-marker"></i> <span><?= $offer['adresse'] ?>, <?= $offer['nom'] ?></span></p>
							<p class="text-muted font-13"><strong>Mobile :</strong> <i class="fa fa-phone"></i> <span><?= $offer['telephone'] ?></span></p>
							<p class="text-muted font-13"><strong>Email :</strong> <i class="fa fa-envelope"></i> <span><?= $offer['email'] ?></span></p>
							<p class="text-muted font-13"><strong>Site web :</strong> <i class="fa fa-globe"></i> <span><?= $offer['siteWeb'] ?></span></p>

						</div>
						<ul class="social-links list-inline mt-4 mb-0">
							<li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- Personal-Information -->
				<?php if ($lastsOffers) { ?>
					<div class="card-box ribbon-box">
						<div class="ribbon ribbon-primary"><?= $nbLastsOffers ?> derniere(s) offre(s)</div>
						<div class="clearfix"></div>
						<div class="inbox-widget">
							<?php foreach ($lastsOffers as $offer) { ?>
								<a href="<?php echo base_url(); ?>/admin/offre/<?= $offer['idOpportunite'] ?>">
									<div class="inbox-item">
										<div class="inbox-item-img"><img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" class="rounded-circle" alt=""></div>
										<p class="inbox-item-author"><?= $offer['profil'] ?></p>
										<p class="inbox-item-text text-center"><i class="fa fa-map-marker"></i><?php echo $offer['nom'] ?></p>
										<p class="inbox-item-date">
											<button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-info"><i class="fa fa-eye"></i></button>
										</p>
									</div>
								</a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-xl-8">
				<div class="row">

					<div class="col-sm-6">
						<div class="card-box tilebox-one"><i class="icon-layers float-right text-muted"></i>
							<h6 class="text-muted text-uppercase mt-0">Date Postulée</h6>
							<h2 class="" data-plugin="counterup"><?php
																	setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
																	echo strftime("%d %b %G", strtotime($offer['datePublication']));
																	?></h2><span class="badge badge-custom">11 days</span><span class="text-muted"> ago</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card-box tilebox-one"><i class="icon-paypal float-right text-muted"></i>
							<h6 class="text-muted text-uppercase mt-0">Nombre de candidatures</h6>
							<h2 class=""><span data-plugin="counterup"><?= $total ?></span></h2><span class="badge badge-danger">Info% </span>
						</div>
					</div>
				</div>
				<!-- end row -->
				<div class="card-box">
					<h4 class="header-title mt-0 mb-3">concernant l'offre</h4>
					<div class="">
						<div class="">
							<h5 class="text-custom">Type de contrat</h5>
							<p class="mb-0 text-center"><span class="alert-info"><?= $offer['contractType'] ?></span></p>

						</div>
						<hr>
						<div class="">
							<h5 class="text-custom">Date limite</h5>
							<p class="text-center"><span class="alert-danger">
									<?php
									setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
									echo strftime("%d %b %G", strtotime($offer['dateCloture']));
									?>
								</span>
							</p>
						</div>
						<hr>
						<div class="">
							<h5 class="text-custom">Niveau d'étude requis</h5>
							<p class="mb-0 text-center"><span class="alert-warning"><?= $offer['studyLevel'] ?></span></p>

						</div>
						<hr>
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
							</div>
						</section>
					</div>
				</div>
				<div class="card-box">
					<h4 class="header-title mb-3">Liste des postulants</h4>
					<div class="table-responsive">
						<table class="table">
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
					</div>
				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- container -->
</div>

<style>
	.thumb-lg {
		height: 88px;
		width: 88px;
	}

	.profile-user-box {
		position: relative;
		border-radius: 5px
	}

	.bg-custom {
		background-color: black !important;
	}

	.profile-user-box {
		position: relative;
		border-radius: 5px;
	}

	.card-box {
		padding: 20px;
		border-radius: 3px;
		margin-bottom: 30px;
		background-color: #fff;
	}

	.inbox-widget .inbox-item img {
		width: 40px;
	}

	.inbox-widget .inbox-item {
		border-bottom: 1px solid #f3f6f8;
		overflow: hidden;
		padding: 10px 0;
		position: relative
	}

	.inbox-widget .inbox-item .inbox-item-img {
		display: block;
		float: left;
		margin-right: 15px;
		width: 40px
	}

	.inbox-widget .inbox-item img {
		width: 40px
	}

	.inbox-widget .inbox-item .inbox-item-author {
		color: #313a46;
		display: block;
		margin: 0
	}

	.inbox-widget .inbox-item .inbox-item-text {
		color: #98a6ad;
		display: block;
		font-size: 14px;
		margin: 0
	}

	.inbox-widget .inbox-item .inbox-item-date {
		color: #98a6ad;
		font-size: 11px;
		position: absolute;
		right: 7px;
		top: 12px
	}

	.comment-list .comment-box-item {
		position: relative
	}

	.comment-list .comment-box-item .commnet-item-date {
		color: #98a6ad;
		font-size: 11px;
		position: absolute;
		right: 7px;
		top: 2px
	}

	.comment-list .comment-box-item .commnet-item-msg {
		color: #313a46;
		display: block;
		margin: 10px 0;
		font-weight: 400;
		font-size: 15px;
		line-height: 24px
	}

	.comment-list .comment-box-item .commnet-item-user {
		color: #98a6ad;
		display: block;
		font-size: 14px;
		margin: 0
	}

	.comment-list a+a {
		margin-top: 15px;
		display: block
	}

	.ribbon-box .ribbon-primary {
		background: #2d7bf4;
	}

	.ribbon-box .ribbon {
		position: relative;
		float: left;
		clear: both;
		padding: 5px 12px 5px 12px;
		margin-left: -30px;
		margin-bottom: 15px;
		font-family: Rubik, sans-serif;
		-webkit-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
		-o-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
		box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
		color: #fff;
		font-size: 13px;
	}

	.text-custom {
		color: #02c0ce !important;
	}

	.badge-custom {
		background: #02c0ce;
		color: #fff;
	}

	.badge {
		font-family: Rubik, sans-serif;
		-webkit-box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
		box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
		padding: .35em .5em;
		font-weight: 500;
	}

	.text-muted {
		color: #98a6ad !important;
	}

	.font-13 {
		font-size: 13px !important;
	}
</style>