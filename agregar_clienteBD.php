<?php
//aqui agrega un nuevo cliente a la bd

$nif = $_POST["nif"];
$apellido = ucwords($_POST["apellido"]);
$nombre = $_POST["nombre"];
$direccion=$_POST["direccion"];


include 'conexion.php';//abre concexion con mysql

//$mysqli->real_escape_string(cadena) esto es para eliminar de la cadena cualquier carater no admitido por mysql
$id=$mysqli->real_escape_string($nif);
$apellido=$mysqli->real_escape_string($apellido);
$nombre=$mysqli->real_escape_string($nombre);
$direccion=$mysqli->real_escape_string($direccion);

//en la linea siguiente ingresa los datos del nuevo cliente a la tabla curso en la BD
$tabla=$mysqli->query("insert into cliente values ('".$nif."','".$apellido."','".$nombre."','".$direccion."')");

$mysqli->close();//cierra la conexion de mysql
header('Location: index.php');
?>
