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
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
    form{
      padding: 0 200px 50px 200px;
      text-align: justify;  
    }
     table{
    font-family: 'Montserrat', sans-serif;
  }
  h2,p,textarea,input{
    font-family: 'Montserrat', sans-serif;
  }
  img {
      width: 100px;
      height: 100px;
      border-radius: 10px;
    }

    header, h2 {
      color: blue;
      padding: 0 200px 10px 200px;
    }
    .inicio h4{
      padding: 0 200px 10px 200px;
    }
    select{
      width: 50px;
      height: 25px;
    }
  </style>
</head>

<body>
  <header>
  <div class="row">
      <div class="col-2">
        <img src="img/docentes.png">
      </div>
      <div class="col-8">
        <h3 style="text-align: center; padding-top: 15px;">Evaluación Docente <br>
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
  <div class="inicio">
    <h4>
      <?php
      include "conexion.php";
      $consulta = "SELECT alumnos.nombre, alumnos.apellido_p, alumnos.apellido_m FROM alumnos WHERE alumnos.no_control=$user";
      $resultado = mysqli_query($conexion, $consulta);
      $mostrar = mysqli_fetch_array($resultado);
      ?>
      <?php echo $mostrar['nombre']; ?> <?php echo $mostrar['apellido_p']; ?> <?php echo $mostrar['apellido_m']; ?>
    </h4>
  </div><br>

  <center>
    <form action="guardar_evaluacion.php" method="post">
      <!--------------------------------------Tabla 1------------------------------------->
      <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <tr>
          <th>No.</th>
          <th>Preguntas</th>
          <th>Calificación</th>
        </tr>
        <!------------------------------Pregunta 1------------------------------------------->
        <tr>
          <td>1</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=1";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar1 = mysqli_fetch_array($resultado)) {
              echo $mostrar1['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal1">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!----------------------------Pregunta 2---------------------------------------------->
        <tr>
          <td>2</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=2";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar2 = mysqli_fetch_array($resultado)) {
              echo  $mostrar2['pregunta'];
            }
            ?>
          </td>
          <td align="center"> 
            <select name="cal2">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!---------------------------------Pregunta 3---------------------------------------->
        <tr>
          <td>3</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=3";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar3 = mysqli_fetch_array($resultado)) {
              echo  $mostrar3['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal3">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!------------------------------Pregunta 4-------------------------------------------->
        <tr>
          <td>4</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=4";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar4 = mysqli_fetch_array($resultado)) {
              echo  $mostrar4['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal4">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!-----------------------------------Pregunta 5---------------------------------------->
        <tr>
          <td>5</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=5";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar5 = mysqli_fetch_array($resultado)) {
              echo  $mostrar5['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal5">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!---------------------------------Pregunta 6------------------------------------------>
        <tr>
          <td>6</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=6";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar6 = mysqli_fetch_array($resultado)) {
              echo  $mostrar6['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal6">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!------------------------------------Pregunta 7--------------------------------------->
        <tr>
          <td>7</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=7";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar7 = mysqli_fetch_array($resultado)) {
              echo  $mostrar7['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal7">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!------------------------------Pregunta 8--------------------------------------------->
        <tr>
          <td>8</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=8";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar8 = mysqli_fetch_array($resultado)) {
              echo  $mostrar8['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal8">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!------------------------------Pregunta 9--------------------------------------------->
        <tr>
          <td>9</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=9";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar9 = mysqli_fetch_array($resultado)) {
              echo  $mostrar9['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal9">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
        <!---------------------------------Pregunta 10--------------------------------------------->
        <tr>
          <td>10</td>
          <td>
            <?php
            include "conexion.php";
            $consulta = "SELECT preguntas.pregunta FROM preguntas WHERE preguntas.id_pregunta=10";
            $resultado = mysqli_query($conexion, $consulta);
            while ($mostrar10 = mysqli_fetch_array($resultado)) {
              echo  $mostrar10['pregunta'];
            }
            ?>
          </td>
          <td align="center">
            <select name="cal10">
              <option value="10">10</option>
              <option value="9">9</option>
              <option value="8">8</option>
              <option value="7">7</option>
              <option value="6">6</option>
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </td>
        </tr>
      </table><br>

      <!--------------------------------Tabla de Comentarios-------------------------------->
      <h4 style="text-align: center;"><b>COMENTARIO</b></h4>
      <p>Escribe un comentario de maximo 120 caracteres</p>
      <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <tr align="center">
          <th colspan="2">Maestro</th>
          <th>Materia</th>
          <th>Comentario</th>
        </tr>
        <?php
        include "conexion.php";
        $id_m = $_REQUEST['id'];  
        $consulta = "SELECT maestros.imagen, asignar.id_asignar, maestros.nombre, maestros.apellido_p, maestros.apellido_m, materias.materia 
        FROM asignar
        INNER JOIN maestros  ON asignar.id_maestro=maestros.id_maestros
        INNER JOIN materias ON asignar.id_materia=materias.id_materia
        WHERE asignar.id_asignar=$id_m";
        $resultado = mysqli_query($conexion, $consulta);
        while ($mostrar1 = mysqli_fetch_array($resultado)) {
        ?>
          <tr>
            <input type="hidden" name="ID_M" value="<?php echo $mostrar1['id_asignar'];?>" />
            <td align="center"><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar1['imagen']); ?>" /></td>
            <td><?php echo $mostrar1['nombre']; ?> <?php echo $mostrar1['apellido_p']; ?> <?php echo $mostrar1['apellido_m']; ?></td>
            <td><?php echo $mostrar1['materia']; ?></td>
            <td><textarea name="comentarios" cols="40" rows="3" placeholder="Comentario" maxlength="120" required></textarea></td>
          </tr>
        <?php
        }
        ?>
      </table><br>
      <!-----------------------------------Botón---------------------------------------->
      <input type="hidden" name="id_alumno" value="<?php echo $user;?>" />
      <center>
      <button type="submit" class="btn btn-success">Aceptar</button>
      </center>
    </form>
  </center>
</body>

</html>