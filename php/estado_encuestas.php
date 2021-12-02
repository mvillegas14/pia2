<?php

session_start();
include_once"conexion.php";

$encuesta=$_POST['encuesta'];

$consulta= "SELECT * FROM estado_encuestas";
$resultado= $conexion -> query($consulta);
$data= $resultado -> fetch();

if($encuesta=="avanzando"){

	if($data["avanzando"]==0){
		try{
			$cambio= $conexion -> prepare("UPDATE estado_encuestas SET avanzando = 1");
			$cambio -> execute();

			$reactivacion= $conexion -> prepare("UPDATE resultados SET solved = 0");
			$reactivacion -> execute();
		}

		catch(Exception $e){
	  		echo 'Error conectando a la base de datos: '. $e->getMessage();  
	  	}
	}

	else{

		try{
			$cambio= $conexion -> prepare("UPDATE estado_encuestas SET avanzando = 0");
			$cambio -> execute();
		}

		catch(Exception $e){
	  		echo 'Error conectando a la base de datos: '. $e->getMessage();  
	  	}
	}
}
else{

	if($data["estamos"]==0){
		try{
			$cambio= $conexion -> prepare("UPDATE estado_encuestas SET estamos = 1");
			$cambio -> execute();

			$reactivacion= $conexion -> prepare("UPDATE resultados SET solved_enfocados = 0");
			$reactivacion -> execute();
		}

		catch(Exception $e){
	  		echo 'Error conectando a la base de datos: '. $e->getMessage();  
	  	}
	}

	else{

		try{
			$cambio= $conexion -> prepare("UPDATE estado_encuestas SET estamos = 0");
			$cambio -> execute();
		}

		catch(Exception $e){
	  		echo 'Error conectando a la base de datos: '. $e->getMessage();  
	  	}
	}
}
echo'
<script type="text/javascript">
alert("Cambio Realizado Con Exito");
window.location.href="../form/templates/empleados.php";
</script>';
?>