<?php
//aqui agrega un nuevo cliente a la bd

$id = $_POST["idC"];
$direccion=$_POST["direccion"];


include 'conexion.php';//abre concexion con mysql

//$mysqli->real_escape_string(cadena) esto es para eliminar de la cadena cualquier carater no admitido por mysql
$direccion=$mysqli->real_escape_string($direccion);

//en la linea siguiente ingresa los datos del nuevo cliente a la tabla curso en la BD
$tabla = $mysqli->query("update cliente set direccion='".$direccion."' where id_cliente=".$id.";");

$mysqli->close();//cierra la conexion de mysql
header('Location: index.php');
?>
