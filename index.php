<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de  Votación</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<?php
      require_once("bd/connection.php");
	error_reporting(E_ALL ^ E_NOTICE);

	 session_start();

 if (isset($_POST["alumno"])) {
    $alumno=$_POST["alumno"];
}




if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {
		case "Ingresar":
		if (empty($alumno) ) {
			$vacio="si";
			break;
		}


	    $sql="SELECT * FROM alumnos WHERE cedula_alumno = '$alumno' AND voto = '0'";
	    $resultado=mysqli_query ($cx,$sql);
	    $datos=mysqli_fetch_array($resultado);
	    $alu=$datos["cedula_alumno"];
                $nombre=$datos["nombre"];
	  $voto=$datos["voto"];


		if ($alumno==$alu) {
			$_SESSION["nombre"]=$datos["nombre"];
            $_SESSION["carrera"]=$datos["carrera"];
            $_SESSION["cedula_alumno"]=$datos["cedula_alumno"];
            	$_SESSION["permiso"]="Acceso Permitido";

		?>
			<script>

			window.location="menu2.php";
			</script>

		<?php
			//header("location: principal.php");
		}else {
		   $acceso="denegado";
		}
		break;

	}
}



?>

<?php
      require_once("bd/connection.php");
	error_reporting(E_ALL ^ E_NOTICE);

	 session_start();

 if (isset($_POST["alumno"])) {
    $alumno=$_POST["alumno"];
}




if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {
		case "Ingresar":
		if (empty($alumno) ) {
			$vacio="si";
			break;
		}


	    $sql="SELECT * FROM profesores WHERE cedula_alumno = '$alumno' AND voto = '0'";
	    $resultado=mysqli_query ($cx,$sql);
	    $datos=mysqli_fetch_array($resultado);
	    $alu=$datos["cedula_alumno"];
                $nombre=$datos["nombre"];
	  $voto=$datos["voto"];


		if ($alumno==$alu) {
			$_SESSION["nombre"]=$datos["nombre"];
            $_SESSION["carrera"]=$datos["carrera"];
            $_SESSION["cedula_alumno"]=$datos["cedula_alumno"];
            	$_SESSION["permiso"]="Acceso Permitido";

		?>
			<script>

			window.location="menu2.php";
			</script>

		<?php
			//header("location: principal.php");
		}else {
		   $acceso="denegado";
		}
		break;

	}
}



?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Sistema de Votación</h1>
    </div>
  </div>
  <hr>

<div class="container">
  <h4>Oprima el recuadro con la flecha para abrir las opciones</h4>
<?php
  $var='<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1IjYDAy_pm4jy9Il15tQteRwpVxLRqyXc" width="1150" height="680"></iframe>';

  echo $var;
?>
 <div class="center-block col-md-4 col-xs-8">
<form action="index.php" role="form" method="post">
  <div class="form-group">
    <label for="alumno">Ingrese numero de control para poder valorar el mapa (solo los alumnos y docentes del ITO podran votar)</label>
    <input type="text" name="alumno" class="form-control" id="alumno"
           placeholder="alumno">
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>

 <div align="center">
			<?php

			if ($acceso=="denegado") {
			  echo "<h1>Ya  usted  Voto...</h1>";
			}


			?>

	   </div>
</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
