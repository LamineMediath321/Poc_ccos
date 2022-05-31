<script src="<?php echo base_url('vendors/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/admin_main.js'); ?>"></script>


<script src="<?php echo base_url('vendors/chart.js/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/widgets.js'); ?>"></script>
<script src="<?php echo base_url('vendors/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/jqvmap/js/jquery.vmap.sampledata.js'); ?>"></script>
<script src="<?php echo base_url('vendors/jqvmap/jquery.vmap.world.js'); ?>"></script>

<!-- Scripts==================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/viewportchecker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/bootsnav.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/wysihtml5-0.3.0.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/bootstrap-wysihtml5.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/datedropper.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/dropzone.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/loader.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/owl.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/slick.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/gmap3.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/js/jquery.easy-autocomplete.min.js'); ?>"></script>

<!-- Datable links -->


<script src="<?php echo base_url('vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('vendors/datatables.net-buttons/buttons.colVis.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/init-scripts/data-table/datatables-init.js') ?>"></script>

<script src="<?php echo base_url('/assets/js/dataTables.js'); ?>"> </script>


<!-- Chart maps link -->
<script src="<?php echo base_url('/assets/js/chart_maps/proj4.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/chart_maps/highcharts.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/chart_maps/maps.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/chart_maps/exporting.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/chart_maps/chart_maps.sn.js') ?>"></script>

<script src="<?php echo base_url('/assets/js/cartographie.js'); ?>"> </script>

<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jQuery.style.switcher.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('/assets/js/bootstrap-select.min.css') ?>" rel="stylesheet" />
<script src="<?php echo base_url('/assets/js/bootstrap-select.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/moment.min.js') ?>" type="text/javascript"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
-->

<script src="<?php echo base_url('js/jquery.validate.js') ?>"></script>
<script>
    //Pour le formulaire de competence
    $("#formComp").validate({
        rules: {

            intitule: "required"
        },
        messages: {

            intitule: "Veillez entrer une competence"
        }

    });
    //End of competence

    //Fomulaire Domaine
    $("#field_form").validate({
        rules: {

            field_title: "required"
        },
        messages: {

            field_title: "Veillez entrer un domaine"
        }

    });
    //end of domaine


     //Fomulaire Edit infos personnelles
    //  $("#student_form").validate({
    //     rules: {

    //         phone: "required"
    //     },
    //     messages: {

    //         phone: "champ obligatoire"
    //     }

    // });
    //end of edit
</script>


<?php if (!session('AsVisitor')) : ?>

