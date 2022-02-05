<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- JS-->
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- CSS-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

    </header><!-- Fin Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item ">
                <a class="nav-link collapsed" href="admin.php">
                    <i class="bi bi-house-fill"></i>
                    <span>INICIO</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link " href="evaluaciones_periodo.php">
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


        <center>
            <div class="table-responsive" id="mydatatable-container" style="padding: 0 75px 100px 75px; align-content: flex-end;">

                <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                    <thead>
                        <tr>
                            <th>Periodo</th>
                            <th>Operación</th>
                            <th hidden>ID</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("conexion.php");

                        $query = "SELECT * FROM periodo";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>

                                <td><?php echo $row['periodo']; ?></td>
                                <th align="center"><a class="btn btn-primary" href="ver_evaluaciones.php?id=<?php echo $row['id_periodo']; ?>" role="button"><i class="bi bi-eye-fill"></i>VER</a></th>
                                <td hidden><?php echo $row['id_periodo']; ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <style>
                #mydatatable tfoot input {
                    width: 50% !important;
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
                        "order": [
                            [0, "desc"]
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
        </center>
    </main><!-- Fin #main -->

</body>

</html>