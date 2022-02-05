    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>

    <div class="table-responsive" style="padding: 10px 25px 10px 25px;">


        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
            <thead>
                <tr align="center">
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Imagen</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tfoot>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
            </tfoot>

            <tbody>

                <?php

                require_once 'dbcon.php';
                $query = "SELECT * FROM maestros WHERE maestros.id_status=1";
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
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['apellido_p']; ?></td>
                            <td><?php echo $row['apellido_m']; ?></td>
                            <td align="center"><img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /></td>
                            <td>
                                <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $id_maestros; ?>" href="javascript:void(0)"><i class="bi bi-trash"></i> ELIMINAR</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {

                    ?>
                    <tr>
                        <td colspan="3">No hay Maestros en lista</td>
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