<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Mapa</title>

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
$vacio = isset($_POST['variable']) ? $_POST['variable'] : null ;
    $acceso = isset($_POST['variable']) ? $_POST['variable'] : null ;
	 session_start();
 if (empty($acceso)) {

}
 if (isset($_POST["usuario"])) {
    $usuario=$_POST["usuario"];
}



if (isset($_POST["clave"])) {
    $clave=$_POST["clave"];
}
if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {
		case "Ingresar":

		if (empty($usuario) && empty($clave)) {
			$vacio="si";
			break;
		}


	    $sql="SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
	    $resultado=mysqli_query ($cx,$sql);
	    $datos=mysqli_fetch_array($resultado);
	    $usu=$datos["usuario"];
	    $cla=$datos["clave"];


		if ($usuario==$usu AND $clave==$cla) {
			$_SESSION["nombre"]=$datos["nombre"];
			$_SESSION["nivel"]=$datos["nivel"];
			$_SESSION["permiso"]="Acceso Permitido";
		?>
			<script>
			alert('bienvenido al sistema');
			window.location="menu.php";
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
      <h1 class="text-center">Sistema de Mapa</h1>
    </div>
  </div>

  <hr>
</div>
<div class="container">
 <div class="center-block col-md-4 col-xs-8">
<form action="admin.php" role="form" method="post">
  <div class="form-group">
    <label for="Usuario">Usuario</label>
    <input type="text" name="usuario" class="form-control" id="usuario"
           placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1">Contraseña</label>
    <input type="password" name="clave" class="form-control" id="ejemplo_password_1"
           placeholder="Contraseña">
  </div>


   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
</form>
</div>
</div>
 <div align="center">
			<?php

			if ($acceso=="denegado") {
			  echo "<h1>Acceso denegado.. Usuario o clave erronea...</h1>";
			}

			if ($vacio=="si") {
			  echo "<h1>Debe ingresar Usuario y clave</h1>";
			}

			?>

	   </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
