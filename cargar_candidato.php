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
$vacio = isset($_POST['variable']) ? $_POST['variable'] : null ;
    $acceso = isset($_POST['variable']) ? $_POST['variable'] : null ;
	 session_start();
        $cedula=$_SESSION["cedula_alumno"];

 if (empty($acceso)) {

}
  if (isset($_POST["id_carreras"])){
	 $id_carreras=$_POST["id_carreras"];
	}else{
	$id_carreras="";

    }
  if (isset($_POST["municipios"])){
	 $municipio=$_POST["municipios"];
	}else{
	$municipio="";
	}

//if (isset($_POST["parroquias"])){
	// $parroquias=$_POST["parroquias"];
	//}else{
	//$parroquias="";
	//}
       if (isset($_POST["nombre"])){
	 $nombre=$_POST["nombre"];
	}else{
	$nombre="";
	}

if (isset($_POST["cedula"])){
	 $cedula=$_POST["cedula"];
	}else{
	$cedula="";
	}
 if (isset($_POST["alumno"])) {
    $alumno=$_POST["alumno"];
}
     if (isset($_POST["cod_candidato"])) {
    $cod_candidato=$_POST["cod_candidato"];
}
     if (isset($_POST["cedula_alumno"])) {
    $alu=$_POST["cedula_alumno"];
}


if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {

		case "guardar":
             if (empty($cedula)){
	?>

			<script>
			alert('Ingrese  cedula');
			</script>
			<?php

			break;

	}
	if (! is_numeric($cedula)){
	?>

			<script>
			alert('Por favor colocar  solo numero en la cedula');
			</script>
			<?php

			break;

	}
                        if (empty($nombre)){
	?>

			<script>
			alert('ingrese  Nombre');
			</script>
			<?php

			break;

	}


		$sql="insert into candidatos (cedula_candidato,nombre,cod_candidato) values ('$cedula','$nombre','$cedula') ";
		$resultado=mysqli_query($cx,$sql);
		 if ($resultado){
              	$acceso="aprobado";
			?>


			<?php
			}
		$cedula="";
		$usuario="";
		$nombre="";
		$clave="";
		$nivel="";
	$clavev="";
		break;
  }
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Modulo de  Registro de  Valoraciones</h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
 <div class="center-block col-md-4 col-xs-8">
		<td><?php echo "<font size='5' color='blue'>Bienvenido:</font>"."<font size='5' color='red'>".$_SESSION["nombre"]."</font>";

				?></td>
<form name ="acceso" action="cargar_candidato.php" role="form" method="post">
  <div class="form-group">




  <div class="form-group">
    <label for="Usuario">Valor</label>
    <input type="text" name="cedula" class="form-control" id="cedula"
           placeholder="Cedula">
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1">Mismo valor</label>
    <input type="text" name="nombre" class="form-control" id="nombre"
           placeholder="nombre">
  </div>

<?php

    ?>
<br> <input type ="submit" class="btn btn-primary" name="boton" Value="guardar">


							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
<?php
    	if ($acceso=="aprobado") {
			  echo "<h1>Registro Guardado con exito....</h1>";
			}
    ?>

</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
