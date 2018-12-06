<!DOCTYPE html>
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
                <p><a href="mostrar_linea.php" class="btn btn-info">Lista de Linea</a></p>
            </div>
            <!--  Centro -->
            <div class="col-sm-8 text-left">
              <form action='agregar_lineaBD.php' method='post'>
								<div class="form-group">
                  <label for="TipoLinea">Tipo de Linea</label>
                  <select class="form-control" name="idC" id="idCliente">
										<?php
										include 'conexion.php';
										$tabla=$mysqli->query("select c.id_cliente, c.NIF from cliente c");
										mysqli_close($mysqli);

										if ($tabla->num_rows == 0) {
												echo '<option value="-1"> No Hay Clientes </option>';
										} else {
												while($row = $tabla->fetch_assoc()) {
														//echo "<option value ='".$row['id_cliente']."'>".$row['NIF']."</option>";
														echo "<option value='".$row['id_cliente']."'>'".$row['NIF']."'</option>";
												}
										}
										?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="IngreseNum">Ingrese Numero de Telefono</label>
                  <input type="text" class="form-control" name="num" id="IngreseNum" placeholder="Ej. 6622123456">
                </div>
								<div class="form-group">
                  <label for="TipoLinea">Tipo de Linea</label>
                  <select class="form-control" name="tipo" id="TipoLinea">
                    <option>Fija</option>
                    <option>Movil</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Universidad de Sonora</p>
    </footer>

</body>
</html>
