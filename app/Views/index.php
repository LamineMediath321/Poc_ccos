<div class="clearfix"></div>
<div class="banner" style="background-image:url(<?php echo base_url('assets/img/bg.jpg'); ?>)">
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h2>La plateforme d'accompagnement des &eacute;tudiants de
                    l'Universit&eacute; Gaston Berger dans leur insertion professionnelle</h2>

                <form id="formSearchOffer" class="form-horizontal" method="post" action="<?php echo base_url() ?>/Offre/recherche" enctype="multipart/form-data">
                    <div class="col-md-offset-1 col-md-3 col-sm-3 col-xs-12 no-padd">
                        <div class="input-group">
                            <select id="choose-contrat" name="tc" class="form-control">
                                <option value="">Choisissez un type de contrat</option>
                                <?Php foreach ($GLOBALS['typeContrats'] as $value) :  ?>
                                    <option><?php echo $value['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 no-padd">
                        <div class="input-group">
                            <select id="choose-profile" name="profil" class="form-control">
                                <option value="">Choisissez un profil</option>
                                <?Php foreach ($GLOBALS['profiles'] as $value) :  ?>
                                    <option><?php echo $value['intitule']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 no-padd">
                        <div class="input-group">
                            <select id="choose-city" name="city" class="form-control">
                                <option value="">Choisissez une ville</option>
                                <?Php foreach ($GLOBALS['cities'] as $value) :  ?>
                                    <option><?php echo $value['nom']  ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12 no-padd">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary" id="searchCriteria">Chercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<section>
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <h2>Parcourir les offres par <span>Domaine</span></h2>
            </div>
        </div>
        <div class="row">

            <?php foreach ($fieldOffersCount as $fieldOffers) : ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo base_url(); ?>/domaine_offres/<?= $fieldOffers['idDomaine'] ?>">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><i class="<?= $fieldOffers['icon'] ?>" aria-hidden="true"></i><i class="<?= $fieldOffers['icon'] ?> abs-icon" aria-hidden="true"></i></div>
                                <div class="category-detail category-desc-text">
                                    <h4><?= $fieldOffers['intitule'] ?>
                                    </h4>
                                    <p><?= $fieldOffers['total'] ?> Offres</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<!-- <div class="container">
    <div class="text-center mb-2-8 mb-lg-6">
        <h2 class="display-18 display-md-16 display-lg-14 font-weight-700"><strong class="text-primary font-weight-700">L'insertion</strong></h2>
        <span class="mt-5 mb-2">Nous vous aidons à obtenir le meilleur emploi et à trouver un talent</span>
    </div>
    <div class="row align-items-center">
        <div class="col-sm-6 col-lg-4 mb-2-9 mb-sm-0">
            <div class="pr-md-3">
                <div class="text-center text-sm-right mb-2-9">
                    <div class="mb-4">
                        <img src="<?php echo base_url('assets/images/insertion.png') ?>" alt="..." class="rounded-circle">
                    </div>
                    <h4 class="sub-info">Insertion</h4>
                    <p class="display-30 mb-0">Roin gravida nibh vel velit auctor aliquetenean sollicitudin, lorem qui bibendum auctor.</p>
                </div>
                <div class="text-center text-sm-right">
                    <div class="mb-4">
                        <img src="https://via.placeholder.com/80x80/87CEFA/000000" alt="..." class="rounded-circle">
                    </div>
                    <h4 class="sub-info">Innovation scientifique</h4>
                    <p class="display-30 mb-0">Gravida roin nibh vel velit auctor aliquetenean sollicitudin, lorem qui bibendum auctor.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-none d-lg-block">
            <div class="why-choose-center-image">
                <img src="<?php echo base_url('assets/images/trouver.jpg') ?>" alt="..." class="rounded-circle">
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="pl-md-3">
                <div class="text-center text-sm-left mb-2-9">
                    <div class="mb-4">
                        <img src="https://via.placeholder.com/80x80/8A2BE2/000000" alt="..." class="rounded-circle">
                    </div>
                    <h4 class="sub-info">Propective</h4>
                    <p class="display-30 mb-0">Nibh roin gravida vel velit auctor aliquetenean sollicitudin, lorem qui bibendum auctor.</p>
                </div>

                <div class="text-center text-sm-left">
                    <div class="mb-4">
                        <img src="<?php echo base_url('assets/images/social.png') ?>" alt="..." class="rounded-circle">
                    </div>
                    <h4 class="sub-info">Service à la communauté</h4>
                    <p class="display-30 mb-0">Vel proin gravida nibh velit auctor aliquetenean sollicitudin, lorem qui bibendum auctor.</p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<section>
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p><?= $offersCount ?> Offres</p>

                <h2>Nouvelles <span>Offres</span></h2>
            </div>
        </div>
        <div class="row extra-mrg">
            <?php if ($offers) :
                foreach ($offers as $offer) :
            ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img">
                                <img src="<?php echo base_url('assets/images/' . $offer['logo']); ?>" class="img-responsive" alt="" />
                            </div>
                            <div class="brows-job-position">
                                <h3>
                                    <a href="<?php echo base_url(); ?>/offre/<?= $offer['idOpportunite'] ?>">
                                        <?= $offer['title'] ?>
                                    </a>
                                </h3>

                                <p><span><?= $offer['nomEntreprise'] ?></span></p>
                            </div>
                            <div class="brows-job-type"><span class="freelanc"><?= $offer['contractType'] ?></span></div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i><?= $offer['nom'] ?></p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-hourglass-half"></i>
                                            <?php
                                            setlocale(LC_TIME, 'fr_FR.utf8', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
                                            echo strftime("%d %b %G", strtotime($offer['dateCloture']));
                                            ?>
                                        </span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
            <?php endforeach;
            endif;
            ?>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-center"><a href="<?php echo base_url(); ?>/offres" class="btn btn-primary">Voir plus</a></div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<main class="col-6">

    <div class="container">
        <h3 class="card-title text-center alert alert-info">Les étapes pour candidater à une offre</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline4">
                    <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year">Etape 1</span>
                        <div class="timeline-content">
                            <h3 class="title">Activer ton compte institutionnel</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis justo id pulvinar suscipit. Pellentesque rutrum vehicula erat sed dictum. Integer quis turpis magna. Suspendisse tincidunt elit at erat tincidunt, vel vulputate arcu dapibus. Etiam accumsan ornare posuere. Nullam est.
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year">Etape 2</span>
                        <div class="timeline-content">
                            <h3 class="title">Se connecter sur la plateforme</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis justo id pulvinar suscipit. Pellentesque rutrum vehicula erat sed dictum. Integer quis turpis magna. Suspendisse tincidunt elit at erat tincidunt, vel vulputate arcu dapibus. Etiam accumsan ornare posuere. Nullam est.
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year">Etape 3</span>
                        <div class="timeline-content">
                            <h3 class="title">Remplir les informations suplementaires & creer votre cv</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis justo id pulvinar suscipit. Pellentesque rutrum vehicula erat sed dictum. Integer quis turpis magna. Suspendisse tincidunt elit at erat tincidunt, vel vulputate arcu dapibus. Etiam accumsan ornare posuere. Nullam est.
                            </p>
                        </div>
                    </div>
                    <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year">Etape 4</span>
                        <div class="timeline-content">
                            <h3 class="title">Postuler & suiver une opportinuté</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis justo id pulvinar suscipit. Pellentesque rutrum vehicula erat sed dictum. Integer quis turpis magna. Suspendisse tincidunt elit at erat tincidunt, vel vulputate arcu dapibus. Etiam accumsan ornare posuere. Nullam est.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="testimonial col-6" id="testimonial">

    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p style="color: black;">Temoignages des alumni</p>

                <h2>Parcours <span>inspirants</span></h2>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-offset-2 col-md-8'>
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#quote-carousel" data-slide-to="1"></li>
                        <li data-target="#quote-carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">

                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="<?php echo base_url('assets/images/Inspiring-Senegal-Author-profile-396x558.jpg'); ?>" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="color: black;">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                        <small style="color: black;">Ndeye Khady </small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="<?php echo base_url('assets/images/gettyimages-164929009-612x612.jpg'); ?>" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                        <small style="color: black;">David Diop</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="<?php echo base_url('assets/images/1567170171387.jfif'); ?>" style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p style="color: black;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                                        <small style="color: black;">Aby wade</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    /**About us */
    .rounded-circle {
        border-radius: 50% !important;
    }

    img {
        max-width: 100%;
        height: auto;
        vertical-align: top;
    }

    .sub-info {
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        color: #004975;
    }

    .display-30 {
        font-size: 0.9rem;
    }

    /**End of about us */

    /*Begin etape */

    /*timeline*/

    a {
        text-decoration: none
    }

    /*timeline4*/


    /******************* Timeline Demo - 8 *****************/

    .main-timeline4 {
        overflow: hidden;
        position: relative
    }

    .main-timeline4:after,
    .main-timeline4:before {
        content: "";
        display: block;
        width: 100%;
        clear: both
    }

    .main-timeline4:before {
        content: "";
        width: 3px;
        height: 100%;
        background: #d6d5d5;
        position: absolute;
        top: 30px;
        left: 50%
    }

    .main-timeline4 .timeline {
        width: 50%;
        float: left;
        padding-right: 30px;
        position: relative
    }

    .main-timeline4 .timeline-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #fe6847;
        position: absolute;
        top: 5.5%;
        right: -17.5px
    }

    .main-timeline4 .year {
        display: block;
        padding: 10px;
        margin: 0;
        font-size: 30px;
        color: #fff;
        border-radius: 0 50px 50px 0;
        background: #fe6847;
        text-align: center;
        position: relative
    }

    .main-timeline4 .year:before {
        content: "";
        border-top: 35px solid #f59c8b;
        border-left: 35px solid transparent;
        position: absolute;
        bottom: -35px;
        left: 0
    }

    .main-timeline4 .timeline-content {
        padding: 30px 20px;
        margin: 0 45px 0 35px;
        background: #f2f2f2
    }

    .main-timeline4 .title {
        font-size: 19px;
        font-weight: 700;
        color: #504f54;
        margin: 0 0 10px
    }

    .main-timeline4 .description {
        font-size: 14px;
        color: #7d7b7b;
        margin: 0
    }

    .main-timeline4 .timeline:nth-child(2n) {
        padding: 0 0 0 30px
    }

    .main-timeline4 .timeline:nth-child(2n) .timeline-icon {
        right: auto;
        left: -14.5px
    }

    .main-timeline4 .timeline:nth-child(2n) .year {
        border-radius: 50px 0 0 50px;
        background: #7eda99
    }

    .main-timeline4 .timeline:nth-child(2n) .year:before {
        border-left: none;
        border-right: 35px solid transparent;
        left: auto;
        right: 0
    }

    .main-timeline4 .timeline:nth-child(2n) .timeline-content {
        text-align: right;
        margin: 0 35px 0 45px
    }

    .main-timeline4 .timeline:nth-child(2) {
        margin-top: 170px
    }

    .main-timeline4 .timeline:nth-child(odd) {
        margin: -175px 0 0
    }

    .main-timeline4 .timeline:nth-child(even) {
        margin-bottom: 80px
    }

    .main-timeline4 .timeline:first-child,
    .main-timeline4 .timeline:last-child:nth-child(even) {
        margin: 0
    }

    .main-timeline4 .timeline:nth-child(2n) .timeline-icon {
        border-color: #7eda99
    }

    .main-timeline4 .timeline:nth-child(2n) .year:before {
        border-top-color: #92efad
    }

    .main-timeline4 .timeline:nth-child(3n) .timeline-icon {
        border-color: #8a5ec1
    }

    .main-timeline4 .timeline:nth-child(3n) .year {
        background: #8a5ec1
    }

    .main-timeline4 .timeline:nth-child(3n) .year:before {
        border-top-color: #a381cf
    }

    .main-timeline4 .timeline:nth-child(4n) .timeline-icon {
        border-color: #f98d9c
    }

    .main-timeline4 .timeline:nth-child(4n) .year {
        background: #f98d9c
    }

    .main-timeline4 .timeline:nth-child(4n) .year:before {
        border-top-color: #f2aab3
    }

    @media only screen and (max-width:767px) {
        .main-timeline4 {
            overflow: visible
        }

        .main-timeline4:before {
            top: 0;
            left: 0
        }

        .main-timeline4 .timeline:nth-child(2),
        .main-timeline4 .timeline:nth-child(even),
        .main-timeline4 .timeline:nth-child(odd) {
            margin: 0
        }

        .main-timeline4 .timeline {
            width: 100%;
            float: none;
            padding: 0 0 0 30px;
            margin-bottom: 20px !important
        }

        .main-timeline4 .timeline:last-child {
            margin: 0 !important
        }

        .main-timeline4 .timeline-icon {
            right: auto;
            left: -14.5px
        }

        .main-timeline4 .year {
            border-radius: 50px 0 0 50px
        }

        .main-timeline4 .year:before {
            border-left: none;
            border-right: 35px solid transparent;
            left: auto;
            right: 0
        }

        .main-timeline4 .timeline-content {
            margin: 0 35px 0 45px
        }
    }


    /*end timeline*/
    /*end timeline*/

    /**End etape */

    /* carousel */

    #testimonial {
        margin-top: 50px;
        margin-bottom: 50px;
        background-color: none;

    }

    #quote-carousel {
        padding: 0 10px 30px 10px;
        margin-top: 30px 0px 0px;
    }

    /* Control buttons  */
    #quote-carousel .carousel-control {
        background: none;
        color: #222;
        font-size: 2.3em;
        text-shadow: none;
        margin-top: 30px;
    }

    /* Previous button  */
    #quote-carousel .carousel-control.left {
        left: -12px;
    }

    /* Next button  */
    #quote-carousel .carousel-control.right {
        right: -12px !important;
    }

    /* Changes the position of the indicators */
    #quote-carousel .carousel-indicators {
        right: 50%;
        top: auto;
        bottom: 0px;
        margin-right: -19px;
    }

    /* Changes the color of the indicators */
    #quote-carousel .carousel-indicators li {
        background: #c0c0c0;
    }

    #quote-carousel .carousel-indicators .active {
        background: #333333;
    }

    #quote-carousel img {
        width: 250px;
        height: 100px
    }

    /* End carousel */

    .item blockquote {
        border-left: none;
        margin: 0;
    }

    .item blockquote img {
        margin-bottom: 10px;
    }

    .item blockquote p:before {
        content: "\f10d";
        font-family: 'Fontawesome';
        float: left;
        margin-right: 10px;
    }



    /**
  MEDIA QUERIES
*/

    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        #quote-carousel {
            margin-bottom: 0;
            padding: 0 40px 30px 40px;
            margin-top: 30px;
        }

    }

    /* Small devices (tablets, up to 768px) */
    @media (max-width: 768px) {

        /* Make the indicators larger for easier clicking with fingers/thumb on mobile */

        #quote-carousel .carousel-indicators {
            bottom: -20px !important;
        }

        #quote-carousel .carousel-indicators li {
            display: inline-block;
            margin: 0px 5px;
            width: 15px;
            height: 15px;
        }

        #quote-carousel .carousel-indicators li.active {
            margin: 0px 5px;
            width: 20px;
            height: 20px;
        }
    }

    /*****************



    /* Title */


    @charset "utf-8";
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Open Sans:400,600,800');

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    div,
    input,
    p,
    a {
        font-family: "Open Sans";
        margin: 0px;
    }

    a,
    a:hover,
    a:focus {
        color: inherit;
    }


    /*Les derniere cards */

    /**End  */
</style>