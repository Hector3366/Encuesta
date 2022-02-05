<?php
include "conexion.php";
$contra = $_POST['id_alumno'];
$Id_m=$_POST['ID_M'];
$comen = $_POST["comentarios"];


$pregun1=1;
$pregun2=2;
$pregun3=3;
$pregun4=4;
$pregun5=5;
$pregun6=6;
$pregun7=7;
$pregun8=8;
$pregun9=9;
$pregun10=10;

$c1=$_POST['cal1'];
$c2=$_POST['cal2'];
$c3=$_POST['cal3'];
$c4=$_POST['cal4'];
$c5=$_POST['cal5'];
$c6=$_POST['cal6'];
$c7=$_POST['cal7'];
$c8=$_POST['cal8'];
$c9=$_POST['cal9'];
$c10=$_POST['cal10'];
//Insertar Calificacion 1 Pregunta 1
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun1','$contra','$c1')";
$resultado=$conexion->query($query);
//Insertar Calificacion 2 Pregunta 2
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun2','$contra','$c2')";
$resultado=$conexion->query($query);
//Insertar Calificacion 3 Pregunta 3
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun3','$contra','$c3')";
$resultado=$conexion->query($query);
//Insertar Calificacion 4 Pregunta 4
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun4','$contra','$c4')";
$resultado=$conexion->query($query);
//Insertar Calificacion 5 Pregunta 5
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun5','$contra','$c5')";
$resultado=$conexion->query($query);
//Insertar Calificacion 6 Pregunta 6
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun6','$contra','$c6')";
$resultado=$conexion->query($query);
//Insertar Calificacion 7 Pregunta 7
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun7','$contra','$c7')";
$resultado=$conexion->query($query);
//Insertar Calificacion 8 Pregunta 8
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun8','$contra','$c8')";
$resultado=$conexion->query($query);
//Insertar Calificacion 9 Pregunta 9
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun9','$contra','$c9')";
$resultado=$conexion->query($query);
//Insertar Calificacion 10 Pregunta 10
$query= "INSERT INTO evaluaciones (id_asignar,id_pregunta,no_control,calificacion) VALUES('$Id_m','$pregun10','$contra','$c10')";
$resultado=$conexion->query($query);
//Insertar Comentario
$query= "INSERT INTO comentarios (id_asignar,no_control,comentario) VALUES('$Id_m','$contra','$comen')";
$resultado=$conexion->query($query);

if($resultado){
  ?>
  <?php
      include("alumnos.php");
  ?>

  <?php
    }else{
        echo "No se guardo";
    }
    

?>