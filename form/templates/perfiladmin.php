<?php 
session_start();
include_once "../../php/validation.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'><link rel="stylesheet" href="../static/style.css" >
<link rel="icon" type="image/gng" href="../../img/favicon.ico">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<img src="../../img\logo-FC.png" class="logo" onclick="location.href='../../php/cerrar.php';" >
  <div class="plus-button justify-content-center" role="toolbar" aria-label="Botones" >
    <a type="button" class="disminuir" ><i class="fa fa-minus" aria-hidden="true"></i></a><br> 
    <a type="button" class="aumentar"><i class="fa fa-plus" aria-hidden="true"></i></a><br>
    <a type="button" class="restablecer"><i class="fa fa-pause" aria-hidden="true"></i></a><br>
    <p class="tamaño-actual"></p>
</div>
<!-- partial:index.partial.html -->
<div class="container">
  <div id="logo"><h1 class="logo"></h1></div>
  <div class="leftbox">
    <nav>
      <a id="profile" data-tooltip="Perfil"class="active"><i class="fa fa-user"></i></a>
      <a id="profile"  data-tooltip="Trabajos"onclick="location.href='trabajos_index.php'"  ><i class="fa fa-tasks"  ></i></a><br>

      <a id="privacy" data-tooltip="Empleados"onclick="location.href='empleados.php'"><i class="fa fa-address-book"></i></a>
     <a id="subscription" onclick="location.href='../../php/cerrar.php';" data-tooltip="Cerrar sesion" class="iconoss"><i class="fa fa-window-close"></i></a>
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
      <h1>Perfil Administrador</h1>
       <?php
      require_once "../../php/conexion.php";
      $a=$_SESSION['nombre'];
      settype($a, 'string');
      $consulta= "SELECT * FROM empleados WHERE nombre='$a' or usuario='$a'";
      $resultado= $conexion ->query ($consulta);
      $si = $resultado -> fetch();
      echo '  <h2>Nombre</h2><p>'.$si["nombre"].'</p>';
      echo '<h2>Apellido</h2><p>'.$si["apellido"].'</p>';
      echo '<h2>Cargo</h2>';
      $b=$si["id_cargo"];
      $_SESSION['id_cargo']= $b;
      $consulta_2 = "SELECT * from cargos WHERE id_cargo='$b'";
      $resultado1 = $conexion -> query ($consulta_2);
      $cont = $resultado1 -> fetch();
      echo'<p>Admin B)</p>';
        echo '
    <h2>Usuario</h2><p >'.$si["usuario"].'</p>';
      echo'<h2>Contraseña </h2>';
      $stri =$si["password"];
      $contra= strlen($stri); 
      $pass="";
    
    for ($i=0; $i < $contra; $i++) { 
      $pass .= "•";
    }
      echo'<p>'.$pass.'</p>';
      $_SESSION['id_usuario']=$si["id"];
      $_SESSION['apellido']=$si["apellido"];
      $_SESSION['id_cargo']=$si["id_cargo"];
      ?>
    </div>
  </div>
</div>
<div class="container3">
  <img src="../../img/cascos.png" class="cascosgod">
  
  
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="{{ url_for('static',filename='script.js')}}"></script>
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
    $(".container3").css("width","-=2%");
    $(".container3").css("height","-=5%");
    $("p").css("font-size", "-=2");
    $("h1").css("font-size", "-=2");
    $("h2").css("font-size", "-=2");
    $("a").css("font-size", "-=3");
    $(".cascosgod").css("width","-=25");
    $(".cascosgod").css("left","-=0.5%");
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
    $(".container3").css("width","+=2%");
    $(".container3").css("height","+=5%");
    $("p").css("font-size", "+=2");
    $("h1").css("font-size", "+=2");
    $("h2").css("font-size", "+=2");
    $("a").css("font-size", "+=3");
    $(".cascosgod").css("width","+=25");
    $(".cascosgod").css("left","+=0.5%");
    $(".imgsita").css("width","+=3%");
    $(".redirigir").css("font-size","+=2")
    $( ".tamaño-actual" ).text(size +=1);
  }
}); 

$(".restablecer").on("click", function() {
  $(".plus-button").css("left","55%");
  $(".container").css("width","50%");
  $(".container").css("height","50%");
  $(".container3").css("width","20%");
  $(".container3").css("height","50%");
  $(".cascosgod").css("width","275px");
  $(".cascosgod").css("left","12.5%");
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
