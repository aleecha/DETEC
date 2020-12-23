<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> autorizacion login </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilos2.css" />
	</head>
	<body>
        <?php
		include 'navbar2.php';
		?>
	
      
 

	<?php
		$usuario = $_REQUEST[ 'usuario' ];
		$clave = $_REQUEST[ 'clave' ];
		

		//echo count($_REQUEST);

		//conexion MySQL
		include 'conexion.php';

		//validar que el usuario sea unico
		$query3="SELECT nombre,email FROM logine WHERE usuario='$usuario' and clave='$clave'";

		$validarUsuario = mysqli_query($conexion,$query3) or die('error de consulta MySQL');

		$cant = mysqli_num_rows($validarUsuario);
		echo $cant;

		if( $cant == 0){

			include 'usuarionocoincide.php';

		}
		else{
			
            //procesamos la respuesta
            $dataUser = mysqli_fetch_assoc($validarUsuario);
            //echo count($dataUser);

            //dar de alta las sesiones
            session_start();
            $_SESSION['clave']=$clave;
            $_SESSION['nombre']=$dataUser['nombre'];
            $_SESSION['email']=$dataUser['email'];
			$_SESSION['usuario']=$usuario;
			
           // foreach($_SESSION as $data){ echo $data;}
			//echo count($_SESSION);
			
			include 'ingresoalsitio.php';
            
		} 
		


		//subir los datos de usuario


		//acceso a login

		
		?>


		</div>


		<?php
			include 'footer.php';
		?>
    </div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>