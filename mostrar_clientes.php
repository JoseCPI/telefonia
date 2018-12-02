<html>
 <head>
  <title>Clientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
 <body>
    <div class="conteiner">
<?php
    include 'conexion.php';
    $tabla=$mysqli->query("select * from cliente");
    mysqli_close($mysqli);

    if ($tabla->num_rows > 0) {
      echo '<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
      </th>
      <th class="th-sm">Position
      </th>
      <th class="th-sm">Office
      </th>
      <th class="th-sm">Age
      </th>
    </tr>
  </thead>';

        while($row = $tabla->fetch_assoc()) {
          echo "
            <tbody><tr>
            <td>".$row['NIF']."</td>
            <td>".$row['nombre']."</td>
            <td>".$row['apellido']."</td>
            <td>".$row['direccion']."</td>
            <td><a href='I_lineaDeCliente.php?id=".$row['NIF']."' alt='edit'>Agregar Linea</a></td>

            <td><a href='D_cliente.php?id=".$row['NIF']."' alt='edit'>Eliminar</a></td>

            </tbody></tr>";
        }
        echo"</table></div>";
    }

    echo '<a href="index.php">Volver</a>';


 ?>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
