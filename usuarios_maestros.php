<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- CSS-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
    <!-- SweetAlert -->
    <link rel="stylesheet" href="librerias/sweetalert2.css">
    <script src="librerias/sweetalert2.js"></script>
    
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
        <h1 style="padding-left: 460px;">LISTA DE USUARIOS PARA MAESTROS</h1>
    </header><!-- Fin Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin.php">
                    <i class="bi bi-house-fill"></i>
                    <span>INICIO</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="evaluaciones_periodo.php">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>EVALUACIONES</span>
                </a>
            </li><!-- Fin Materias Page Nav -->

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
        <div class="row">
            <div class="col6">
            <div id="load-products"></div>
            </div>

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
                            url: 'proceso_eliminar_usuarios.php',
                            type: 'POST',
                            data: 'delete=' + id_m,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal('Eliminado', response.message, response.status);
                            readProducts();
                        })
                        .fail(function() {
                            swal('Oops...', 'No se puede eliminar el Usuario', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });

    }

    function readProducts() {
        $('#load-products').load('u.php');
    }
</script>

