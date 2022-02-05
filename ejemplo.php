
                <link rel="stylesheet" href="librerias/datatables.min.css">
                <script src="librerias/datatables.min.js"></script>
                <center>
                    <div class="table-responsive" id="mydatatable-container" style="padding: 0px 200px">
                        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                            <thead>

                                <tr>
                                    <th>Semestre</th>
                                    <th>Grupo</th>
                                    <th>Pregunta</th>
                                    <th hidden>Alumnos Evaluados</th>
                                    <th>Promedio</th>
                                </tr>

                            <tfoot>
                                <tr>
                                    <th>Filtrar..</th>
                                    <th>Filtrar..</th>
                                    <th>Filtrar..</th>
                                    <th>Filtrar..</th>
                                </tr>
                            </tfoot>
                            </thead>
                            <tbody>
                                <?php
                                include("conexion.php");

                                $query = "SELECT preguntas.pregunta, semestre.semestre, grupo.grupo, Round(AVG(evaluaciones.calificacion),1 )AS Promedio, Round(COUNT(evaluaciones.no_control)/10) AS
                        Contador, materias.materia
                        FROM evaluaciones
                        INNER JOIN asignar ON asignar.id_asignar=evaluaciones.id_asignar
                        INNER JOIN materias on materias.id_materia=asignar.id_materia
                        INNER JOIN maestros ON maestros.id_maestros=asignar.id_maestro
                        INNER JOIN semestre ON semestre.id_semestre=asignar.id_semestre
                        INNER JOIN grupo ON grupo.id_grupo=asignar.id_grupo
                        INNER JOIN preguntas ON preguntas.id_pregunta=evaluaciones.id_pregunta
                        WHERE asignar.id_periodo=1 AND maestros.id_maestros=22
                        GROUP BY asignar.id_semestre, asignar.id_grupo, preguntas.id_pregunta";
                                $resultado = $conexion->query($query);
                                while ($row = $resultado->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td style="width: auto;"><?php echo $row['semestre']; ?></td>
                                        <td style="width: auto;"><?php echo $row['grupo']; ?></td>
                                        <td><?php echo $row['pregunta']; ?></td>
                                        <td hidden><?php echo $row['Contador']; ?></td>
                                        <td><?php echo $row['Promedio']; ?></td>
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
                                    [0, "desc"]
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
                    </div>
                </center>