<!DOCTYPE html>
<?php require 'class/ConexionClass.php'; ?>
<?php require 'class/CheckoutClass.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista-Clientes</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/dataTables.bootstrap5.css" />
</head>

<body style="Background:#000000;">
    <br>
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead class="table-success">
                <tr>
                    <th>Nombres</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Nu. Celular</th>
                    <th>Cantidad</th>
                    <th>Total $</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $Datos_client = Checkout::Bar("List", "");
                foreach ($Datos_client as $Listar_client): ?>
                    <tr>
                        <td><?php echo $Listar_client['nombres']; ?></td>
                        <td><?php echo $Listar_client['correo']; ?></td>
                        <td><?php echo $Listar_client['direccion']; ?></td>
                        <td><?php echo $Listar_client['numero_cel']; ?></td>
                        <td><?php echo $Listar_client['cant']; ?></td>
                        <td><?php echo $Listar_client['total']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" href="search.php?search=<?php echo $Listar_client['numero_cel']; ?>" class="btn btn-danger"><img src="img/billete.png" width="25px" alt=""></a>
                                <a target="_blank" type="button" class="btn btn-dark"><img src="img/editar.png" width="23px" alt=""></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <th>Nombres</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Nu. Celular</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

                    <center><a href="index.php" class="btn btn-danger btn-lg" Style="margin-top:35px;" ><-- Pagina Principal</a></center>
                    
              
    </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/dataTables.js"></script>
<script src="js/dataTables.bootstrap5.js"></script>
<script src="js/index.js"></script>
<script>
    $('#example').DataTable({
        language: {
            processing: "Traitement en curso...",
            search: "<h5>Buscar Registro&nbsp;:</h5>",
            lengthMenu: "<h5>Ver _MENU_ Elementos</h5>",
            info: "<h5 style='color:white;'>Paginación _START_ De _END_ Total _TOTAL_ Páginas</h5>",
            infoEmpty: "Visualización del elemento 0 a 0 de 0 artículos",
            infoFiltered: "(filtrado de _MAX_ artículos totales)",
            infoPostFix: "",
            loadingRecords: "Carga en curso...",
            zeroRecords: "<h5>Ningún elemento Para Mostrar</h5>",
            emptyTable: "No hay datos disponibles en la tabla",
            paginate: {
                previous: "Anterior",
                next: "Siguiente",
            },
            aria: {
                sortAscending: ": permitir ordenar la columna en orden ascendente",
                sortDescending: ": permitir ordenar las columnas en orden descendente"
            }
        }
    });
</script>

</html>