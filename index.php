<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!--JQUERY-->
    <script src="librerias/jquery-3.6.0.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="librerias/bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <script src="librerias/bootstrap-4.6.1-dist/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/index.css" th:href="@{/css/index.css}">
    <link rel="stylesheet" href="librerias/sweetalert2.css">
    <script src="librerias/sweetalert2.js"></script>
</head>

<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img  src="img/avataaars.svg" th:src="@{/img/cet.png}" />
                </div>
                <form class="col-12" th:action="@{/login}" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" />
                    </div>
                    <button name="btn1" type="submit" class="btn btn-success"> Iniciar Sesión </button>
                </form>
                <!--<i class="fas fa-sign-in-alt"></i>-->
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['btn1'])) {
    include  "conexion.php";
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    session_start();
    $_SESSION['usuario'] = $usuario;

    //$conexion = mysqli_connect("localhost", "root", "", "evaluar");

    $consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_fetch_array($resultado);


    if ($filas !== null && $filas['usuario'] == $usuario && $filas['contraseña'] == $contraseña) {
        switch ($filas['id_cargo']) {
            case 1:
                header("location:admin.php");
                break;
            case 2:
                header("location:alumnos.php");
                break;
            case 3:
                header("location:inter.php");
                break;
            case 4:
                header("location:maestros.php");
                break;
        }
    
    }else{
        echo "<script> swal({
            title: 'ERROR',
            text: 'Usuario y/o Contraseña Incorrectos',
            type: 'error',
          });</script>";
    }


    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>