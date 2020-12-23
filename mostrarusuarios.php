<!doctype html>
<html lang="en">
  <head>
    <title> Tabla de Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="css/estilos2.css" class="">
  
  </head>
  <body>

    <?php
      include 'navbar2.php';
      ?>


    <main class='container'>

     
     <h1>Mostrar Usuarios</h1>
    <?php

 session_start();

if(isset($_SESSION['usuario'])){
  
  ?>

  <div class="container ">
      
      <div class="border-bottom text-right my-3">
        <span class="" href="#" title='<?php echo $_SESSION['nombre'].' ('.$_SESSION['email'].')' ?>'>
          <?php
        
          echo "Hola, ".$_SESSION['usuario'];       
          ?>
          
        </span>
        <span class="">
          <a href="salir.php">(salir)</a>
        </span>
      </div>
      
  </div>


      <?php

      //conexion MySQL
      include "conexion.php";
  
      //Consulta SELECT
      $query1="SELECT nombre, email, usuario FROM logine";
      $consulta=mysqli_query($conexion,$query1);
  
      //Evaluar la cantidad de resultados
      $cantidad = mysqli_num_rows($consulta);    
      if($cantidad==0){
        echo "No hay resultados.";
      }else{
        
        echo "Cantidad de resultados: ".$cantidad;
        
        echo "<section class='row'>";
        
        for ($i=0; $i < $cantidad ; $i++) { 
          
          $datos = mysqli_fetch_array($consulta);
          
          echo "<article class='col'>";
          echo '<div class="card">
            <div class="card-body">
              <h4 class="h5 card-title">'.$datos[0].' '.$datos[1].'</h4>
              <p class="card-text">'.$datos[2].'</p>
            </div>
          </div></article>';
        }
        echo "</section>";
      }
  
  
      //cerrar la conexion
      mysqli_close($conexion);
    }else{
      
    include 'usuarionocoincide.php';
    }


    ?>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>