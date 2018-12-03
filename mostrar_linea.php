<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
 <?php
    include 'conexion.php';



    $tabla=$mysqli->query("select c.apellido ,c.nombre, l.num_telefono, l.tipo_linea
                            from cliente c join linea l
                            on c.id_cliente=l.id_cliente;");
    mysqli_close($mysqli);

    if ($tabla->num_rows > 0) {
      echo "<table border='1' id='tablaUS' class='table table-striped table-hover table-bordered'>
        <thead>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Tipo De Linea</th>
        </thead>";

        while($row = $tabla->fetch_assoc()) {
          echo "<tr>
            <td>".$row['apellido']."</td>
            <td>".$row['nombre']."</td>
            <td>".$row['num_telefono']."</td>
            <td>".$row['tipo_linea']."</td>
            <td><a href='Ingresar_llamada.php?id=".$row['num_telefono']."' alt='edit'>Agregar Llamada</a></td>
            <td><a href='mostrar_llamada.php?id=".$row['num_telefono']."' alt='edit'>Ver Llamadas</a></td>
            <td><a href='D_Linea.php?id=".$row['num_telefono']."' alt='edit'>Eliminar</a></td>
          </tr>";
        }
        echo"</table>";
    }

    echo '<a href="index.php">Volver</a>';

 ?>
</body>
</html>