<?php else : ?>

    <footer class="footer">
        <div class="row lg-menu">
            <div class="container">
                <div class="col-md-5 col-sm-5">
                    <h3 class="logo"> Plateforme <span> Opportunit&eacute;s</span> </h3>
                </div>
            </div>
        </div>
        <div class="row no-padding">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">A propos</h3>

                        <div class="textwidget">
                            <p>
                                La plateforme d'accompagnement des &eacute;tudiants de
                                l'Universit&eacute; Gaston Berger dans leur insertion.
                            </p>

                            <p>UFR LSH<br>Sanar, Saint-Louis</p>

                            <p><strong>Email:</strong> d2ipsc@ugb.ed.sn</p>

                            <p><strong>Telephone:</strong> <a href="tel:+221770000000">77-000-00-00</a></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Naviguer</h3>

                        <div class="textwidget">
                            <div class="textwidget">
                                <ul class="footer-navigation">
                                    <li><a href="/" title="">Accueil</a></li>
                                    <li><a href="/entreprises" title="">Entreprises</a></li>
                                    <li><a href="#" title="">Devenir partenaire</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Opportunit&eacute;</h3>

                        <div class="textwidget">
                            <ul class="footer-navigation">
                                <li><a href="/offres" title="">Offres</a></li>
                                <li><a href="#" title="">Publier une offre</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Contactez nous</h3>

                        <div class="textwidget">
                            <form class="footer-form">
                                <input type="text" class="form-control" placeholder="Email"><textarea class="form-control" placeholder="Message"></textarea>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
        .section {
            padding: 100px 0;
            position: relative;
        }

        .gray-bg {
            background-color: #f5f5f5;
        }

        /* Contact Us
---------------------*/
        .contact-name {
            margin-bottom: 30px;
        }

        .contact-name h5 {
            font-size: 22px;
            color: #3b5998;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-name p {
            font-size: 18px;
            margin: 0;
        }

        .social-share a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            text-align: center;
            margin-right: 10px;
        }

        .social-share .dribbble {
            box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
            background-color: #ea4c89;
        }

        .social-share .behance {
            box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
            background-color: #0067ff;
        }

        .social-share .linkedin {
            box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
            background-color: #0177ac;
        }

        .contact-form .form-control {
            border: none;
            border-bottom: 1px solid #20247b;
            background: transparent;
            border-radius: 0;
            padding-left: 0;
            box-shadow: none !important;
        }

        .contact-form .form-control:focus {
            border-bottom: 1px solid #fc5356;
        }

        .contact-form .form-control.invalid {
            border-bottom: 1px solid #ff0000;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        @media (max-width: 767px) {
            .contact-form .send {
                margin-bottom: 20px;
            }
        }

        .section-title h2 {
            font-weight: 700;
            color: #3b5998;
            font-size: 45px;
            margin: 0 0 15px;
            border-left: 5px solid #fc5356;
            padding-left: 15px;
        }

        .section-title {
            padding-bottom: 45px;
        }

        .contact-form .send {
            margin-top: 20px;
        }

        .px-btn {
            padding: 0 50px 0 20px;
            line-height: 60px;
            position: relative;
            display: inline-block;
            color: #20247b;
            background: none;
            border: none;
        }

        .px-btn:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 30px;
            background: transparent;
            border: 1px solid rgba(252, 83, 86, 0.6);
            border-right: 1px solid transparent;
            -moz-transition: ease all 0.35s;
            -o-transition: ease all 0.35s;
            -webkit-transition: ease all 0.35s;
            transition: ease all 0.35s;
            width: 60px;
            height: 60px;
        }

        .px-btn .arrow {
            width: 13px;
            height: 2px;
            background: currentColor;
            display: inline-block;
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            right: 25px;
        }

        .px-btn .arrow:after {
            width: 8px;
            height: 8px;
            border-right: 2px solid currentColor;
            border-top: 2px solid currentColor;
            content: "";
            position: absolute;
            top: -3px;
            right: 0;
            display: inline-block;
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>

<?php endif; ?>


<script type="text/javascript">
    /*  =========================================================== 
                            Sommaire
        =========================================================== */

    /**
     *  Ce sommaire est pour les fonctions CRUD (create, read, update, delete)
     *     dont on a besoin pour les differents modals du projet.
     *  J'ai essayé de fractionner le code en 5 modules. Chaque module en différentes
     *      parties, qui sont composées d'au moins 4 fonctions chacune:
     *          - Ajouter (add)
     *          - Modifier (edit - update)
     *          - Enregistrer (save)
     *          - Supprimer (delelte)
     *      Certaines ont en plus de ces 4, une pour l'affichage (show). 
     *      
     * 
     *  1. Module Entreprise    .........................   341
     *      1.1. Entreprise     .........................   344
     *      1.2. Secteur d'activite .....................   520 
     *  2. Module Referenciel   .........................   613
     *      2.1. Formations     .........................   616
     *  3. Module CV            .........................   689
     *      3.1. Informations personnelles  .............   692
     *      3.2. Formation      .........................   818
     *      3.3. Experience professionnelle .............   894
     *      3.4. Competence     .........................   972
     *      3.5. Langue         .........................  1012
     *  4. Module Offre         .........................  1054
     *      4.1. Offre          .........................  1057
     *      4.2. Type contrat   .........................  1165
     *  5. Module Elements de la bdd    .................  1261
     *      5.1. Domaine        .........................  1264
     *      5.2. Profil         .........................  1358
     *     
     */

    // Fonction appelé par la cartographie pour afficher les donnees d'une ville
    function pointClick() {
        let row = this.options.row;
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/formation/getCityFormationsNCompanies') ?>/" + this.id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data[0]);


                $('.listFormations')[0].innerHTML = "";
                $('.listEntreprises')[0].innerHTML = "";

                $('.modal-title').text('Entreprises et formations de ' + data[0].ville); // Set title to Bootstrap modal title

                let listFormationsName = document.createElement('h4');

                // Liste des formations d'une ville
                listFormationsName.textContent = 'Formations';
                $('.listFormations')[0].appendChild(listFormationsName);

                let listForm = document.createElement('ul');

                for (let i = 0; i < data[0].formations.length; i++) {
                    let listItem = document.createElement('li');
                    listItem.textContent = data[0].formations[i].formations;
                    listForm.appendChild(listItem);
                }
                (listForm.innerHTML === "") ? listForm.textContent = 'Pas de formations': listForm.textContent;

                // console.log(list.contains());
                $('.listFormations')[0].appendChild(listForm);

                // Liste des entreprises d'une ville
                let listEntreprisesName = document.createElement('h4');
                listEntreprisesName.textContent = 'Entreprises';
                $('.listEntreprises')[0].appendChild(listEntreprisesName);

                let listEnt = document.createElement('ul');

                for (let i = 0; i < data[0].entreprises.length; i++) {
                    let listItem = document.createElement('li');
                    listItem.textContent = data[0].entreprises[i].entreprises;
                    listEnt.appendChild(listItem);
                }
                (listEnt.innerHTML === "") ? listEnt.textContent = "Pas d'entreprises": listEnt.textContent;

                $('.listEntreprises')[0].appendChild(listEnt);

                $('#modal_ville_ent_form').modal('show'); // show bootstrap modal when complete loaded



            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Une erreur est survenue');
            }
        });
    }

    function readImageData(input, id) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    var save_method; //for save method string
    var table;

    /*  =========================================================== 
                            1. Module Entreprise
        =========================================================== */

    //  1.1. Entreprise
    function add_ent() {
        save_method = 'add';
        $('#formEnt')[0].reset(); // reset form on modals
        $('#add_ent_modal').modal('show'); // show bootstrap modal
    }

    function edit_ent(id) {
        save_method = 'update';
        $('#formEnt')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        // let formData= new FormData($('#formEnt')[0]);

        $.ajax({
            url: "<?php echo base_url('/entreprise/ajax_get_company') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idCompany"]').val(data.idEntreprise);
                $('[name="city"]').val(data.idVille);
                $('[name="company_name"]').val(data.nomEntreprise);
                $('[name="presentation"]').val(data.presentation);
                $('[name="address"]').val(data.adresse);
                $('[name="website"]').val(data.siteWeb);
                $('[name="phone"]').val(data.telephone);
                $('[name="mail"]').val(data.email);
                $('[name="partner"]').val(data.partenaire);

                $('#logo').attr("src", window.location.origin + '/assets/images/' + data.logo);


                if (data.idSecteur) {
                    let selectedVal = {
                        id: data.idSecteur,
                        text: data.intitule,
                        selected: true
                    };

                    let arsel = [];
                    arsel.push(selectedVal.id);

                    let el = [];
                    for (let i = 0; i < arsel.length; i++) {
                        el.push(arsel[i]);
                        $.each(arsel[i].split(","), function(i, e) {
                            $(".selectpicker option[value='" + e + "']").prop("selected", true).trigger('change');
                        });
                    }

                    $('.selectpicker').selectpicker('refresh');
                }

                $('#add_ent_modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier Entreprise'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        });
    }


    function edit_competence(id) {
        save_method = 'update';
        $('#formComp')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        // let formData= new FormData($('#formComp')[0]);

        $.ajax({
            url: "<?php echo base_url('/competence/ajax_get_competence') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idCompetence"]').val(data.idCompetence);
                $('[name="intitule"]').val(data.intitule);
                console.log(data);
                console.log($('[name="intitule"]').val());
                console.log($('[name="idCompetence"]').val());
                $('#add_comp_modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier Competence'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        });
    }



    function contacter(id) {
        $('#formComp')[0].reset(); // reset form on modals
        url = "<?php echo base_url('user/get_email') ?>/" + id;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="email"]').val(data.email);

                $('#add_comp_modal').modal('show');
                console.log(data); // show bootstrap modal
            },
            error: function(jqXHR, textStatus, errorThrown) {

                alert('Une erreur est survenue');
            }
        });

    }

    function save_contact() {
        let url;
        url = "<?php echo base_url('user/send_mail') ?>";

        let data = new FormData($('#formComp')[0]);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                // location.reload(); // for reload a page
                $('#add_comp_modal').modal('hide');
                alert("Envoyé avec succés");


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Vous ne pouvez pas envoyer de mail sans objet ni contenu!');
                // location.reload();
            }
        });
    }

    function add_competence() {
        save_method = 'add';
        $('#formComp')[0].reset(); // reset form on modals
        $('#add_comp_modal').modal('show'); // show bootstrap modal


    }


    function save_comp() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('competence/add_competence') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo base_url('competence/edit_competence') ?>";
        }
        let data = new FormData($('#formComp')[0]);
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#add_comp_modal').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#error").text('Une erreur est survenue lors de la saisie');
                $("#error").attr('class', 'col-5 text-danger mt-2');
                $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
                console.log(jqXHR)
                console.log(errorThrown)
            }
        });
    }

    function hideMessage() {
        $("#error").text("");
        $("#icon").attr('class', '');
        $("#error_2").text("");

    }

    function validateInput() {
        let input = $('#intitule').val();
        let regexName = /^[\w\s-]{3,20}$/;
        if ((input.length == 0) || (regexName == false)) {
            $('#intitule').attr('style', ' border: 2px solid red;border-radius: 4px;');
            $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
            $("#error").text('Le champ est vide !');
            $("#error").attr('class', 'col-5 text-danger mt-2');
            return false;
        }
        $('#intitule').attr('style', ' border: 1px solid green;border-radius: 4px;');
        $("#icon").attr('class', 'fa fa-check-circle text-success mt-2');
        $("#error").text('Cela semble bon!');
        $("#error").attr('class', 'col-5 text-success mt-2');
        return true;
    }

    function ValiderInputTypeContrat() {
        let input = $('#intituleTC').val();
        if (input.length == 0) {
            $('#intituleTC').attr('style', ' border: 1px solid red;border-radius: 4px;');
            $("#icon").attr('class', '');
            $("#error").text('');
            return false;
        }
        $('#intituleTC').attr('style', ' border: 1px solid green;border-radius: 4px;');
        $("#icon").attr('class', 'fa fa-check-circle text-success mt-2');
        $("#error").text('Cela semble bon!');
        $("#error").attr('class', 'col-5 text-success mt-2');
        return true;
    }

    function ValiderInputSecteur() {
        let input = $('#intituleSecteur').val();
        if (input.length == 0) {
            $('#intituleSecteur').attr('style', ' border: 1px solid red;border-radius: 4px;');
            $("#icon").attr('class', '');
            $("#error").text('');
            return false;
        }
        $('#intituleSecteur').attr('style', ' border: 1px solid green;border-radius: 4px;');
        $("#icon").attr('class', 'fa fa-check-circle text-success mt-2');
        $("#error").text('Cela semble bon!');
        $("#error").attr('class', 'col-5 text-success mt-2');
        return true;
    }


    function ValiderInputField() {
        let input = $('#field_title').val();
        if (input.length == 0) {
            $('#field_title').attr('style', ' border: 1px solid red;border-radius: 4px;');
            $("#icon").attr('class', '');
            $("#error").text('');
            return false;
        }
        $('#field_title').attr('style', ' border: 1px solid green;border-radius: 4px;');
        $("#icon").attr('class', 'fa fa-check-circle text-success mt-2');
        $("#error").text('Cela semble bon!');
        $("#error").attr('class', 'col-5 text-success mt-2');
        return true;
    }

    function clean() {

        $('#field_title').attr('style', ' border: no-border;');
        $("#icon").attr('class', '');
        $("#error").text('');
        $("#error").attr('class', '');
        return true;
    }

    function ValiderInputProfile() {
        let input = $('#profile_title').val();
        if (input.length == 0) {
            $('#profile_title').attr('style', ' border: 1px solid red;border-radius: 4px;');
            $("#icon").attr('class', '');
            $("#error").text('');
            return false;
        }
        $('#profile_title').attr('style', ' border: 1px solid green;border-radius: 4px;');
        $("#icon").attr('class', 'fa fa-check-circle text-success mt-2');
        $("#error").text('Cela semble bon!');
        $("#error").attr('class', 'col-5 text-success mt-2');
        return true;
    }



    function save_ent() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('entreprise/add_ent') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo base_url('entreprise/update_ent') ?>";
        }

        let data = new FormData($('#formEnt')[0]);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#add_ent_modal').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(data);
            }
        });
    }

    function delete_ent(id) {
        if (confirm('Voulez-vous vraiment supprimer cette entreprise?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('entreprise/delete_ent') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#add_experience').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }


    function delete_competence(id) {
        if (confirm('Voulez-vous vraiment supprimer cette competence?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('competence/delete_competence') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#add_experience').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }

    function show_ent(id) {
        save_method = 'show';
        $('#formShow2')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/entreprise/ajax_get_company') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(id);

                console.log(data);
                var sec = $(this).data('idSecteur');

                $('[name="idE"]').val(data.idEntreprise);
                $('#presShow').html('');
                $('#presShow').append("<p>" + ((data.presentation == null || data.presentation == "") ? "- - -" : data.presentation) + "</p>");

                $('#pfc').html('');
                $('#pfc').append("<i>" + ((data.prenom != null && data.prenom == "") ? data.prenom : "- - -") + "</i>");
                $('#adShow').html('');
                $('#adShow').append("<i>" + ((data.adresse == "" || data.adresse == null) ? "- - -" : data.adresse) + "</i>");
                $('#phoneShow').html('');
                $('#phoneShow').append("<i>" + ((data.telephone == "" || data.telephone == null) ? "- - -" : data.telephone) + "</i>");
                $('#mailShow').html('');
                $('#mailShow').append("<i>" + ((data.email == "" || data.email == null) ? "- - -" : data.email) + "</i>");
                $('#swShow').html('');
                $('#swShow').append('<a href=' + ((data.siteWeb == null || data.siteWeb == "") ? "- - -" : data.siteWeb) + '>' + ((data.siteWeb == null || data.siteWeb == "") ? "- - -" : data.siteWeb) + '</a>');

                if (data.logo != null || data.logo != "") {
                    $('#logoShow').html('');
                    $('#logoShow').append('<img src="' + window.location.origin + '/assets/images/' + data.logo + '" width="133" height="133" id="logoShow" alt=""/>')
                    // $('#logoShow').attr("src", window.location.origin + '/assets/images/'+ data.logo);
                }
                $('#sectShow').html('');
                $('#sectShow').append("<p>" + (data.intitule == null ? "- - -" : data.intitule) + "</p>");

                $('#show_ent_modal').modal('show'); // show bootstrap modal when complete loaded

                $('.modal-title').text(((data.nomEntreprise == null || data.nomEntreprise == "") ? "- - -" : data.nomEntreprise)); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Une erreur est survenue');
            }
        });
    }

    //  1.2. Secteur d'activite
    function add_secteur() {
        save_method = 'add';
        $('#secteur_form')[0].reset(); // reset form on modals
        $('#modal_secteur_activite').modal('show'); // show bootstrap modal
    }

    function edit_secteur(id) {
        save_method = 'update';
        $('#secteur_form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        $.ajax({
            url: "<?php echo base_url('/secteur/ajax_get_secteur') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idSecteur"]').val(data.idSecteur);
                $('[name="intituleSecteur"]').val(data.intitule);

                $('#modal_secteur_activite').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier un secteur'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }
        });
    }

    function save_secteur() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('secteur/add_secteur') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo base_url('secteur/edit_secteur') ?>";
        }
        let data = new FormData($('#secteur_form')[0]);
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#modal_secteur_activite').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#error").text('Ce champ est obligatoire');
                $("#error").attr('class', 'col-5 text-danger mt-2');
                $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
            }
        });

    }

    function delete_secteur(id) {
        if (confirm('Voulez-vous vraiment supprimer ce secteur?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('secteur/delete_secteur') ?>/" + id,
                type: "POST",
                data: $('#secteur_form').serialize(),
                dataType: "JSON",
                // async: false,
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#profile_modal').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }
    //  --------------------    FIN    -----------------------------

    /*  =========================================================== 
                            2. Module Referentiel
        =========================================================== */

    //  2.1. Formation
    function showFormation(id) {
        save_method = 'show';
        $('#formationShowForm')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('/formation/ajax_edit') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('#typeForm').html('');
                $('#typeForm').append("<p>" + ((data.typeFormation == null || data.typeFormation == "") ? "- - -" : data.typeFormation) + "</p>");
                $('#intDip').html('');
                $('#intDip').append("<p>" + ((data.intituleDiplome == null || data.intituleDiplome == "") ? "- - -" : data.intituleDiplome) + "</p>");
                $('#dpeq').html('');
                $('#dpeq').append("<p>" + ((data.diplomeEquivalent == null || data.diplomeEquivalent == "") ? "- - -" : data.diplomeEquivalent) + "</p>");
                $('#etbl').html('');
                $('#etbl').append("<p>" + ((data.nomEtablissement == null || data.nomEtablissement == "") ? "- - -" : data.nomEtablissement) + "</p>");
                $('#ville').html('');
                $('#ville').append("<p>" + ((data.ville == null || data.ville == "") ? "- - -" : data.ville + "(" + data.nomPays + ")") + "</p>");
                $('#deb').html('');
                $('#deb').append("<p>" + ((data.debouches == null || data.debouches == "") ? "- - -" : data.debouches) + "</p>");
                $('#desc').html('');
                $('#desc').append("<p>" + ((data.description == null || data.description == "") ? "- - -" : data.description) + "</p>");



                $('#modal_formation_show').modal('show'); // show bootstrap modal when complete loaded

                $('.modal-title').text('Fiche Formation'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Une erreur est survenue');
            }
        });
    }

    function supprimer_formation(id) {
        if (confirm('Voulez vous vraiment supprimer cette formation?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('formation/delete_formation') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    const id = $(this).data('idFormation');
                    $('.idFormation').val(id);

                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('erreur!suppression non effectuÃ©e!');
                }
            });

        }
    }
    //  --------------------    FIN    -----------------------------

    /*  =========================================================== 
                            3. Module CV
        =========================================================== */

    //  3.1. Informations personnelles



    function perso_info(id) {
        save_method = 'add';
        $('#student_form')[0].reset(); // reset form on modals

        <?php header('Content-type: application/json'); ?>

        $.ajax({
            url: "<?php echo base_url('/user/user_info') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="lstname"]').val(data.nom);
                $('[name="fstname"]').val(data.prenom);
                $('[name="mail"]').val(data.email);

                $('#personal_info').modal('show'); // show bootstrap modal

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax')
            }
        });



    }

    function edit_perso_info(id) {
        save_method = 'edit';
        $('#student_form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>

        $.ajax({
            url: "<?php echo base_url('/Cv/get_personal_infos') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('[name="lstname"]').val(data.nom);
                $('[name="fstname"]').val(data.prenom);
                $('[name="mail"]').val(data.email);
                $('[name="phone"]').val(data.telephone);
                $('[name="adress"]').val(data.adresse);
                $('[name="sex"]').val(data.genre);
                $('[name="bthDay"]').val(data.dateNaissance);
                $('[name="bthPlace"]').val(data.lieuNaissance);
                $('[name="natnalty"]').val(data.nationalite);

                if (data.photo != null && data.photo != "") {
                    $('#pict').attr("src", window.location.origin + '/assets/images/' + data.photo);


                }

                var selectedVal = {
                    id: data.idProfil,
                    text: data.profils,
                    selected: true
                };

                var item = [];

                var arsel = [];
                arsel.push(selectedVal.id);

                var el = [];
                for (let i = 0; i < arsel.length; i++) {

                    el.push(arsel[i]);
                    $.each(arsel[i].split(","), function(i, e) {
                        $(".selectpicker option[value='" + e + "']").prop("selected", true).trigger('change');
                    });
                };
                $('.selectpicker').selectpicker('refresh');

                console.log(data);
                console.log("ICIIIIIII");

                $('#personal_info').modal('show'); // show bootstrap modal

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(data);
                alert(errorThrown);
            }
        });
    }


    function save_cv() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('Cv/add_personal_infos') ?>";
        } else if (save_method == 'edit') {
            url = "<?php echo base_url('Cv/edit_personal_infos') ?>";
        }

        let data = new FormData($('#student_form')[0]);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            success: function(data) {
                //if success close modal and reload ajax table
                console.log("ici");
                $('#profile_modal').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // $("#error").text('Ce champ est obligatoire');
                // $("#error").attr('class', 'col-5 text-danger mt-2');
                // $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
                console.log(data);
                // alert("il ya des champs manquants!");
                alert(data);
            }
        });
    }



    //  3.2 Formation
    function add_formation() {
        save_method = 'add';
        $('#formationForm')[0].reset(); // reset form on modals
        $('#formation_modal').modal('show'); // show bootstrap modal
    }

    function edit_formation(id) {
        save_method = 'update';
        $('#formationForm')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('/formation/ajax_get_formation') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                console.log(data);
                $('[name="idForm"]').val(data.idFormation);
                $('[name="school"]').val(data.etablissement);
                $('[name="studyLevel"]').val(data.niveau_etude);
                $('[name="field"]').val(data.domaine);
                $('[name="startDate"]').val(moment(data.dateDebut).format('YYYY-MM-DD'));
                $('[name="endDate"]').val(moment(data.dateFin).format('YYYY-MM-DD'));
                $('[name="description"]').val(data.description);

                $('#formation_modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier la formation'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax');
            }
        });
    }

    function save_form() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('formation/add_formation') ?>";
        } else {
            url = "<?php echo base_url('formation/edit_formation') ?>";
        }
        let data = new FormData($('#formationForm')[0]);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            success: function(data) {
                //if success close modal and reload ajax table
                $('#add_formation').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                $("#error_2").text("Les champs Etablissement,Domaine et Niveau d'étude sont obligatoires.🤨 Veuillez-les remplir.");
                $("#error_2").attr('class', 'col-5 text-danger mt-2 text-center');
            }
        });
    }

    //  3.3. Experience Professionnelle
    function add_experience() {
        save_method = 'add';
        $('#experience_form')[0].reset(); // reset form on modals
        $('#add_experience').modal('show'); // show bootstrap modal
    }

    function update_experience(id) {
        save_method = 'update';
        $('#experience_form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>

        var dat = new Date();

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('/experience/get_by_ajax') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idExp"]').val(data.idExperience);
                $('[name="jobTitle"]').val(data.intitulePoste);
                $('[name="company"]').val(data.employeur);
                $('[name="startDate"]').val(data.dateDebut);
                $('[name="endDate"]').val(data.dateFin);
                $('[name="relisation"]').val(data.realisation);

                //$('#modal_offer_show').modal('hide');
                $('#experience_modal').modal('show'); // show bootstrap modal when complete loaded
                $('#title_ad').text("Modifier l'experience"); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Erreur Ajax');
            }
        });
    }

    function save_experience() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('experience/add') ?>";
        } else {
            url = "";
        }

        document.getElementById('realisation').value = editor.getData();

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#experience_form').serialize(),
            dataType: "JSON",
            // async: false,
            success: function(data) {
                console.log(data);
                //if success close modal and reload ajax table
                $('#add_experience').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Une erreur est survenue');
            }
        });

    }

    // 3.4. Competence
    function add_skill() {
        save_method = 'add';
        $('#skill_form')[0].reset(); // reset form on modals
        $('#add_skill').modal('show'); // show bootstrap modal
    }

    function save_skill() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('Competence/add_skills') ?>";
        } else {
            url = "";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#skill_form').serialize(),
            dataType: "JSON",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#add_skill').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // console.log(jqXHR);
                $("#error").text('Ce champ est obligatoire');
                $("#error").attr('class', 'col-5 text-danger mt-2 text-center');
            }
        });
    }

    //  3.5 Langue
    function add_language() {
        save_method = 'add';
        $('#language_form')[0].reset(); // reset form on modals
        $('#add_language').modal('show'); // show bootstrap modal
    }

    function save_language() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('language/add') ?>";
        } else {
            url = "";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#language_form').serialize(),
            dataType: "JSON",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#add_skill').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                $("#error_2").text('Veillez selectionner une langue ou verifier si la langue existe deja dans vos competences 🤨');
                $("#error_2").attr('class', 'col-5 text-danger mt-2 text-center');
            }
        });
    }
    //  --------------------    FIN    -----------------------------

    /*  =========================================================== 
                            4. Module Offre
        =========================================================== */

    //  4.1. Offre
    function add_offer() {
        save_method = 'add';
        $('#form_of')[0].reset(); // reset form on modals
        $('#modal_form_of').modal('show'); // show bootstrap modal
    }

    function edit_offer(id) {
        save_method = 'update';
        $('#form_of')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>

        $.ajax({
            url: "<?php echo base_url('/Offre/ajax_get_offer') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {


                $('[name="idOp"]').val(data.idOpportunite);
                $('[name="intituleOP"]').val(data.title);
                $('[name="idEnt"]').val(data.idEntreprise);
                $('[name="nomEnt"]').val(data.nomEntreprise);
                $('[name="idTC"]').val(data.idTypeContrat);
                $('[name="idNE"]').val(data.idNiveauEtude);
                $('[name="idV"]').val(data.idVille);
                $('[name="ville"]').val(data.nomVille);
                $('[name="idP"]').val(data.idProfil);
                $('[name="mis"]').val(data.mission);
                $('[name="preq"]').val(data.prerequis);
                $('[name="det"]').val(data.details);
                $('[name="dateC"]').val(moment(data.dateCloture).format('YYYY-MM-DD'));

                $('#modal_form_of').modal('show'); // show bootstrap modal when complete loaded
                $('#title_ad').text('Modifier Offre'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax');
            }
        });
    }

    function save_offer() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('Offre/add_offer') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo base_url('Offre/update_offer') ?>";
        }

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_of').serialize(),
            dataType: "text",
            // async: false,
            success: function(data) {
                console.log('dlkdjdk');
                console.log(data);
                //if success close modal and reload ajax table
                $('#modal_form_of').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert("Une erreur est survenue");

                //location.reload();
            }
        });
    }

    function delete_offer(id) {
        if (confirm('Voulez-vous vraiment supprimer cette offre?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('Offre/delete_offer') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    const id = $(this).data('idOpportunite');
                    $('.idOpportunite').val(id);
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }


    function delete_poste(id) {
        if (confirm('Voulez-vous vraiment supprimer cette candidature?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('Offre/delete_poste') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    const id = $(this).data('idOpportunite');
                    $('.idOpportunite').val(id);
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }


    function valider_poste(id) {
        if (confirm('Voulez-vous vraiment valider cette candidature ?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('Offre/valider_poste') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    const id = $(this).data('idOpportunite');
                    $('.idOpportunite').val(id);
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors du mise à jour');
                }
            });

        }
    }

    function rejeter_poste(id) {
        if (confirm('Voulez-vous vraiment rejeter cette candidature ?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('Offre/rejeter_poste') ?>/" + id,
                type: "POST",
                data: $('#experience_form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    const id = $(this).data('idOpportunite');
                    $('.idOpportunite').val(id);
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors du mise à jour');
                }
            });

        }
    }

    //  4.2. Type contrat
    function add_contract_type() {
        save_method = 'add';
        $('#formtc')[0].reset(); // reset form on modals
        $('#modal_form_tc').modal('show'); // show bootstrap modal
    }

    function edit_contract_type(id) {
        save_method = 'update';
        $('#formtc')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('/typeContrat/ajax_get_contract_type') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="idTC"]').val(data.idTypeContrat);
                $('[name="intituleTC"]').val(data.intitule);

                $('#modal_form_tc').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier Type Contrat'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax');
            }
        });
    }

    function save_contract_type() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('typeContrat/add_contract_type') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo base_url('typeContrat/edit_contract_type') ?>";
        }
        //var data = new FormData($('#formtc')[0]);
        let data = new FormData($('#formtc')[0]);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                //if success close modal and reload ajax table
                $('#modal_form_tc').modal('hide');
                location.reload(); // for reload a page

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#error").text('Ce champ est obligatoire');
                $("#error").attr('class', 'col-5 text-danger mt-2');
                $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
            }
        });
    }

    function delete_contract_type(id) {
        if (confirm('Voulez-vous vraiment supprimer ce type de contrat?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('typeContrat/delete_contract_type') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    const id = $(this).data('idTypeContrat');
                    $('.idTypeContrat').val(id);

                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Erreur de suppression');
                }
            });

        }
    }
    //  --------------------    FIN    -----------------------------

    /*  =========================================================== 
                            5. Module Elements de la bdd
        =========================================================== */

    //  5.1. Domaine
    function add_field() {
        save_method = 'add';
        $('#field_form')[0].reset(); // reset form on modals
        $('#field_modal').modal('show'); // show bootstrap modal
    }

    function edit_field(id) {
        save_method = 'edit';
        $('#field_form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>

        $.ajax({
            url: "<?php echo base_url('/domaine/getField') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idField"]').val(data.idDomaine);
                $('[name="field_title"]').val(data.intitule);

                $('#field_modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier le domaine'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax');
            }
        });
    }

    function save_field() {
        let url;
        if (save_method == 'add') {
            url = "<?php echo base_url('domaine/add_field') ?>";
        } else if (save_method == 'edit') {
            url = "<?php echo base_url('domaine/edit_field') ?>";
        }
        let data = new FormData($('#field_form')[0]);


        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            // async: false,
            success: function(data) {
                console.log(data);
                //if success close modal and reload ajax table
                $('#field_modal').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(data);
                $("#error").text('Ce champ est obligatoire');
                $("#error").attr('class', 'col-5 text-danger mt-2');
                $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');

            }
        });
    }

    function delete_field(id) {
        if (confirm('Voulez-vous vraiment supprimer ce domaine?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('domaine/delete_field') ?>/" + id,
                type: "POST",
                data: $('#field_form').serialize(),
                dataType: "JSON",
                // async: false,
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#field_modal').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }

    //  5.2. Profil
    function add_profile() {
        save_method = 'add';
        $('#profile_form')[0].reset(); // reset form on modals
        $('#profile_modal').modal('show'); // show bootstrap modal

    }

    function edit_profile(id) {
        save_method = 'edit';
        $('#profile_form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('/profil/getProfile') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="idProfile"]').val(data.idProfil);
                $('[name="profile_title"]').val(data.intitule);
                $('[name="field"]').val(data.idDomaine);

                $('#profile_modal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Modifier le domaine'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Erreur Ajax');
            }
        });
    }

    function save_profile() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo base_url('profil/add_profile') ?>";
        } else if (save_method == 'edit') {
            url = "<?php echo base_url('profil/edit_profile') ?>";
        }

        let data = new FormData($('#profile_form')[0]);
        console.log(data);

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            dataType: "text",
            success: function(data) {
                //if success close modal and reload ajax table
                console.log("ici");
                $('#profile_modal').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#error").text('Ce champ est obligatoire');
                $("#error").attr('class', 'col-5 text-danger mt-2');
                $("#icon").attr('class', 'fa fa-exclamation-circle text-danger mt-2');
            }
        });
    }

    function delete_profile(id) {
        if (confirm('Voulez-vous vraiment supprimer ce profil?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo base_url('profil/delete_field') ?>/" + id,
                type: "POST",
                data: $('#profile_form').serialize(),
                dataType: "JSON",
                // async: false,
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#profile_modal').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Erreur survenue lors de la suppression');
                }
            });

        }
    }
    //  --------------------    FIN    -----------------------------
</script>

</div>
</body>
<!-- index35:56-->

</html>