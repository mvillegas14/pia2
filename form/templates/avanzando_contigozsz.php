<?php
session_start();
include_once "../../php/validation.php";
include_once "../../php/conexion.php";

$_SESSION['if']=1; 
$_SESSION['form'] =="avan";

$a= $_SESSION['fondo'];
$id=$_SESSION['id_usuario'];

$consulta="SELECT * FROM resultados WHERE id_trabajador = '$id'";
$resultado=$conexion ->query($consulta);
$data=$resultado -> fetch();

echo'
    <body style="background: linear-gradient(to right, #fff, '.$a.')">
    ';


if($data['solved']==1){
  header("location:avanzando1.php");
}
switch ($data['solved_enfocados']){
        case '0':
          header("location:primeroenfocados.php");
          break;
        case '1':
          header("location:avanzando.php");
          break;
        
      }
?>
