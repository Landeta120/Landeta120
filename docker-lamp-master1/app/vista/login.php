<?php 
if(isset($_SESSION['usuario']))
{
	header("Location: index.php?url=lista_peliculas");
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<link rel="stylesheet" href="vista/recursos/bootstrap/css/bootstrap.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
		<?php include 'vista/recursos/navegacion.php';?>
		
		<section class="container">
            <div class="row">
                <div class="col">
                    <br/>
                    <form action="index.php?url=c_login" method="post">
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clave" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                               <input type="password" class="form-control" id="clave" name="clave">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                    <p>¿No tienes una cuenta? <a href="index.php?url=registro">Registrate</a></p>
                </div>
            </div>
        </section>
		
		<?php include 'vista/recursos/pie.php';?>
	</body>
</html>