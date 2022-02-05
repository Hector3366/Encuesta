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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <style>
        img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        header {
            font-family: 'Montserrat', sans-serif;
        }

        h3 {
            font-family: 'Montserrat', sans-serif;
        }

        h5 {
            text-align: justify;
        }

        table {
            font-family: 'Montserrat', sans-serif;
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
            </div><br><br><br>
    </header>
    <center>
        <h5>Para consultar los resultados de la encuesta docente, haz clic en <b>VER</b> en el periodo que desea consultar.</h5>
        <div class="table-responsive" id="mydatatable-container">

            <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                <thead>
                    <tr align="center">
                        <th colspan="2">PERIODOS</th>
                    </tr>
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
                            <th align="center"><a class="btn btn-primary" href="maestros_evaluaciones.php?id=<?php echo $row['id_periodo']; ?>" role="button"><i class="bi bi-eye-fill"></i>VER</a></th>

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
</body>

</html>