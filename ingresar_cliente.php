<html>
<head>
	<title>Ingresar Cliente - Compañias Telefonicas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Logo</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	        <li><a href="#">About</a></li>
	        <li><a href="#">Projects</a></li>
	        <li><a href="#">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container-fluid text-center">
	    <div class="row content">
			<div class="col-sm-2 sidenav">
				<!-- <p><a href="ingresar_cliente.php"class="btn btn-success">Ingresar Cliente</a></p> -->
				<p><a href="ingresar_linea.php" class="btn btn-success">Ingresar Linea</a></p>
				<p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p>
				<p><a href="mostrar_linea.php" class="btn btn-info">Lista de Linea</a></p>
			</div>
			<div class="col-sm-8 text-left">
				<h2>
				Ingresa los datos del Cliente
				</h2>
				<form action='agregar_clienteBD.php' method='post'>
				<!--  -->
					<div class="form-group">
						<label for="nif">NIF</label>
						<input type="text" class="form-control" name="nif" placeholder="NIF">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="apellido" placeholder="Apellido">
					</div>
					<div class="form-group">
						<label for="nif">Direccion</label>
						<input type="text" class="form-control" name="direccion" placeholder="Direccion">
					</div>

					<button type="submit" class="btn btn-primary">Guardar</button>
				<!--  -->
					<a href="index.php" class="btn btn-primary">Volver</a>
				</form>
			</div>
		</div>
	</div>


</body>
</html>
