<?php
//aqui agrega un nuevo cliente a la bd

$id = $_GET['id'];


include 'conexion.php';//abre concexion con mysql

$tabla=$mysqli->query("select distinct ll.num_destino, ll.num_saliente from
                      llamada ll join linea l
                      on ll.num_destino=".$id." or num_saliente=".$id."; ");

if($tabla->num_rows == 0){
    $tabla=$mysqli->query("delete from linea where id_linea=".$id."");
    $mysqli->close();
    echo "<script>
          alert('La linea ha sido eliminado exitosamente');
          window.location.href='mostrar_linea.php';
          </script>";

}else {
    $mysqli->close();
    echo "<script>
          alert('La linea no puede ser eliminar ya que tiene llamadas registradas');
          window.location.href='mostrar_linea.php';
          </script>";
}


//$tabla=$mysqli->query("delete from linea where num_telefono='".$num."'");
?>
