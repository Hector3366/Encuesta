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
</head>

<body style="background-color: #af25;">
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

	</header><!-- Fin Header -->
	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link " href="admin.php">
					<i class="bi bi-house-fill"></i>
					<span>INICIO</span>
				</a>
			</li><!-- End Dashboard Nav -->


			<li class="nav-item">
				<a class="nav-link collapsed" href="evaluaciones_periodo.php">
				<i class="bi bi-file-earmark-text-fill"></i>
					<span>EVALUACIONES</span>
				</a>
			</li><!-- Fin Evaluaciones Page Nav -->

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
		<div class="container d-flex align-items-center flex-column">
			<h1><b>BIENVENIDO</b></h1>
			<img style="width: 250px; height: 250px; align-items: center;" src="img/avataaars.svg" />
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="bi bi-app"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<div class="texto" style="text-align: justify;">
				<h3><b>1.- Haz Clic En Evaluaciones Para Ver Los Resultados De Las Consultas</b></h3>
				<h3><b>2.- Haz Clic En Usuarios Para Ver Los Usuarios Y Contraseñas De Los Maestros</b></h3>
			</div>

		</div>
	</main><!-- Fin #main -->

</body>

</html>