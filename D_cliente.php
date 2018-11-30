<?php
//aqui agrega un nuevo cliente a la bd

$nif = $_GET['id'];


include 'conexion.php';//abre concexion con mysql


$tabla=$mysqli->query("delete from cliente where nif='".$nif."'");

$mysqli->close();//cierra la conexion de mysql
header('Location: mostrar_clientes.php');
?>
