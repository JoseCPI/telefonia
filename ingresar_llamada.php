<?php
  $num_salida = $_GET['id'];
 ?>
<html>
<head>
	<title> Ingresar Llamada</title>
</head>
<header>
Ingresa los datos del llamada
</header>
<form action='agregar_llamadaBD.php' method='post'>
	<table>
		<tr>
      <input type="hidden" name="num_salida" value="<?php echo $num_salida ?>"
			<td>Telefono Destino:</td>
			<td><input type='text' name='tel_destino' ></td>
		</tr>
		<tr>
			<td>Costo:</td>
			<td><input type='text' name='costo' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>

</html>
