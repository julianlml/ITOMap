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

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
     </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
    <div class="menu1 col-md-8 col-md-offset-2">
      <ul class="nav navbar-nav">
        <li class="active">
        <li><a href="cargar_profesor.php">Cargar  Profesores</a></li>
        <li><a href="cargar_alumnos.php">Cargar  Alumnos</a></li>
      <li><a href="cargar_candidato.php">Cargar Valoraciones</a></li>
        <li><a href="resultados.php">Resultados</a></li>
          <li><a href="index.php">Mapa</a></li>  
      </ul>

  </div>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

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

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Sistema de Votación</h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
 <div class="center-block col-md-6 col-xs-8">
     <h2>Bienvenido Al Modulo de  Administración</h2>


</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
