<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje enviado</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<link rel="stylesheet" href="css/estilosfor.css">



</head>
	<body>
	<?php 
include ("navbar2.php");
?>
		<div id="for">
			<div class="mb-5">
				
				
			</div>
			<div class="form">

				
			<div class="contenido">

				<?php
				
				$nombre = $_REQUEST['nombre'];
				$telefono = $_REQUEST['telefono'];
				$email = $_REQUEST[ 'email' ];
				$producto = $_REQUEST[ 'producto' ];
				$ciudad = $_REQUEST[ 'ciudad' ];
				

				if($nombre == "" or $email == "" or $producto == "") {
					echo "No se puede realizar el envio, porque faltan datos";
					header("Location: index.php");
        			sleep(3);
				}
				else{     
						$destino = 'ale9115@gmail.com';
						$asunto = 'Nueva consulta desde la pagina';
						$cuerpoMensaje = "<h2>Consulta enviada</h2> <hr> <p>Nombre: ".$nombre."</p> <p>Email: ".$email."</p> <p>Ciudad: ".$ciudad."</p> <p>Producto: ".$producto."</p>";
						$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
						$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$cabeceras .= "To: <ale9115@gmail.com>". "\r\n". "From: $nombre <$email>"."\r\n";
						
						echo $cuerpoMensaje;
					//Envio de los datos por Mail
					
					$envio = mail($destino, $asunto, $cuerpoMensaje, $cabeceras);

					//Verificacion del envio
					if($envio === true) {
						echo "<h2>Gracias ".$nombre." por contacarnos </h2><p>Le reenviaremos los datos a su email</p>";
					}else{
						echo "<p>hubo un error en el envio, por favor escribinos a <a href='mailto:".$destino."'>".$destino."</a>";
					}
					//Mail de agradecimiento
					$mensajeGracias = 'Hola '.$nombre." gracias por usar el formulario del sitio. <br> le adjuntamos una copia de su mensaje: ".$cuerpoMensaje;
	
					$envio2 = mail($email,'Gracias por escribirnos',$mensajeGracias,$cabeceras);
	

					/*$servidor="localhost"; 
					$usuario='root'; 
					$clave='';
					$basedatos='infodetec';*/

					$servidor="localhost"; 
					$usuario='id15395739_sqlusuario'; 
					$clave='Nuevaclave2020.'; 
					$basedatos='id15395739_php';




					@$conexion = mysqli_connect($servidor,$usuario,$clave,$basedatos) or die("No se pudo establecer una conexión".mysqli_error());



					$query="INSERT INTO detec VALUES(0,'$nombre', '$telefono' ,'$email','$ciudad','$producto')";

					$consulta=mysqli_query($conexion,$query) or die ('Hubo un error en la consulta');

					if($consulta===true){
					/*	echo "<p>usuario cargado</p>";*/
					} else{
						/*echo "<p> error en la carga del usuario </p>";*/
					}

					mysqli_close($conexion);
					header("Location: index.php");
					die();
				}

				?>



<a href="index.php" class=""> <button type="button " class="btn btn-success">VOLVER</button></a>
            
               
            


            </div>

			</div>

		</div>
		<!--<div class="text-center">
				&copy; $fecha = date("y"); Todos los derechos reservados
			</div> !-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>



