<?php
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

function getPeliculas()
{
    $peliculas = array();
    try
    {
        $db = conectarDB();
        
        /* Preparar consulta */
        $consulta = $db->prepare("SELECT * FROM Pelicula");
        
        /* Ejecutar consulta */
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        
        foreach($resultado as $pelicula)
        {
            $peliculas[] = new Pelicula($pelicula["id"], $pelicula["nombre"], $pelicula["fechaEstreno"], $pelicula["genero"], $pelicula["director"]);
        }
        
        /* Cerrar conexion */
        $consulta = null;
        
        /* Guardar resultado en sesion */
        $_SESSION['peliculas'] = $peliculas;
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido obtener el listado de peliculas.";
    }
}

function modificarPelicula()
{
    try
    {
        $db = conectarDB();
        
        /* Preparar consulta */
        $consulta = $db->prepare("UPDATE Pelicula SET nombre=:nombre, fechaEstreno=:fechaEstreno, genero=:genero, director=:director WHERE id=:id");
	    
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':fechaEstreno', $fechaEstreno);
        $consulta->bindParam(':genero', $genero);
        $consulta->bindParam(':director', $director);
	    
	/* Asignar parametros */
        $id             = $_POST["id"];
        $nombre         = $_POST["nombre"];
        $fechaEstreno   = $_POST["fechaEstreno"];
        $genero         = $_POST["genero"];
        $director       = $_POST["director"];
	    
        /* Ejecutar consulta */
        $consulta->execute();
        
        if($consulta->rowCount() >= 1)
        {
            /* Guardar mensaje en sesion */
            $_SESSION['mensaje'] = "La pelicula $nombre ha sido modificado correctamente";
        }
        else
        {
            /* Guardar error en sesion */
            $_SESSION['error'] = "No se a podido modificar la pelicula";
        }
        
        /* Cerrar conexion */
        $consulta = null;
    }
    catch(PDOException $e)
    {   
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
    
    /* Redirigir */
    header('Location: index.php?url=lista_peliculas');
    die();
}

function eliminarPelicula()
{
    try
    {
        $db = conectarDB();

        /* Preparar consulta */
        $consulta = $db->prepare("DELETE FROM Pelicula WHERE id=:id");

        $consulta->bindParam(':id', $id);

        /* Asignar parametros */
        $id             = $_GET["id"];

        /* Ejecutar consulta */
        $consulta->execute();
        
        if($consulta->rowCount() >= 1)
        {
            /* Guardar mensaje en sesion */
            $_SESSION['mensaje'] = "La pelicula $nombre ha sido eliminada correctamente";
        }
        else
        {
            /* Guardar error en sesion */
            $_SESSION['error'] = "No se a podido eliminar la pelicula";
        }
        
        /* Cerrar conexion */
        $consulta = null;
        
        /* Redirigir */
        header('Location: index.php?url=lista_peliculas');
        die();
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
}

function anadirPelicula()
{
    try
    {
        $db = conectarDB();

        /* Preparar consulta */
        $consulta = $db->prepare("INSERT INTO Pelicula (nombre, fechaEstreno, genero, director) VALUES (:nombre, :fechaEstreno, :genero, :director)");

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':fechaEstreno', $fechaEstreno);
        $consulta->bindParam(':genero', $genero);
        $consulta->bindParam(':director', $director);

        /* Asignar parametros */
        $nombre         = $_POST["nombre"];
        $fechaEstreno   = $_POST["fechaEstreno"];
        $genero         = $_POST["genero"];
        $director       = $_POST["director"];

        /* Ejecutar consulta */
        $consulta->execute();
        
        if($consulta->rowCount() >= 1)
        {
            /* Guardar mensaje en sesion */
            $_SESSION['mensaje'] = "La pelicula $nombre ha sido añadida correctamente";
        }
        else
        {
            /* Guardar error en sesion */
            $_SESSION['error'] = "No se a podido añadir la pelicula";
        }
        
        /* Cerrar conexion */
        $consulta = null;
        
        /* Guardar mensaje en sesion */
        $_SESSION['mensaje'] = "La pelicula $nombre ha sido añadida correctamente";
        
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido añadir la pelicula";
    }
    
    /* Redirigir */
    header('Location: index.php?url=lista_peliculas');
    die();
}
?>
