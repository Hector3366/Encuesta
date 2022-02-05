    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
<div class="table-responsive" >


    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <thead>
			<tr align="center">
				<th>Docente</th>
				<th>Materia</th>
				<th>Semestre</th>
				<th>Grupo</th>
				<th>Periodo</th>
				<th>Operación</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th hidden></th>
				<th hidden></th>
				<th hidden></th>
				<th hidden></th>
				<th hidden></th>
				<th hidden></th>
			</tr>
		</tfoot>

		<tbody>

			<?php

			require_once 'dbcon.php';
			$query = "SELECT asignar.id_asignar, maestros.nombre, maestros.apellido_p, maestros.apellido_m, semestre.semestre, grupo.grupo, materias.materia, periodo.periodo 
			FROM asignar 
			INNER JOIN maestros ON asignar.id_maestro=maestros.id_maestros 
			INNER JOIN semestre ON asignar.id_semestre=semestre.id_semestre 
			INNER JOIN grupo ON asignar.id_grupo=grupo.id_grupo 
			INNER JOIN materias ON asignar.id_materia=materias.id_materia 
			INNER JOIN periodo ON asignar.id_periodo=periodo.id_periodo 
			WHERE semestre.id_semestre=asignar.id_semestre AND grupo.id_grupo=asignar.id_grupo 
			ORDER BY semestre.id_semestre ASC, grupo.id_grupo";
			$stmt = $DBcon->prepare($query);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
			?>
					<tr>
						<td style="width: 280px;"><?php echo $row['nombre']; ?> <?php echo $row['apellido_p']; ?> <?php echo $row['apellido_m']; ?></td>
						<td style="width: 260px;"><?php echo $row['materia']; ?></td>
						<td align="center"><?php echo $row['semestre']; ?></td>
						<td align="center"><?php echo $row['grupo']; ?></td>
						<td align="center" style="width: 175px;"><?php echo $row['periodo']; ?></td>
						<td>
							<a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $id_asignar; ?>" href="javascript:void(0)"><i class="bi bi-trash"></i> ELIMINAR</a>
						</td>
					</tr>
				<?php
				}
			} else {

				?>
				<tr>
					<td colspan="6">Aun no hay Asignaciones</td>
				</tr>
			<?php

			}
			?>

		</tbody>
	</table>

</div>
<style>
        #mydatatable tfoot input {
            width: 50% !important;
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
                "order": [
                    [2, "asc"]
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