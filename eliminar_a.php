    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
<div class="table-responsive" >


	<table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
		<thead>
			<tr align="center">
				<th>No. Control</th>
				<th>Nombre(s)</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Semestre</th>
				<th>Grupo</th>
				<th>Operación</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</tfoot>

		<tbody>

			<?php

			require_once 'dbcon.php';
			$query = "SELECT alumnos.no_control, alumnos.nombre, alumnos.apellido_p, alumnos.apellido_m, semestre.semestre, grupo.grupo
			FROM alumnos 
			INNER JOIN semestre ON semestre.id_semestre=alumnos.id_semestre 
			INNER JOIN grupo ON grupo.id_grupo=grupo.id_grupo 
			WHERE semestre.id_semestre=alumnos.id_semestre AND grupo.id_grupo=alumnos.id_grupo AND alumnos.id_status=1
			ORDER BY semestre.id_semestre ASC, grupo.id_grupo";
			$stmt = $DBcon->prepare($query);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
			?>
					<tr align="center">
						<td><?php echo $row['no_control']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['apellido_p']; ?></td>
						<td><?php echo $row['apellido_m']; ?></td>
						<td><?php echo $row['semestre']; ?></td>
						<td><?php echo $row['grupo']; ?></td>
						<td>
							<a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $no_control; ?>" href="javascript:void(0)"><i class="bi bi-trash"></i> ELIMINAR</a>
						</td>
					</tr>
				<?php
				}
			} else {

				?>
				<tr>
					<td colspan="8">No hay Alumnos Registrados</td>
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
			$(this).html('<input type="text" placeholder="Filtrar" />');
		});

		var table = $('#mydatatable').DataTable({
			"dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
			"responsive": false,
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
			},
			"order": [
				[4, "asc"]
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