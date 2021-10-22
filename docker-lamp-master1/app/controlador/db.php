<?php
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

function conectarDB()
{
    try
    {
        $conexion = new PDO("mysql:host=" . DB_HOST . ";port=8889;dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
    catch (PDOException $e)
    {   
        header('Location: index.php');
        die();
    }
}
?>
