<!DOCTYPE html>
<?php
$id = $_GET["id"];
include 'conexion.php';

//PARA PONER EL TITULO DE QUE NUMEOR LLAMO
$num=$mysqli->query("select l.num_telefono from linea l where l.id_linea=".$id.";")->fetch_object()->num_telefono;
?>
<html lang="en">
<head>
    <title>Compañia Telefonica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <!--  barra  -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Compañia Telefonica</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <!-- Derecha -->
            <div class="col-sm-2 sidenav">
                <p><a href="ingresar_cliente.php"class="btn btn-success">Ingresar Cliente</a></p>
                <p><a href="ingresar_linea.php" class="btn btn-success">Ingresar Linea</a></p>
                <p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p>
                <p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p>
            </div>
            <!--  Centro -->
        <div class="col-sm-8 text-left">
          <?php echo "<h1>Historial de Llamadas de: ".$num."</h1>"; ?>

            <!-- <p> Cliente ID</p> -->
            <hr>
            <h2> Llamadas realizadas.</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Numero Destino</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //include 'conexion.php';
                        $tabla=$mysqli->query("select l.num_telefono, t.costo
                                               from linea l join (select ll.num_destino nd, ll.costo costo from
                                               llamada ll where ll.num_saliente=".$id.") t
                                               on l.id_linea=t.nd;");
                        //mysqli_close($mysqli);

                        if ($tabla->num_rows > 0) {
                              while($row = $tabla->fetch_assoc()) {
                                echo "<tr>
                                  <td>".$row['num_telefono']."</td>
                                  <td>".$row['costo']."</td>

                                </tr>";
                              }
                              echo"</table>";
                        }
                        else {
                            echo "<p> No hay registro de llamadas realizadas.</p>";
                        }
                    ?>
                </tbody>
            </table>

            <hr>
            <h2> Llamadas realizadas.</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Numero Entrante</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //include 'conexion.php';
                        $tabla=$mysqli->query("select l.num_telefono, t.costo
                                               from linea l join (select ll.num_saliente ns, ll.costo costo from
                                               llamada ll where ll.num_destino=".$id.") t
                                               on l.id_linea=t.ns;");
                        mysqli_close($mysqli);

                        if ($tabla->num_rows > 0) {
                              while($row = $tabla->fetch_assoc()) {
                                echo "<tr>
                                  <td>".$row['num_telefono']."</td>
                                  <td>".$row['costo']."</td>

                                </tr>";
                              }
                              echo"</table>";
                        }
                        else {
                            echo "<p> No hay registro de llamadas realizadas.</p>";
                        }
                    ?>
                </tbody>
            </table>

            <p><a href="LlamadasPDF.php?id=<?php echo $id; ?>" class="btn btn-info">PDF</a></p>
        </div>
    </div>
<footer class="container-fluid text-center">
  <p>Universidad de Sonora</p>
</footer>

</body>
</html>
