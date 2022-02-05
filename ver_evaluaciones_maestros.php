<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include("conexion.php");
        $ID = $_REQUEST['id'];
        $query = "SELECT maestros.nombre, maestros.apellido_p, maestros.apellido_m 
                                    FROM maestros 
                                    WHERE maestros.id_maestros=$ID";
        $resultado = $conexion->query($query);

        while ($row = $resultado->fetch_assoc()) {
        ?>
            <?php echo 'Resultados ' . $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?>
        <?php
        }
        ?>
    </title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="librerias/chart.js"></script>
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

            <li class="nav-item">
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
        <a style="color: white;" class="btn btn-secondary" href="javascript:history.back()" role="button"><b>REGRESAR</b></a>
        <div class="canvas_div_pdf" >

            <!-------------------------------------------------------------------------------------->
            <div class="table-responsive" id="mydatatable-container" style="padding: 0 75px 0px 75px;">
                <h3 style="color: red; text-align: center;">
                    <b>
                        <?php
                        include("conexion.php");
                        $ID = $_REQUEST['id'];
                        $query = "SELECT maestros.nombre, maestros.apellido_p, maestros.apellido_m 
                                    FROM maestros 
                                    WHERE maestros.id_maestros=$ID";
                        $resultado = $conexion->query($query);

                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <?php echo $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?>
                        <?php
                        }
                        ?>
                    </b>
                </h3><br>
                <!---------------------------------------------------------------------------------->
                <table class="records_list table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="5" style="text-align: center; color: blue;">
                                <h4>Calificación Promedio Por Semestre y Grupo</h4>
                            </th>
                        </tr>
                        <tr align="center">

                            <th>Semestre</th>
                            <th>Grupo</th>
                            <th>Materia</th>
                            <th>Alumnos Evaluados</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("conexion.php");
                        $ID = $_REQUEST['id'];
                        $ID_P = $_REQUEST['id_p'];
                        $query = "SELECT  semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)/10) AS
                        Contador, materias.materia
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN materias on materias.id_materia=asignar.id_materia
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                        INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                        WHERE asignar.id_periodo=$ID_P AND maestros.id_maestros=$ID
                        GROUP BY asignar.id_semestre, asignar.id_grupo";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                            $sem = $row['semestre'];
                            $gpo = $row['grupo'];

                            //echo  $sem.$gpo;
                            $asig = $sem . $gpo;
                        ?>
                            <tr align="center">
                                <td><?php echo $row['semestre']; ?></td>
                                <td><?php echo $row['grupo']; ?></td>
                                <td><?php echo $row['materia']; ?></td>
                                <td><?php echo $row['Contador']; ?></td>
                                <td><?php echo $row['Promedio']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table><br>
                <!------------------------------------------------------------------------------>
                <h1 style="border-top: 5px solid; padding-top: 10px;"></h1><br>
                <span style="color: red;"><b>
                        <h5>Para conocer el promedio de cada pregunta por grupo, puedes seleccionar el semestre y grupo que quieres consultar</h5>
                    </b></span>
                <div class="table-responsive" id="mydatatable-container">
                    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">

                        <thead>
                            <tr align="center">
                                <th>Semestre</th>
                                <th>Grupo</th>
                                <th>Pregunta</th>
                                <th>Alumnos Evaluados</th>
                                <th>Promedio</th>
                            </tr>

                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        </thead>
                        <tbody>
                            <?php
                            include("conexion.php");
                            $ID = $_REQUEST['id'];
                            $ID_P = $_REQUEST['id_p'];
                            $query = "SELECT preguntas.pregunta, semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)) AS
                        Contador, materias.materia
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN materias on materias.id_materia=asignar.id_materia
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                        INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                        WHERE asignar.id_periodo=$ID_P AND maestros.id_maestros=$ID
                        GROUP BY asignar.id_semestre, asignar.id_grupo, preguntas.id_pregunta";
                            $resultado = $conexion->query($query);
                            while ($row = $resultado->fetch_assoc()) {
                            ?>
                                <tr align="center">
                                    <td style="width:60px ;"><?php echo $row['semestre']; ?> </td>
                                    <td style="width:40px ;"><?php echo $row['grupo']; ?></td>
                                    <td align="left"><?php echo $row['pregunta']; ?></td>
                                    <td style="width:50px ;"><?php echo $row['Contador']; ?></td>
                                    <td style="width:50px ;"><?php echo $row['Promedio']; ?></td>
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
                            $(this).html('<input type="text" placeholder="Filtrar" />');
                        });

                        var table = $('#mydatatable').DataTable({
                            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                            "responsive": false,
                            "language": {
                                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                            },
                            "order": [
                                [0, "asc"]
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

                </script><br>
                <h1 style="border-top: 5px solid; padding-top: 10px;"></h1><br>
                <!---------------------------------------------------------------------------------->
                <table class="records_list table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="4" style="text-align: center; color: blue;">
                                <h4>Calificación Promedio Por Pregunta</h4>
                            </th>
                        </tr>
                        <tr align="center">
                            <th>No.</th>
                            <th>Preguntas</th>
                            <th>Alumnos Evaluados</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("conexion.php");
                        $ID = $_REQUEST['id'];
                        $ID_P = $_REQUEST['id_p'];
                        $query = "SELECT preguntas.id_pregunta,preguntas.pregunta, Round(AVG(evaluaciones.calificacion),1)AS Promedio, COUNT(evaluaciones.no_control) AS Contador
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                        WHERE asignar.id_periodo=$ID_P AND maestros.id_maestros=$ID
                        GROUP BY evaluaciones.id_pregunta";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_pregunta']; ?></td>
                                <td align="left"><?php echo $row['pregunta']; ?></td>
                                <td><?php echo $row['Contador']; ?></td>
                                <td><?php echo $row['Promedio']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table><br>

                <!------------------------------------------------------------------------------>

                <?php
                require_once "conexion.php";
                $ID = $_REQUEST['id'];
                $ID_P = $_REQUEST['id_p'];
                $sql = "SELECT preguntas.pregunta, Round(AVG(evaluaciones.calificacion),1 )AS Promedio
                                        FROM evaluaciones
                                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                                        WHERE asignar.id_periodo=$ID_P AND maestros.id_maestros=$ID
                                        GROUP BY evaluaciones.id_pregunta";
                $result = mysqli_query($conexion, $sql);
                $promedio = array();
                $nombre = array();

                while ($ver = mysqli_fetch_row($result)) {
                    $promedio[] = $ver[0];
                    $nombre[] = $ver[1];
                }

                $datosX = json_encode($nombre);
                $datosY = json_encode($promedio);

                ?>
                <canvas id="grafica"></canvas>
                <script type="text/javascript">
                    function crearCadenaHorizontal(json) {
                        var parsed = JSON.parse(json);
                        var arr = [];
                        for (var x in parsed) {
                            arr.push(parsed[x]);
                        }
                        return arr;
                    }
                </script>
                <script>
                    datosX = crearCadenaHorizontal('<?php echo $datosX ?>')
                    datosY = crearCadenaHorizontal('<?php echo $datosY ?>')
                    const ctx = document.getElementById('grafica').getContext('2d');
                    const grafica = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: datosY,
                            datasets: [{
                                label: 'Promedio',
                                data: datosX,
                                backgroundColor: [
                                    'rgba(241, 148, 138, 1)',
                                    'rgba(210, 180, 222, 1)',
                                    'rgba(174, 214, 241, 1)',
                                    'rgba(171, 235, 198, 1)',
                                    'rgba(249, 231, 159, 1)',
                                    'rgba(213, 219, 219, 1)',
                                ],
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'PROMEDIOS POR PREGUNTAS'
                                }
                            },
                            indexAxis: 'y',
                            scales: {
                                y: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontSize: 10
                                    },
                                }, ],

                            }
                        }
                    });
                </script><br>

                <h1 style="border-top: 5px solid; padding-top: 10px;"></h1><br>
                <!------------------------------------------------------------------------------>
                <table class="records_list table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center; color: blue;">
                                <h4>Comentarios</h4>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("conexion.php");
                        $ID = $_REQUEST['id'];
                        $ID_P = $_REQUEST['id_p'];
                        $query = "SELECT asignar.id_periodo, comentarios.comentario 
                        FROM comentarios 
                        INNER JOIN asignar ON asignar.id_asignar=comentarios.id_asignar
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        WHERE maestros.id_maestros=$ID AND asignar.id_periodo=$ID_P";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                        ?>
                            <tr>

                                <td><?php echo $row['comentario']; ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <center>
            <button type="button" class="btn btn-dark" onclick="window.print()">DESCARGAR</button><br>
            <br>
        </center>

    </main><!-- Fin #main -->

</body>

</html>


