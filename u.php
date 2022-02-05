    <!-- Datatables -->
    <link rel="stylesheet" href="librerias/datatables.min.css">
    <script src="librerias/datatables.min.js"></script>

    <div class="table-responsive" style="padding: 10px 25px 10px 25px;">


        <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
            <thead>
                <tr align="center">
                    <th colspan="3">USUARIOS MAESTROS</th>
                </tr>
                <tr align="center">
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tfoot>
                <th hidden></th>
                <th hidden></th>
                <th hidden></th>
            </tfoot>

            <tbody>

                <?php

                require_once 'dbcon.php';
                $query = "SELECT usuarios.id_usuarios, usuarios.usuario,usuarios.contraseña from usuarios WHERE usuarios.id_cargo=4";
                $stmt = $DBcon->prepare($query);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $c = 0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $c++;
                ?>
                        <tr>
                            <td><?php echo $row['usuario']; ?></td>
                            <td><?php echo $row['contraseña']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" id="delete_product" data-id="<?php echo $id_usuarios; ?>" href="javascript:void(0)"><i class="bi bi-trash"></i> ELIMINAR</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {

                    ?>
                    <tr align="center">
                        <td colspan="3">No hay usuarios en lista</td>
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