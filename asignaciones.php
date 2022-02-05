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
				<a class="nav-link collapsed" data-bs-target="#maestros-nav" data-bs-toggle="collapse" href="#">
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
				<a class="nav-link" data-bs-target="#asignar-nav" data-bs-toggle="collapse" href="#">
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
	<main id="main" class="main"><br>
		<form method="post" enctype="multipart/form-data">
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
								<b>ASIGNAR CARGA ACADEMICA</b>
							</h1>
						</center>
						<div class="row">
							<div class="col-4">
								<br><br>
								<img class="img-fluid" src="img/ingresar.png" alt="">
							</div>

							<div class="col-8">
								<br><br>
								<div class="form-group row">
									<label for="maestro" class="col-2"><b>Maestro</b></label>
									<div class="col-10">
										<select name="id_maestro" required style="width: 357px;">
											<option value="">Selecciona Maestro</option>
											<?php
											include "conexion.php";
											$maestro = "SELECT  maestros.id_maestros, maestros.nombre, maestros.apellido_p, maestros.apellido_m FROM maestros WHERE maestros.id_status=1";
											$resul = mysqli_query($conexion, $maestro);

											while ($row = mysqli_fetch_array($resul)) {

												$id_maestro = $row['id_maestros'];
												$nombre = $row['nombre'];
												$apellido_p = $row['apellido_p'];
												$apellido_m = $row['apellido_m'];
											?>
												<option value="<?php echo $id_maestro; ?>"><?php echo $nombre; ?> <?php echo $apellido_p; ?> <?php echo $apellido_m; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div><br>

								<div class="form-group row">
									<label for="semestre" class="col-2"><b>Semestre</b></label>
									<div class="col-10">
										<select name="id_semestre" required style="width: 357px;">
											<option value="">Selecciona Semestre</option>
											<?php
											include "conexion.php";

											$semestre = "SELECT *FROM semestre ORDER BY id_semestre";
											$resul = mysqli_query($conexion, $semestre);

											while ($row = mysqli_fetch_array($resul)) {

												$id_semestre = $row['id_semestre'];
												$semestre = $row['semestre'];
											?>

												<option value="<?php echo $id_semestre; ?>"><?php echo $semestre; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="form-group row">
									<label for="grupo" class="col-2"><b>Grupo</b></label>
									<div class="col-10">
										<select name="id_grupo" required style="width: 357px;">
											<option value="">Selecciona Grupo</option>
											<?php
											include "conexion.php";

											$semestre = "SELECT *FROM grupo ORDER BY id_grupo";
											$resul = mysqli_query($conexion, $semestre);

											while ($row = mysqli_fetch_array($resul)) {

												$id_grupo = $row['id_grupo'];
												$grupo = $row['grupo'];
											?>

												<option value="<?php echo $id_grupo; ?>"><?php echo $grupo; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="form-group row">
									<label for="materia" class="col-2"><b>Materias</b></label>
									<div class="col-10">
										<select name="id_materia" required style="width: 357px;">
											<option value="">Selecciona Materia</option>
											<?php
											include "conexion.php";
											$materia = "SELECT * FROM materias WHERE materias.id_status=1 ORDER BY materias.materia ASC";
											$resul = mysqli_query($conexion, $materia);
											while ($row = mysqli_fetch_array($resul)) {
												$id_materia = $row['id_materia'];
												$materia = $row['materia'];
											?>
												<option value="<?php echo $id_materia; ?>"><?php echo $materia; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="form-group row">
									<label for="periodo" class="col-2"><b>Periodo</b></label>
									<div class="col-10">
										<select name="id_periodo" required style="width: 357px;">
											<option value="">Selecciona Periodo</option>
											<?php
											include "conexion.php";

											$periodo = "SELECT * FROM periodo ORDER BY id_periodo DESC";
											$resul = mysqli_query($conexion, $periodo);

											while ($row = mysqli_fetch_array($resul)) {

												$id_periodo = $row['id_periodo'];
												$periodo = $row['periodo'];
											?>

												<option value="<?php echo $id_periodo; ?>"><?php echo $periodo; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="form-group text-center">
									<input type="submit" value="Asignar" class="btn btn-success" name="btn1">
								</div>
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
	//en proceso
	$MAESTROS = $_POST['id_maestro'];
	$SEM = $_POST['id_semestre'];
	$GPO = $_POST['id_grupo'];
	$MATERIA = $_POST['id_materia'];
	$PERIODO = $_POST['id_periodo'];


	$query = "INSERT INTO asignar (id_maestro,id_semestre,id_grupo,id_materia,id_periodo) VALUES('$MAESTROS','$SEM','$GPO','$MATERIA','$PERIODO')";
	$resultado = $conexion->query($query);


	if ($resultado) {
		echo "<script> swal({
		title: 'CORRECTO',
		text: 'Asignación Guardada Exitosamente',
		type: 'success',
	  });</script>";
	} else {
		echo "<script> swal({
		title: 'ERROR',
		text: 'Asignacion no Guardada',
		type: 'error',
	  });</script>";
	}
}
?>