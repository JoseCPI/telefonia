<?php
//aqui agrega un nuevo cliente a la bd

$num_saliente = $_POST["num_salida"];
$num_destino =$_POST["tel_destino"];
$costo = $_POST["costo"];



include 'conexion.php';//abre concexion con mysql

//en la linea siguiente ingresa los datos del nuevo cliente a la tabla curso en la BD
$tabla=$mysqli->query("insert into llamada (num_destino, num_saliente, costo) values ('".$num_destino."','".$num_saliente."',".$costo.")");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_linea.php');
?>
