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
	    <!-- SweetAlert -->
		<link rel="stylesheet" href="librerias/sweetalert2.css">
    <script src="librerias/sweetalert2.js"></script>
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">


		<h1 style="padding-left: 565px;"><b>ELIMINAR MATERIAS</b></h1>
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
				<a class="nav-link" data-bs-target="#Materias-nav" data-bs-toggle="collapse" href="#">
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

	<main id="main" class="main" style="padding:0 250px 50px 150px;">
			<center><br>	
			<div id="load-products"></div>
			</center>
	</main><!-- Fin #main -->

</body>

</html>



<script>
    $(document).ready(function() {

        readProducts(); /* it will load products when document loads */

        $(document).on('click', '#delete_product', function(e) {

            var id_m = $(this).data('id');
            SwalDelete(id_m);
            e.preventDefault();
        });

    });

    function SwalDelete(id_m) {

        swal({
            title: '¿Estas seguro?',
            text: "Se borrará de forma permanente",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            showLoaderOnConfirm: true,

            preConfirm: function() {
                return new Promise(function(resolve) {

                    $.ajax({
                            url: 'proceso_eliminar_materia.php',
                            type: 'POST',
                            data: 'delete=' + id_m,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal('Eliminado', response.message, response.status);
                            readProducts();
                        })
                        .fail(function() {
                            swal('Oops...', 'No se puede eliminar Materia', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });

    }

    function readProducts() {
        $('#load-products').load('eliminar_mate.php');
    }
</script>

