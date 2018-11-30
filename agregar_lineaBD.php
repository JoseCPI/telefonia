<?php
//aqui agrega un nuevo cliente a la bd

$nif = $_POST["nif"];
$tel =$_POST["tel"];
$tipo = $_POST["tipo"];



include 'conexion.php';//abre concexion con mysql

//$mysqli->real_escape_string(cadena) esto es para eliminar de la cadena cualquier carater no admitido por mysql
$nif=$mysqli->real_escape_string($nif);
$tel=$mysqli->real_escape_string($tel);
$tipo=$mysqli->real_escape_string($tipo);


//en la linea siguiente ingresa los datos del nuevo cliente a la tabla curso en la BD
$tabla=$mysqli->query("insert into linea values ('".$tel."','".$nif."','".$tipo."')");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_linea.php');
?>
