<html>
<head>
	<title> Ingresar Cliente</title>
</head>
<header>
Ingresa los datos del Cliente
</header>
<form action='agregar_clienteBD.php' method='post'>
	<table>
		<tr>
			<td>NIF:</td>
			<td> <input type='text' name='nif'></td>
		</tr>
		<tr>
			<td>Apellido:</td>
			<td><input type='text' name='apellido' ></td>
		</tr>
		<tr>
			<td>Nombre:</td>
			<td><input type='text' name='nombre' ></td>
		</tr>
    <tr>
			<td>Direccion:</td>
			<td><input type='text' name='direccion' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>

</html>
