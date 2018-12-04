<html>
 <head>
  <title>Llamadas</title>
 </head>
 <body>
 <?php

    $id = $_GET["id"];
    include 'conexion.php';

    //PARA PONER EL TITULO DE QUE NUMEOR LLAMO
    $num=$mysqli->query("select l.num_telefono from linea l where l.id_linea=".$id.";")->fetch_object()->num_telefono;
    //$num = $tabla->fetch_object()->num_telefono;
    echo "<h1> historial de llamadas del numero: ".$num.".</h1>";

    ///////////////////////////////////////////////
    //PARA LLAMADAS REALIZADAS POR EL NUMERO   ////
    ///////////////////////////////////////////////
    //$tabla=$mysqli->query("select num_destino, costo from llamada where num_saliente='".$id."';");
    $tabla=$mysqli->query("select l.num_telefono, t.costo
                           from linea l join (select ll.num_destino nd, ll.costo costo from
                           llamada ll where ll.num_saliente=".$id.") t
                           on l.id_linea=t.nd;");
    //mysqli_close($mysqli);

    //echo "<h1> historial de llamadas del numero: ".$num_salida.".</h1>";

    if ($tabla->num_rows > 0) {
      echo "<h2> Llamadas realizadas.</h2>";
      echo "<table border='1' id='tablaUS' class='table table-striped table-hover table-bordered'>
        <thead>
          <th>Numero Destino</th>
          <th>Costo</th>
        </thead>";

        while($row = $tabla->fetch_assoc()) {
          echo "<tr>
            <td>".$row['num_telefono']."</td>
            <td>".$row['costo']."</td>

          </tr>";
        }
        echo"</table>";
    }
    else {
      echo "<h2> Llamadas realizadas.</h2>";
      echo "<p> No hay registro de llamadas realizadas.</p>";
    }

    ///////////////////////////////////////////
    //AHORA PARA LAS LLAMADAS RECIBIDAS  //////
    ///////////////////////////////////////////
    //$tabla=$mysqli->query("select num_saliente, costo from llamada where num_destino='".$id."';");
    $tabla=$mysqli->query("select l.num_telefono, t.costo
                           from linea l join (select ll.num_saliente ns, ll.costo costo from
                           llamada ll where ll.num_destino=".$id.") t
                           on l.id_linea=t.ns;");
    mysqli_close($mysqli);

    if ($tabla->num_rows > 0) {
      echo "<h2> Llamadas recibidas.</h2>";
      echo "<table border='1' id='tablaUS' class='table table-striped table-hover table-bordered'>
        <thead>
          <th>Numero Saliente</th>
          <th>Costo</th>
        </thead>";

        while($row = $tabla->fetch_assoc()) {
          echo "<tr>
            <td>".$row['num_telefono']."</td>
            <td>".$row['costo']."</td>

          </tr>";
        }
        echo"</table>";
    }
    else {
      echo "<h2> Llamadas realizadas.</h2>";
      echo "<p> No hay registro de llamadas recibidas.</p>";
    }

    echo '<a href="mostrar_linea.php">Volver</a>';
    //<td><a href='D_Linea.php?id=".$row['num_telefono']."' alt='edit'>Eliminar</a></td> esta linea va bajo la linea 27 en caso de querer agragr un boton de eliminar
 ?>
</body>
</html>
