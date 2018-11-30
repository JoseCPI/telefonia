<?php
  $nif = $_GET['id'];
 ?>
<html>
<head>
	<title> Ingresar Linea</title>
</head>
<header>
Ingresa los datos del Linea
</header>
<form action='agregar_lineaBD.php' method='post'>
	<table>
		<tr>
      <input type="hidden" name="nif" value="<?php echo $nif ?>"
			<td>Telefono:</td>
			<td><input type='text' name='tel' ></td>
		</tr>
		<tr>
			<td>Tipo Linea:</td>
			<td><input type='text' name='tipo' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>

</html>
