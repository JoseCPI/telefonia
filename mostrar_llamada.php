<html>
 <head>
  <title>Llamadas</title>
 </head>
 <body>
 <?php

    $num_salida = $_GET["id"];
    include 'conexion.php';



    $tabla=$mysqli->query("select num_destino, costo from llamada where num_saliente='".$num_salida."';");
    mysqli_close($mysqli);

    if ($tabla->num_rows > 0) {
      echo "<h1> Llamadas salientes de: ".$num_salida.".</h1>";
      echo "<table border='1' id='tablaUS' class='table table-striped table-hover table-bordered'>
        <thead>
          <th>Numero Destino</th>
          <th>Costo</th>
        </thead>";

        while($row = $tabla->fetch_assoc()) {
          echo "<tr>
            <td>".$row['num_destino']."</td>
            <td>".$row['costo']."</td>

          </tr>";
        }
        echo"</table>";
    }

    echo '<a href="mostrar_linea.php">Volver</a>';
    //<td><a href='D_Linea.php?id=".$row['num_telefono']."' alt='edit'>Eliminar</a></td> esta linea va bajo la linea 27 en caso de querer agragr un boton de eliminar
 ?>
</body>
</html>
