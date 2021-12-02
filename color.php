<!DOCTYPE html>
<html lang="en" >
<head>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'><link rel="stylesheet" href="style2.css">
<link rel="icon" type="image/gng" href="img/favicon.ico">
	  <meta charset="UTF-8">
  <title>Form</title>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
 
<?php
session_start();
include_once "php/validation.php";
$col=$_SESSION['col'];
echo '<body style="background: linear-gradient(to right, #fff, '.$col.')">';

?>
<img src="img\logo-FC.png" class="logo" onclick="location.href='php/cerrar.php';" >
<div class="plus-button justify-content-center" role="toolbar" aria-label="Botones" >
    <a type="button" class="disminuir" ><i class="fa fa-minus" aria-hidden="true"></i></a><br> 
    <a type="button" class="aumentar"><i class="fa fa-plus" aria-hidden="true"></i></a><br>
    <a type="button" class="restablecer"><i class="fa fa-pause" aria-hidden="true"></i></a><br>
    <p class="tamaño-actual"></p>
</div>
<div class="container">
  <div id="logo"><h1 class="logo"></h1></div>

  <div class="leftbox">
    <nav>
      <a id="profile"data-tooltip="Perfil" class="active"><i class="fa fa-user"></i></a>
      <a id="privacy"  data-tooltip="Nine Box"onclick="location.href='colord.php'"><i class="fa fa-check-square" aria-hidden="true"></i></a>
     <a id="subscription" onclick="location.href='php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
     
    </nav>
  </div>
  <div class="rightbox">
    <div class="privacy noshow">
      <h1>Avanzando contigo</h1>
    </div>   
    <div class="payment noshow">
      <h1>Estamos Enfocados</h1>
    </div> 
    <div class="profile">
      <h1>Perfil</h1>
      <h2>Nombre</h2>
      <p><?php 
      $nombreunu=$_SESSION ['nombre'];
      echo $nombreunu;

      ?></p>
      <h2>Apellido</h2>
      <?php 
      require_once "php/conexion.php";
      $a=$_SESSION['nombre'];
      settype($a, 'string');
      $consulta= "SELECT * FROM empleados WHERE nombre='$a' or usuario='$a'";
      $resultado= $conexion ->query ($consulta);
      $si = $resultado -> fetch();
      
      echo '<p>'.$si["apellido"].'</p>';
      echo '<h2>Cargo</h2>';
      switch ($si["id_cargo"]){
        case '1':
          echo'<p>INGENIERO DE PROYECTOS</p></div>';
          break;
          
        
        case '2':
          echo'<p>ANALISTA DE NOMINA</p></div>';
          break;
        case'3':
          echo'<p>PROFESIONAL</p></div>';
          break;
        case'4':
         echo'<p>TÉCNICO</p></div>';
          break;
      }
      
      $_SESSION['id']=$si["id"];
      $_SESSION['apellido']=$si["apellido"];
      $_SESSION['cargo']=$si["id_cargo"];
      ?>
    
  </div>

</div>
<div class="container2">
  <?php 
  $id=$_SESSION["id_usuario"]; 

echo '<div class="profile"><h1 class="unu">Tu casco actual</h1></div><br>';
echo '<img src='.$_SESSION['casco'].' class="imgsita">';
  echo '<body style="background: linear-gradient(to right, #fff, '.$_SESSION['col'].')">';

  ?>

  
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="/form/static/script.js"></script>

<script type="text/javascript">
function tamanoLetra() {
  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}

tamanoLetra();

$(".disminuir").on("click", function() {
  if ((size) >= 10) {
    $(".plus-button").css("left","-=2%");
    $(".container").css("width","-=2%");
    $(".container").css("height","-=5%");
    $(".container2").css("width","-=2%");
    $(".container2").css("height","-=5%");
    $("p").css("font-size", "-=2");
    $("h1").css("font-size", "-=2");
    $("h2").css("font-size", "-=2");
    $("a").css("font-size", "-=3");
    $(".imgsita").css("width","-=3%");
    $(".redirigir").css("font-size","-=2")
    $( ".tamaño-actual" ).text(size -=1);
  }
});

// Función para aumentar el tamaño del texto (fuente) 
$(".aumentar").on("click", function() { 
  if ((size + 2) <= 18) {
    $(".plus-button").css("left","+=2%");
    $(".container").css("width","+=2%");
    $(".container").css("height","+=5%");
    $(".container2").css("width","+=2%");
    $(".container2").css("height","+=5%");
    $("p").css("font-size", "+=2");
    $("h1").css("font-size", "+=2");
    $("h2").css("font-size", "+=2");
    $("a").css("font-size", "+=3");
    $(".imgsita").css("width","+=3%");
    $(".redirigir").css("font-size","+=2")
    $( ".tamaño-actual" ).text(size +=1);
  }
}); 

$(".restablecer").on("click", function() {
  $(".plus-button").css("left","55%");
  $(".container").css("width","50%");
  $(".container").css("height","50%");
  $(".container2").css("width","20%");
  $(".container2").css("height","25%");
  $("p").css("font-size", "15px");
  $("h1").css("font-size", "initial");
  $("h2").css("font-size", "9px");
  $("a").css("font-size", "20px");
  $(".redirigir").css("font-size","10px")
  $(".imgsita").css("width","44%");
  size = 12;
  size = parseInt(size, 10);
  $( ".tamaño-actual" ).text(size);
}); 
  </script>

</body>
</html>

