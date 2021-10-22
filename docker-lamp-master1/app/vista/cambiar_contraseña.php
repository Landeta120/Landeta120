<?php 
if(!isset($_SESSION['usuario']))
{
	header("Location: index.php?url=login");
	die();
}

$var = $_SESSION['peliculas'];
?>

<!DOCTYPE html>
<html>
    <head>
		<title> Cambiar Contraseña </title>
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
                    <form action="index.php?url=c_cambiar_contraseña" method="post">

                    <div class="form-group">
                        <label for="nUsuario">Nombre de Usuario</label>
                            <input type="text" value="<?php echo $_SESSION['usuario']->nUsuario ?>" class="form-control" id="nUsuario" name="nUsuario" readonly>
                    </div>

                        <div class="form-group">
                            <label for="antiguaContraseña">Antigua Contraseña</label>
                               <input type="password" class="form-control" id="antiguaContraseña" name="antiguaContraseña">
                        </div>

                        <div class="form-group">
                            <label for="nuevaContraseña">Nueva Contraseña</label>
                               <input type="password" class="form-control" id="nuevaContraseña" name="nuevaContraseña">
                        </div>

                        <button type="submit" class="btn btn-primary">Cambiar</button>
                    </form>
                </div>
            </div>
        <section>
    <body>
	
</html>