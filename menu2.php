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
		$sql1="insert into comentarios values ('$comentario') ";
		$resultado=mysqli_query($cx,$sql);
		$resultado=mysqli_query($cx,$sql1);
		$nr=mysqli_affected_rows($resultado);
		

        		?>

			
			<?php
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
<form name ="acceso" action="menu2.php" role="form" method="post">
  <div class="form-group">

						<fieldset>
							<legend><em><strong>Candidatos</strong></em></legend>
						<?php

							$sql="select * from candidatos";
							$resultado=mysqli_query($cx,$sql);
							$num_reg=mysqli_num_rows($resultado);//se usa cuando usas select ver manual del profesor
						?>
							<select name="municipios" onchange="submit();">
							<option value="" >Seleccione Su Valoracion</option>
							<?php
								for ($i=0;$i<$num_reg;$i++){
								//cuando se usa ciclo for es obligatorio que la variable de la matriz estè
								//dentro del ciclo, es decir la variable del mysqli_fetch_array($resultado);
							$reg=mysqli_fetch_array($resultado);
                                    $codigomun=$reg["cedula_candidato"];
								$nombre=$reg["nombre"];
							?>
								<option value="<?php echo $codigomun; ?>"<?php if ($municipio==$codigomun){echo "selected='selected'";}?>><?php echo $nombre; ?></option><!--para chrome-->

							<?php
							}

							?>
						</select>
					</fieldset>
					</td>

<br>
   <br>
   <label for="comentario">Comentarios </label>
							<textarea name="comentario" placeholder="comentario" rows="10" cols="40"></textarea>

   <input type ="submit" class="btn btn-primary" name="boton" Value="votar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>


</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>