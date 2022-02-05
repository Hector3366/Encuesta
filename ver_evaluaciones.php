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
    <script src="librerias/jspdf.min.js"></script>
    <script src="librerias/html2canvas.js"></script>
    <script src="librerias/chart.js"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex ">

        <div class="d-flex align-items-center text-aling-center">

            <h2 style="padding-left: 500px;">
                <?php
                include "conexion.php";
                $p = $_REQUEST['id'];
                $consulta = "SELECT periodo.periodo FROM periodo WHERE periodo.id_periodo=$p";
                $resultado = mysqli_query($conexion, $consulta);
                $mostrar = mysqli_fetch_array($resultado);
                echo 'Resultados '.$mostrar['periodo'];
                ?>
            </h2>
        </div><!-- Fin Logo -->
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
        <center class="canvas_div_pdf">

            <div class="container">
                <div class="column">
                    <div class="col-sm-10">
                        <div class="panel panel-primary">
                            <div class="panel panel-heading">
                                <div class="panel panel-body">

                                    <div class="col-sm-12">
                                        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: center; color: blue;">
                                                        <h4>Calificación Promedio General Por Maestros</h4>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Maestro</th>
                                                    <th>Alumnos Evaluados</th>
                                                    <th>Promedio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include("conexion.php");
                                                $ID = $_REQUEST['id'];
                                                $query = "SELECT asignar.id_periodo,maestros.id_maestros, maestros.nombre, maestros.apellido_p, maestros.apellido_m,  Round(AVG(evaluaciones.calificacion),1 )AS Promedio, COUNT(DISTINCT(evaluaciones.no_control)) AS Contador
                                        FROM evaluaciones
                                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                        WHERE asignar.id_periodo=$ID
                                        GROUP BY asignar.id_maestro
                                        ORDER BY asignar.id_maestro";
                                                $resultado = $conexion->query($query);
                                                while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><a href="ver_evaluaciones_maestros.php?id=<?php echo $row['id_maestros']; ?>&id_p=<?php echo $row['id_periodo'] ?>"><?php echo $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?></a></td>
                                                        <td><?php echo $row['Contador']; ?></td>
                                                        <td><?php echo $row['Promedio']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>


                                    </div>
                                    <br><br>
                                    <div class="col-sm-12">
                                        <canvas id="chart1" style="width:100%; "></canvas>
                                        <?php
                                        $con = new mysqli("localhost", "root", "", "encuesta"); // Conectar a la BD
                                        $ID = $_REQUEST['id'];
                                        $sql = "SELECT maestros.nombre,maestros.apellido_p,maestros.apellido_m,  AVG(evaluaciones.calificacion) AS Promedio
                                                FROM evaluaciones
                                                INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                                INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                                WHERE asignar.id_periodo=$ID
                                                GROUP BY asignar.id_maestro
                                                ORDER BY asignar.id_maestro"; // Consulta SQL
                                        $query = $con->query($sql); // Ejecutar la consulta SQL
                                        $data = array(); // Array donde vamos a guardar los datos
                                        while ($r = $query->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
                                            $data[] = $r; // Guardar los resultados en la variable $data
                                        }
                                        ?>


                                        <script>
                                            var ctx = document.getElementById("chart1");
                                            var data = {
                                                labels: [
                                                    <?php foreach ($data as $d) : ?> "<?php echo $d->nombre ?> <?php echo $d->apellido_p ?> <?php echo $d->apellido_m ?>",
                                                    <?php endforeach; ?>
                                                ],
                                                datasets: [{
                                                    label: 'Promedio',
                                                    data: [
                                                        <?php foreach ($data as $d) : ?>
                                                            <?php echo $d->Promedio; ?>,
                                                        <?php endforeach; ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(241, 148, 138, 1)',
                                                        'rgba(210, 180, 222, 1)',
                                                        'rgba(174, 214, 241, 1)',
                                                        'rgba(171, 235, 198, 1)',
                                                        'rgba(249, 231, 159, 1)',
                                                        'rgba(213, 219, 219, 1)',
                                                    ],
                                                }]
                                            };
                                            var options = {
                                                plugins: {
                                                    title: {
                                                        display: true,
                                                        text: 'PROMEDIOS MAESTROS',
                                                        

                                                    }
                                                },
                                                indexAxis: 'y',
                                                scales: {
                                                    y: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                },
                                                showTooltips: true,
                                                onAnimationComplete: function() {

                                                    var ctx = this.chart.ctx;
                                                    ctx.font = this.scale.font;
                                                    ctx.fillStyle = this.scale.textColor
                                                    ctx.textAlign = "center";
                                                    ctx.textBaseline = "bottom";

                                                    this.datasets.forEach(function(dataset) {
                                                        dataset.points.forEach(function(points) {
                                                            ctx.fillText(points.value, points.x, points.y - 10);
                                                        });
                                                    })
                                                }
                                            };

                                            var chart1 = new Chart(ctx, {
                                                type: 'bar',
                                                data: data,
                                                options: options
                                            });
                                        </script>
                                    </div><br>

                                    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                                        <thead>
                                            <tr>
                                                <th colspan="4" style="text-align: center; color: blue;">
                                                    <h4>Calificación Promedio Por Semestre y Grupo</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Semestre</th>
                                                <th>Grupo</th>
                                                <th>Alumnos Evaluados</th>
                                                <th>Promedio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("conexion.php");
                                            $ID = $_REQUEST['id'];
                                            $query = "SELECT semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, COUNT(DISTINCT(evaluaciones.no_control)) AS
                                            Contador
                                            FROM evaluaciones
                                            INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                            INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                            INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                                            INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                                            WHERE asignar.id_periodo=$ID
                                            GROUP BY asignar.id_semestre, asignar.id_grupo";
                                            $resultado = $conexion->query($query);
                                            while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['semestre']; ?></td>
                                                    <td><?php echo $row['grupo']; ?></td>
                                                    <td><?php echo $row['Contador']; ?></td>
                                                    <td><?php echo $row['Promedio']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
        </center>
        <center>
        <button type="button" class="btn btn-dark" onclick="window.print()">DESCARGAR</button><br>
        </center>
    </main><!-- Fin #main -->

</body>

</html>


<script type="text/javascript">
    function getPDF() {

        var HTML_Width = $(".canvas_div_pdf").width();
        var HTML_Height = $(".canvas_div_pdf").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($(".canvas_div_pdf")[0], {
            allowTaint: true
        }).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height + "  " + canvas.width);

            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
            }

            pdf.save("Informe.pdf");
        });
    };
</script>