<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- CSS-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
    <!-- SweetAlert -->
    <link rel="stylesheet" href="librerias/sweetalert2.css">
    <script src="librerias/sweetalert2.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>

    <!-- Botones -->
    <script src="librerias/dataTables.buttons.min.js"></script>
    <script src="librerias/jszip.min.js"></script>
    <script src="librerias/pdfmake.min.js"></script>
    <script src="librerias/vfs_fonts.js"></script>
    <script src="librerias/buttons.html5.min.js"></script>
    <script src="librerias/buttons.print.min.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <h1 style="padding-left: 460px;">LISTA DE USUARIOS PARA ALUMNOS</h1>
    </header><!-- Fin Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin.php">
                    <i class="bi bi-house-fill"></i>
                    <span>INICIO</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="evaluaciones_periodo.php">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>EVALUACIONES</span>
                </a>
            </li><!-- Fin Materias Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#asignar-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>USUARIOS</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="asignar-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="usuarios_maestros.php">
                            <i class='fas fa-chalkboard-teacher'></i><span>MAESTROS</span>
                        </a>
                    </li>
                    <li>
                        <a href="usuarios_alumnos.php">
                            <i class='fas fa-user-graduate'></i><span>ALUMNOS</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Fin usuarios Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="salir.php">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>CERRAR SESIÓN</span>
                </a>
            </li><!-- Fin Login Page Nav -->

        </ul>

    </aside><!-- Fin Sidebar-->

    <main id="main" class="main">
        <div class="row">
            <div class="col6">
                <div class="table-responsive" style="padding: 10px 25px 10px 25px;">


                    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                        <thead>
                            <tr align="center">
                                <th style="width: 25px">Semestre</th>
                                <th style="width: 25px;">Grupo</th>
                                <th style="width: 350px;">Nombre</th>
                                <th style="width: 150px;">Usuario Y Contraseña</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>

                        <tbody>

                            <?php

                            require_once 'dbcon.php';
                            $query = "SELECT alumnos.nombre,alumnos.apellido_p,alumnos.apellido_m, usuarios.usuario,usuarios.contraseña, semestre.semestre,grupo.grupo
                            FROM usuarios 
                            INNER JOIN alumnos ON alumnos.no_control=usuarios.usuario
                            inner JOIN semestre on semestre.id_semestre=alumnos.id_semestre
                            INNER JOIN grupo on grupo.id_grupo=alumnos.id_grupo
                            WHERE usuarios.id_cargo=2";
                            $stmt = $DBcon->prepare($query);
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                $c = 0;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row);
                                    $c++;
                            ?>
                                    <tr>
                                        <td align="center"><?php echo $row['semestre']; ?></td>
                                        <td align="center"><?php echo $row['grupo']; ?></td>
                                        <td><?php echo $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?></td>
                                        <td align="center"><?php echo $row['usuario']; ?></td>

                                    </tr>
                                <?php
                                }
                            } else {

                                ?>
                                <tr align="center">
                                    <td colspan="3">No hay usuarios en lista</td>
                                </tr>
                            <?php

                            }
                            ?>

                        </tbody>
                    </table>

                </div>
                <style>
                    #mydatatable tfoot input {
                        width: 100% !important;
                    }

                    #mydatatable tfoot {
                        display: table-header-group !important;
                    }
                </style>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#mydatatable tfoot th').each(function() {
                            var title = $(this).text();
                            $(this).html('<input type="text" placeholder="Filtrar.." />');
                        });

                        var table = $('#mydatatable').DataTable({
                            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                            "responsive": false,
                            "language": {
                                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                            },
                            "buttons": [{
                                    extend: 'excel',
                                    text: '<i class="bi bi-file-earmark-excel"></i>',
                                    tittleAttr: 'Exportar a Excel',
                                    className: 'btn btn-success'
                                },
                                {
                                    extend: 'print',
                                    text: '<i class="bi bi-printer"></i>',
                                    tittleAttr: 'IMPRIMIR',
                                    className: 'btn btn-info',
                                }
                            ],
                            "order": [
                                [1, "desc"]
                            ],
                            "initComplete": function() {
                                this.api().columns().every(function() {
                                    var that = this;

                                    $('input', this.footer()).on('keyup change', function() {
                                        if (that.search() !== this.value) {
                                            that
                                                .search(this.value)
                                                .draw();
                                        }
                                    });
                                })
                            }
                        });
                    });
                </script>


            </div>

</body>

</html>