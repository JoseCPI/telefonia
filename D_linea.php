<?php
//aqui agrega un nuevo cliente a la bd

$num = $_GET['id'];


include 'conexion.php';//abre concexion con mysql


$tabla=$mysqli->query("delete from linea where num_telefono='".$num."'");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_linea.php');
?>
