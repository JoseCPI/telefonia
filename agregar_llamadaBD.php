<?php

$num_saliente = $_POST["num_saliente"];
$num_destino =$_POST["num_destino"];
$costo = $_POST["costo"];

include 'conexion.php';//abre concexion con mysql
$num_destino=$mysqli->query("select l.id_linea from linea l where l.num_telefono=".$num_destino.";")->fetch_object()->id_linea;

$tabla=$mysqli->query("insert into llamada (num_destino, num_saliente, costo) values (".$num_destino.",".$num_saliente.",".$costo.")");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_linea.php');

?>
