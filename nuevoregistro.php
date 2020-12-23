<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Nuevo registro </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilos2.css" />
	</head>
	<body>
        <?php
			include 'navbar2.php';
		?>

		<div class="container my-5 ">

		<?php
		
		//armar el array de datos -> $_REQUEST
		$nombre=$_REQUEST['nombre'];
		$email=$_REQUEST['email'];
		$usuario=$_REQUEST['usuario'];
		$clave=$_REQUEST['clave'];

	

		//conexion MySQL
		include 'conexion.php';

		//validar que el usuario sea unico
		$query1="SELECT usuario FROM logine WHERE usuario ='$usuario'";

		$validarUsuario = mysqli_query($conexion,$query1) or die('error de consulta MySQL');

		$cant = mysqli_num_rows($validarUsuario);
		//echo $cant;

		if( $cant != 0){

		
			include 'usuariousado.php';
			//redireccionar

		}else
		{
			
			$query2 = "INSERT INTO logine VALUES (0,'$nombre','$email','$usuario','$clave')";
			
			$altausuario = mysqli_query($conexion,$query2);
			
			include 'accedealformulario.php';
		}


		//subir los datos de usuario


		//acceso a login

		
		?>


		</div>


		<?php
			include 'footer.php';
		?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>