$(document).ready(function () {
    let dataTables = [
        ['#table_id', 'entreprises'],
        ['#table_secteur', 'secteurs'],
        ['#table_form', 'formations'],
        ['#table_tc', 'types de contrats'],
        ['#table_of', 'offres']
    ];
    let d = new Date();
    let t = d.getDate() + "/" + (d.getMonth() + 1) + "/" + (d.getFullYear());
    dataTables.forEach(dataTable => {
        //// ================================
        $(dataTable[0] + ' tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" style="width: 100%; padding: 3px;box-sizing: border-box;" placeholder="' + title + '" width="10px" />');
        });

        $(dataTable[0]).DataTable({

            "aaSorting": [
                [1, 'asc']
            ],
            retrieve: true,
            dom: 'lBfrtip',
            buttons: [

                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'La liste des ' + dataTable[1] + ' à la date du ' + t

                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'La liste des ' + dataTable[1] + ' à la date du ' + t

                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'La liste des ' + dataTable[1] + ' à la date du ' + t

                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2],
                    },
                    title: 'La liste des ' + dataTable[1] + ' à la date du ' + t

                },

            ],

            initComplete: function () {
                // Apply the search
                this.api().columns().every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            "oLanguage": {
                "sProcessing": "Traitement en cours...",
                "sLengthMenu": "Afficher _MENU_ éléments",
                "sZeroRecords": "Aucun élément à afficher",
                "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_",
                "sInfo": "Affichage de l'élement _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": "Affichage de l'élement 0 à 0 sur 0 éléments",
                "sInfoFiltered": "(filtré de _MAX_ éléments au total)",
                "sInfoPostFix": "",
                "sSearch": "Rechercher :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "|<",
                    "sPrevious": "<",
                    "sNext": ">",
                    "sLast": ">|"
                }
            }
        });
    });

    // Datatable de la liste des utilisateurs
    $('#table_users tfoot th').each(function () {
        var title = $(this).text();
        if (title === "Activation") {

            $(this).html('<select id="id_select"  style="width: 100%; padding: 3px;box-sizing: border-box;" width="10px" ><option value="">Activation</option><option value="1" >Actif</option><option value="0">Inactif</option></select>');

        } else {
            $(this).html('<input type="text" style="width: 100%; padding: 3px;box-sizing: border-box;" placeholder="' + title + '" width="10px" />');
        }
    });

    // DataTable
    var table = $('#table_users').DataTable({
        "columnDefs": [{
            "targets": [5],
        }], // cache la colonne contenant la valeur de l'attrobut actif 
        // nous permettant ainsi de pouvoir filtrer les comptes actif ou inactif
        "aaSorting": [
            [1, 'asc']
        ],
        retrieve: true,
        initComplete: function () {
            // Apply the search
            this.api().columns().every(function (a) {
                var that = this;

                if (a == 5) {

                    $('#id_select').on('change', function () {
                        table.columns(6)
                            .search(this.value)
                            .draw();
                    });
                } else {
                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                }
            });
        },
        "oLanguage": {
            "sProcessing": "Traitement en cours...",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sZeroRecords": "Aucun élément à afficher",
            "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_",
            "sInfo": "Affichage de l'élement _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élement 0 à 0 sur 0 éléments",
            "sInfoFiltered": "(filtré de _MAX_ éléments au total)",
            "sInfoPostFix": "",
            "sSearch": "Rechercher :",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "|<",
                "sPrevious": "<",
                "sNext": ">",
                "sLast": ">|"
            }
        }
    });
    // Fin du script de la datatable de la liste des utilisateurs


});