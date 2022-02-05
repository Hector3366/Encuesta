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
	<!-- Datatables -->
	<link rel="stylesheet" href="librerias/datatables.min.css">
	<script src="librerias/datatables.min.js"></script>
    <!-- Botones -->
    <script src="librerias/dataTables.buttons.min.js"></script>
    <script src="librerias/jszip.min.js"></script>
    <script src="librerias/pdfmake.min.js"></script>
    <script src="librerias/vfs_fonts.js"></script>
    <script src="librerias/buttons.html5.min.js"></script>
    <script src="librerias/buttons.print.min.js"></script>	
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">
		<h1 style="padding-left: 650px;"><b>VER MATERIAS</b></h1>
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

	<main id="main" class="main">
			<div class="table-responsive" id="mydatatable-container" style="padding: 0 100px 50px 150px;">

				<table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
					<thead>
						<tr align="center">
							<th>No.</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th hidden></th>
							<th hidden></th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						include("conexion.php");

						$query = "SELECT * FROM materias ORDER BY materia ASC";
						$resultado = $conexion->query($query);
						$c=0;
						while ($row = $resultado->fetch_assoc()) {
							$c++;
						?>
							<tr>
								<td align="center"><?php echo $c?></td>
								<td><?php echo $row['materia']; ?></td>
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
						$(this).html('<input type="text" placeholder="Filtrar.." />');
					});

					var table = $('#mydatatable').DataTable({
						"dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
						"responsive": false,
						"language": {
							"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
						},
						"buttons": [
                        {
                            extend: 'excel',
                            text:'<i class="bi bi-file-earmark-excel"></i>',
                            tittleAttr: 'Exportar a Excel',
                            className:'btn btn-success'
                        },
                        {
                            extend: 'print',
                            text:'<i class="bi bi-printer"></i>',
                            tittleAttr: 'IMPRIMIR',
                            className:'btn btn-info',
                        }
                    ],
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
	</main><!-- Fin #main -->

</body>

</html>