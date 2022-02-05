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
	<link rel="stylesheet" href="librerias/sweetalert2.css">
	<script src="librerias/sweetalert2.js"></script>

</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

	</header><!-- Fin Header -->
	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link collapsed" href="inter.php">
					<i class="bi bi-house-fill"></i>
					<span>INICIO</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-item">
				<a class="nav-link" data-bs-target="#maestros-nav" data-bs-toggle="collapse" href="#">
					<i class='fas fa-chalkboard-teacher'></i><span>MAESTROS</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="maestros-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="ingresar_maestro.php">
							<i class="fas fa-user-plus"></i><span>Ingresar Maestros</span>
						</a>
					</li>
					<li>
						<a href="ver_maestros.php">
							<i class="fas fa-eye"></i><span>Ver Maestros</span>
						</a>
					</li>
					<li>
						<a href="modificar_maestros.php">
							<i class="fas fa-user-edit"></i><span>Modificar Maestros</span>
						</a>
					</li>
					<li>
						<a href="eliminar_maestros.php">
							<i class="fas fa-trash-alt"></i><span>Eliminar Maestros</span>
						</a>
					</li>
				</ul>
			</li><!-- End maestros Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#Alumnos-nav" data-bs-toggle="collapse" href="#">
					<i class='fas fa-user-graduate'></i><span>ALUMNOS</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="Alumnos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="ingresar_alumno.php">
							<i class="fas fa-user-plus"></i><span>Ingresar Alumnos</span>
						</a>
					</li>
					<li>
						<a href="ver_alumnos.php">
							<i class="fas fa-eye"></i><span>Ver Alumnos</span>
						</a>
					</li>
					<li>
						<a href="modificar_alumnos.php">
							<i class="fas fa-user-edit"></i><span>Modificar Alumnos</span>
						</a>
					</li>
					<li>
						<a href="eliminar_alumnos.php">
							<i class="fas fa-trash-alt"></i><span>Eliminar Alumnos</span>
						</a>
					</li>
				</ul>
			</li><!-- End Alumnos Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#asignar-nav" data-bs-toggle="collapse" href="#">
					<i class="fas fa-address-book"></i><span>ASIGNACIONES</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="asignar-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="asignaciones.php">
						<i class="fas fa-plus-circle"></i><span>Asignar Maestros</span>
						</a>
					</li>
					<li>
						<a href="ver_asignaciones.php">
							<i class="fas fa-eye"></i><span>Ver Asignaciones</span>
						</a>
					</li>
					<li>
						<a href="eliminar_asignacion.php">
							<i class="fas fa-trash-alt"></i><span>Eliminar Asignaciones</span>
						</a>
					</li>
				</ul>
			</li><!-- Fin asignar Nav -->



			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#Materias-nav" data-bs-toggle="collapse" href="#">
					<i class="fas fa-book"></i><span>MATERIAS</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="Materias-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="ingresar_materias.php">
						<i class="fas fa-plus-circle"></i><span>Ingresar Materias</span>
						</a>
					</li>
					<li>
						<a href="ver_materias.php">
						<i class="fas fa-eye"></i><span>Ver Materias</span>
						</a>
					</li>
					<li>
						<a href="modificar_materias.php">
						<i class="fas fa-user-edit"></i><span>Modificar Materias</span>
						</a>
					</li>
					<li>
						<a href="eliminar_materias.php">
						<i class="fas fa-trash-alt"></i><span>Eliminar Materias</span>
						</a>
					</li>
				</ul>
			</li><!-- End Materias Nav -->


			<li class="nav-item">
				<a class="nav-link collapsed" href="periodos.php">
					<i class="bi bi-calendar-event-fill"></i>
					<span>PERIODOS</span>
				</a>
			</li><!-- Fin Periodos Page Nav -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="salir.php">
					<i class="fas fa-sign-out-alt"></i>
					<span>CERRAR SESIÓN</span>
				</a>
			</li><!-- Fin Login Page Nav -->

		</ul>

	</aside><!-- Fin Sidebar-->
	<main id="main" class="main">
		<br><br>
		<?php
		include("conexion.php");
		$id = $_REQUEST['id'];
		$query = "SELECT * FROM maestros WHERE id_maestros='$id'";
		$resultado = $conexion->query($query);
		$row = $resultado->fetch_assoc();
		?>
		<form method="POST" enctype="multipart/form-data">

			<div class="container">
				<div class="row">

					<div class="col-md-8 offset-2" style="border-radius: 5%; 
					padding: 10px; 
					box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.582);">
						<center>
							<h1 style="background-color: black; 
							margin: -10px; 
							border-top-left-radius: 25px; 
							border-top-right-radius: 25px; 
							color: white;
							padding: 5px;">
								<b>MODIFICAR MAESTROS</b>
							</h1>
						</center>
						<div class="row">
							<div class="col-3">
								<br>
								<img class="img-fluid" src="img/editar.png" alt="">
							</div>

							<div class="col-9">
								<br><br>

								<div class="form-group row">
									<label for="nombre" class="col-5"><b>Nombre</b></label>
									<div class="col-7">
										<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
									</div>
								</div><br>
								<div class="form-group row">
									<label for="apellido_p" class="col-5"><b>Apellido Paterno</b></label>
									<div class="col-7">
										<input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>">
									</div>
								</div><br>
								<div class="form-group row">
									<label for="apellido_m" class="col-5"><b>Apellido Materno</b></label>
									<div class="col-7">
										<input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>"><br><br>
									</div>
								</div>

								<div class="form-group text-center">
									<input type="submit" value="Modificar" class="btn btn-success" name="btn1">
								</div><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</main><!-- Fin #main -->

</body>

</html>

<?php
if (isset($_POST['btn1'])) {
	include("conexion.php");

$ID=$_REQUEST['id'];
$NOM=$_POST['nombre'];
$AP=$_POST['apellido_p'];
$AM=$_POST['apellido_m'];
//$IMG=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query= "UPDATE maestros SET  nombre='$NOM', apellido_p='$AP', apellido_m='$AM' WHERE id_maestros='$ID'";
$resultado=$conexion->query($query);
if($resultado){
    echo "<script> swal({
		title: 'CORRECTO',
		text: 'Maestro Actualizado Correctamente',
		type: 'success',
	  }).then(function() {
		window.location = 'modificar_maestros.php';
	});
	  </script>";
}else{
    echo "<script> swal({
		title: 'ERROR',
		text: 'Maestro no Actualizado',
		type: 'error',
	  });</script>";
}

}
?>