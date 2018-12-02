<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
<?php
    include 'conexion.php';
    $tabla=$mysqli->query("select * from cliente");
    mysqli_close($mysqli);

    if ($tabla->num_rows > 0) {
      echo "<table border='1' id='tablaUS' class='table table-striped table-hover table-bordered'>
        <thead>
          <th>NIF</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Direccion</th>
        </thead>";

        while($row = $tabla->fetch_assoc()) {
          echo "<tr>
            <td>".$row['NIF']."</td>
            <td>".$row['nombre']."</td>
            <td>".$row['apellido']."</td>
            <td>".$row['direccion']."</td>
            <td><a href='I_lineaDeCliente.php?id=".$row['NIF']."' alt='edit'>Agregar Linea</a></td>
            <td><a href='D_cliente.php?id=".$row['NIF']."' alt='edit'>Eliminar</a></td>
          </tr>";
        }
        echo"</table>";
    }

    echo '<a href="index.php">Volver</a>';


 ?>
</body>
</html>
