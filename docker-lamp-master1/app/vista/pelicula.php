<?php 
if(!isset($_SESSION['usuario']))
{
	header("Location: index.php?url=login");
	die();
}
foreach($_SESSION['peliculas'] as $var){
	if ($var->id == $_GET['id']){
		$pelicula = $var;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Elemento </title>
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
                    <form action="index.php?url=c_modificarPelicula" method="post">

                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" value="<?php echo $pelicula->id ?>" class="form-control" id="id" name="id" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" value="<?php echo $pelicula->nombre ?>" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="form-group">
                            <label for="fechaEstreno">Fecha de estreno</label>
                            <input type="date" value="<?php echo $pelicula->fechaEstreno ?>" class="form-control" id="fechaEstreno" name="fechaEstreno">
                        </div>

                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <input type="text" value="<?php echo $pelicula->genero ?>" class="form-control" id="genero" name="genero">
                        </div>

                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" value="<?php echo $pelicula->director ?>" class="form-control" id="director" name="director">
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </form>
                </div>
            </div>
        </section>
		
		<?php include 'vista/recursos/pie.php';?>
	</body>
</html>
