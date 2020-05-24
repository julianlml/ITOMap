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
     $carrera=$_SESSION["carrera"];
 if (empty($acceso)) {

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

if (isset($_POST["cedula_candidato"])){
	 $cedula_candidato=$_POST["cedula_candidato"];
	}else{
	$cedula_candidato="";
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

$comentario=$_POST["comentario"];
if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {
		case "votar":


		$sql="update alumnos set voto='1', cod_candidato='$municipio' where cedula_Alumno='$cedula'";
		$resultado=mysqli_query($cx,$sql);
		$nr=mysqli_affected_rows($resultado);
            echo $nr;
		if ($nr >= 1) {
		?>
			<script>
				alert ('');
			</script>
		<?php
		echo $alu;
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
 <div class="center-block col-md-4 col-xs-8">
		<td><?php echo "<font size='5' color='blue'>Bienvenido:</font>"."<font size='5' color='red'>".$_SESSION["nombre"]."</font>";

				?></td>
<form name ="acceso" action="resultados.php" role="form" method="post">
  <div class="form-group">


 <fieldset>
							<legend><em><strong>Filtro de  Carrera</strong></em></legend>
						<?php

							$sql="select * from carreras";
							$resultado=mysqli_query($cx,$sql);
							$num_reg=mysqli_num_rows($resultado);//se usa cuando usas select ver manual del profesor
						?>
							<select name="municipios" onchange="submit();">
							<option value="" >Seleccione Su Carrera  a  buscar </option>
							<?php
								for ($i=0;$i<$num_reg;$i++){
								//cuando se usa ciclo for es obligatorio que la variable de la matriz estè
								//dentro del ciclo, es decir la variable del mysqli_fetch_array($resultado);
							$reg=mysqli_fetch_array($resultado);
                                    $codigomun=$reg["carreras"];
								$carreras=$reg["carreras"];
							?>
								<option value="<?php echo $codigomun; ?>"<?php if ($municipio==$codigomun){echo "selected='selected'";}?>><?php echo $carreras; ?></option><!--para chrome-->

							<?php
							}

							?>
						</select>
					</fieldset>
<br>

<table class="table table-hover table-striped text-center"border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt">
<thead>
<tr>
<td><font face="verdana"><b>Valor</b></font></td>
<td><font face="verdana"><b>Valor</b></font></td>
<td><font face="verdana"><b>Carrera</b></font></td>
<td><font face="verdana"><b>Votos</b></font></td>
</tr>
    </thead>
<div class="tabla">
<?php


  $sql = "SELECT * from votos where carrera ='$municipio' ORDER BY votos DESC ";
$resultado=mysqli_query($cx,$sql);
  $numero = 0;
  while($row = mysqli_fetch_array($resultado))
  {
    echo "<tr><td width=\"80%\"><font face=\"verdana\">" .
	    $row["cod_candidato"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" .
	    $row["nombre"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" .
	    $row["carrera"] . "</font></td>";
    echo "<td width=\"80%\"><font face=\"verdana\">" .
	    $row["votos"]. "</font></td></tr>";
    $numero++;
  }


  mysqli_free_result($resultado);
 
  

?>

<table class="table table-hover table-striped text-center"border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt">
<thead>
<tr>
<td><font face="verdana"><b>Comentarios</b></font></td>

</tr>
    </thead>

		<?php 
		$sql1="SELECT * from comentarios";
		$result1=mysqli_query($cx,$sql1);

		while($mostrar1=mysqli_fetch_array($result1)){
		 ?>

		<tr>
			<td><?php echo $mostrar1['comentario'] ?></td>
			
		</tr>
	<?php 
	}
	 ?>
	</table>

</form>




</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
