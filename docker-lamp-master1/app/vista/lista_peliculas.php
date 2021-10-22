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
		<title> Listado de elementos </title>
		<link rel="stylesheet" href="vista/recursos/bootstrap/css/bootstrap.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body>
		<?php include 'vista/recursos/navegacion.php';?>
		
        <!-- Listado de peliculas -->
		<section class="container">
            <div class="row">
                <div class="col">
                    <br/>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de estreno</th>
                                <th>Genero</th>
                                <th>Director</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($var as $pelicula)
                            {
                                echo "<tr>";
                                    echo "<td> $pelicula->id </td>";
                                    echo '<td> <a href="index.php?url=pelicula&id=' . $pelicula->id . '">' . $pelicula->nombre . '</a> </td>';
                                    echo "<td> $pelicula->fechaEstreno </td>";
                                    echo "<td> $pelicula->genero </td>";
                                    echo "<td> $pelicula->director </td>";
                                    echo '<td> <a class="text-danger" href="index.php?url=c_eliminarPelicula&id=' . $pelicula->id . '">Eliminar </a> </td>';
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</section>
        
        <!-- Formulario añadir pelicula -->
        <section class="container">
            <div class="row">
                <div class="col">
                    <br/>
                    <form action="index.php?url=c_anadirPelicula" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="form-group">
                            <label for="fechaEstreno">Fecha de estreno</label>
                            <input type="date" class="form-control" id="fechaEstreno" name="fechaEstreno">
                        </div>

                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <input type="text" class="form-control" id="genero" name="genero">
                        </div>

                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" class="form-control" id="director" name="director">
                        </div>

                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </form>
                </div>
            </div>
        </section>
		
		<?php include 'vista/recursos/pie.php';?>
	</body>
</html>