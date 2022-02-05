<?php
session_start();
if ($_SESSION["usuario"] === null) {
    header("Location: index.php");
}
$user = $_SESSION["usuario"];
$separador = '.';
$separada = explode($separador, $user);
$p1 = $separada[0];
$p2 = $separada[1];
//echo $p1.' '.$p2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- JS-->
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- CSS-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="librerias/chart.js"></script>
    <style>
        img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }
    </style>
</head>

<body style="padding: 0 250px 50px 250px;">
    <header>
        <div class="row">
            <div class="col-2">
                <img id="img1" src="img/docentes.png">
            </div>
            <div class="col-8">
                <h3 style="text-align: center; padding-top: 15px; color: blue;"><b>Evaluación Docente</b><br>
                </h3>
            </div>
            <div class="col-2">
                <img src="img/cet.png">
            </div><br><br>
            <div class="col-12">
                <br>
            </div>
            <div class="row">
                <div class="col-10">
                    <h4>
                        <?php
                        include "conexion.php";
                        $consulta = "SELECT maestros.imagen, maestros.nombre,maestros.apellido_p,maestros.apellido_m FROM maestros WHERE maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $mostrar = mysqli_fetch_array($resultado);
                        ?>
                        <img height="15px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']); ?>"/>
                        <?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido_p']; ?> <?php echo $mostrar['apellido_m']; ?>
                    </h4>
                </div>
                <div class="col-1" style="padding-left: 65px; padding-top: 25px;">
                    <a class="btn btn-danger" href="salir.php" role="button">SALIR</a>
                </div>
            </div><br><br><br><br><br><br>
    </header>
    <center class="canvas_div_pdf">
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
                $ID_P = $_REQUEST['id'];
                $query = "SELECT  semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)/10) AS
                        Contador, materias.materia
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN materias on materias.id_materia=asignar.id_materia
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                        INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                        WHERE asignar.id_periodo=$ID_P AND maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'
                        GROUP BY asignar.id_semestre, asignar.id_grupo";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()) {

                ?>
                    <tr align="center">
                        <td><?php echo $row['semestre']; ?></td>
                        <td><?php echo $row['grupo']; ?></td>
                        <td><?php echo $row['materia']; ?></td>
                        <td align="center"><?php echo $row['Contador']; ?></td>
                        <td align="center"><?php echo $row['Promedio']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table><br>
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
                    $ID_P = $_REQUEST['id'];
                    $query = "SELECT preguntas.pregunta, semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)) AS
                                Contador, materias.materia
                                FROM evaluaciones
                                INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                INNER JOIN materias on materias.id_materia=asignar.id_materia
                                INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                                INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                                INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                                WHERE asignar.id_periodo=$ID_P AND maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'
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
                $ID_P = $_REQUEST['id'];
                $query = "SELECT preguntas.id_pregunta,preguntas.pregunta, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)) AS Contador
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                        WHERE asignar.id_periodo=$ID_P AND maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'
                        GROUP BY evaluaciones.id_pregunta";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id_pregunta']; ?></td>
                        <td><?php echo $row['pregunta']; ?></td>
                        <td align="center"><?php echo $row['Contador']; ?></td>
                        <td align="center"><?php echo $row['Promedio']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        require_once "conexion.php";
        $ID_P = $_REQUEST['id'];
        $sql = "SELECT preguntas.pregunta, Round(AVG(evaluaciones.calificacion),1 )AS Promedio
                                        FROM evaluaciones
                                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                                        WHERE asignar.id_periodo=$ID_P AND maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'
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
                $ID_P = $_REQUEST['id'];
                $query = "SELECT asignar.id_periodo, comentarios.comentario 
                        FROM comentarios 
                        INNER JOIN asignar ON asignar.id_asignar=comentarios.id_asignar
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        WHERE maestros.nombre like'$p1%' AND maestros.apellido_p='$p2'  AND asignar.id_periodo=$ID_P";
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
    </center>
    <center>
        <!---<button type="button" class="btn btn-dark" onclick="getPDF()">DESCARGAR</button><br>-->
        <button type="button" class="btn btn-dark" onclick="window.print()">DESCARGAR</button><br>
    </center>
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