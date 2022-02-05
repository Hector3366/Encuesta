<?php
session_start();
if ($_SESSION["usuario"] === null) {
  header("Location: index.php");
}
$user = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <title>Evaluación Docente</title>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      padding: 0 250px 50px 250px;
      text-align: justify;
    }

    #texto p {
      font-family: 'Montserrat', sans-serif;
    }

    #texto h4 {
      font-family: 'Montserrat', sans-serif;
    }

    table {
      font-family: 'Montserrat', sans-serif;
    }

    img {
      width: 100px;
      height: 100px;
      border-radius: 10px;
    }
    header {
      color: blue;
      padding-top: 10px;
      
    }
  </style>
</head>

<body>
  <header>
    <div class="row">
      <div class="col-2">
        <img id="img1" src="img/docentes.png">
      </div>
      <div class="col-8">
        <h3 style="text-align: center; padding-top: 15px;"><b>Evaluación Docente</b><br>
          <?php
          include "conexion.php";
          $consulta = "SELECT periodo.periodo FROM periodo WHERE periodo.id_periodo=(SELECT MAX(periodo.id_periodo) FROM periodo)";
          $resultado = mysqli_query($conexion, $consulta);
          $mostrar = mysqli_fetch_array($resultado);
          echo $mostrar['periodo'];
          

          ?>
        </h3>
      </div>
      <div class="col-2">
        <img src="img/cet.png">
      </div>

    </div>

  </header><br>
  <div class="row">
    <div class="col-10">
      <h4>
        <?php
        include "conexion.php";
        $consulta = "SELECT alumnos.nombre, alumnos.apellido_p, alumnos.apellido_m FROM alumnos WHERE alumnos.no_control=$user";
        $resultado = mysqli_query($conexion, $consulta);
        $mostrar = mysqli_fetch_array($resultado);
        ?>
        <?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido_p']; ?> <?php echo $mostrar['apellido_m']; ?>
      </h4>
    </div>
    <div class="col-2" style="padding-left: 35px;">
    <a class="btn btn-danger" href="salir.php" role="button">SALIR</a>
    </div>
  </div><br>


  <div class="instrucciones" id="texto">
    <h4><b>OBJETIVO</b></h4>
    <p>Conocer su opinión sobre el desempeño de los profesores que le imparten clases, con la finalidad de mejorar el servicio que se le brinda. De tal modo le pedimos que emita una opinión objetiva y sincera.</p>
    <h4><b>INSTRUCCIONES</b></h4>
    <p>La calificación a asignar será de acuerdo a las siguientes preguntas. Para cada aspecto a evaluar se presenta la lista de tus profesores, selecciona su calificación utilizando una escala del 1 al 10.</p>

    <p style="text-align: center; "><b>Donde: 1="Muy Malo" Y 10="Excelente"</b></p>
  </div>
  <div class="preguntas">
    <center>
      <!--------------------------------------Tabla 1-------------------------------------------->
      <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <thead>
          <tr align="center">
            <th>Maestro</th>
            <th>Materia</th>
            <th>Evaluar</th>
          </tr>
        </thead>

        <tbody>

          <?php

          require_once 'dbcon.php';
          $query = "SELECT asignar.id_asignar, maestros.nombre, maestros.apellido_p, maestros.apellido_m, materias.materia 
          FROM asignar 
          INNER JOIN alumnos ON asignar.id_semestre =alumnos.id_semestre AND asignar.id_grupo=alumnos.id_grupo 
          INNER JOIN maestros ON asignar.id_maestro=maestros.id_maestros 
          INNER JOIN materias ON asignar.id_materia=materias.id_materia 
          INNER join periodo ON periodo.id_periodo=asignar.id_periodo
          WHERE periodo.id_periodo=(SELECT MAX(periodo.id_periodo) FROM periodo) 
          AND alumnos.no_control=$user 
          AND NOT EXISTS(SELECT * FROM evaluaciones WHERE evaluaciones.id_asignar=asignar.id_asignar AND evaluaciones.no_control=alumnos.no_control) 
          GROUP BY asignar.id_asignar";
          $stmt = $DBcon->prepare($query);
          $stmt->execute();

          if ($stmt->rowCount() > 0) {

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
          ?>
              <tr>
                <td hidden><img class="fot" height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar1['imagen']); ?>" /></td>
                <td><?php echo $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?></td>
                <td><?php echo $row['materia']; ?></td>
                <th align="center"><a class="btn btn-success" href="evaluar.php?id=<?php echo $row['id_asignar']; ?>" role="button"><i class="bi bi-check"></i> EVALUAR</a></th>

              </tr>
            <?php
            }
          } else {

            ?>
            <tr>
              <td colspan="3" style="text-align: center; background-color: rgb(230,230,230);"><b>No hay Maestros Para Evaluar</b></td>
            </tr>
          <?php

          }
          ?>

        </tbody>
      </table>
      <!-------------------------------------------------------------------------------------------->
    </center>
  </div>
</body>

</html>