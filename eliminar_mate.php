    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>
    <div class="table-responsive">


        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
            <thead>
                <tr align="center">
                    <th>No.</th>
                    <th>Materia</th>
                    <th>Operacion</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th hidden></th>
                    <th hidden></th>
                    <th hidden></th>
                </tr>
            </tfoot>

            <tbody>

                <?php

                require_once 'dbcon.php';
                $query = "SELECT * FROM materias WHERE materias.id_status=1 ORDER BY materia ASC";
                $stmt = $DBcon->prepare($query);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $c = 0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $c++;
                ?>
                        <tr>
                            <td><?php echo $c ?></td>
                            <td><?php echo $row['materia']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $id_materia; ?>" href="javascript:void(0)"><i class="bi bi-trash"></i> ELIMINAR</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="2">Aun no hay Materias</td>
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