<?php
//aqui agrega un nuevo cliente a la bd

$id = $_POST["idC"]; //id del clientes
$num =$_POST["num"]; // numero de Telefono
$tipo = $_POST["tipo"]; // tipo de linea


include 'conexion.php';//abre concexion con mysql

//$mysqli->real_escape_string(cadena) esto es para eliminar de la cadena cualquier carater no admitido por mysql
$tel=$mysqli->real_escape_string($tel);
$tipo=$mysqli->real_escape_string($tipo);


//en la linea siguiente ingresa los datos del nuevo cliente a la tabla curso en la BD
$tabla=$mysqli->query("insert into linea (num_telefono, id_cliente, tipo_linea) values ('".$num."',".$id.",'".$tipo."')");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_linea.php');

?>
