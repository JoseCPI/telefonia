<?php
//aqui agrega un nuevo cliente a la bd

$id = $_GET['id'];


include 'conexion.php';//abre concexion con mysql

$tabla=$mysqli->query("select ll.num_destino, ll.num_saliente from
                      llamada ll join (select li.id_linea id_li from
                      linea li where
                      li.id_cliente = ".$id. ") NTabla
                      on ll.num_destino=NTabla.id_li or num_saliente=NTabla.id_li; ");

if($tabla->num_rows == 0){
  $tabla=$mysqli->query("delete from cliente where id_cliente=".$id."");
  $mysqli->close();
  echo "<script>
        alert('El cliente ha sido eliminado exitosamente');
        window.location.href='index.php';
        </script>";
  //header('Location: mostrar_clientes.php');
}else {
  $mysqli->close();
  echo "<script>
        alert('El cliente no se puede eliminar ya que tiene llamadas registradas');
        window.location.href='index.php';
        </script>";
}
?>
