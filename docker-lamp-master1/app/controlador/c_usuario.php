<?php
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

function anadirUsuario()
{    
    try
    {
        $db = conectarDB();
        
        /* Preparar consulta */
        $consulta = $db->prepare("INSERT INTO Usuario (nUsuario, nombre, dni, telefono, fNacimiento, email, pass) VALUES (:nUsuario, :nombre, :dni, :telefono, :fNacimiento, :email, :pass)");

        $consulta->bindParam(':nUsuario', $nUsuario);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':dni', $dni);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':fNacimiento', $fNacimiento);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':pass', $pass);

        /* Asignar parametros */
        $nUsuario       = $_POST["nUsuario"];
        $nombre         = $_POST["nombre"];
        $dni            = $_POST["dni"];
        $telefono       = $_POST["telefono"];
        $fNacimiento    = $_POST["fNacimiento"];
        $email          = $_POST["email"];
        $pass           = $_POST["contraseña"];

        /* Ejecutar consulta */
        $consulta->execute();
        
        if($consulta->rowCount() >= 1)
        {
            /* Guardar mensaje en sesion */
            $_SESSION['mensaje'] = "El usuario $nombre se ha registrado correctamente";
        }
        else
        {
            /* Guardar error en sesion */
            $_SESSION['error'] = "No se a podido registrar el usuario. Intentelo con otro nombre";
        }
        
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
    
    /* Redirigir */
        header('Location: index.php?url=login');
        die();
}

function modificarUsuario()
{
    try
    {
        $db = conectarDB();

        /* Preparar consulta */
        $consulta = $db->prepare("UPDATE Usuario SET nombre=:nombre, telefono=:telefono, fNacimiento=:fNacimiento, email=:email WHERE nUsuario=:nUsuario");

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':fNacimiento', $fNacimiento);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':nUsuario', $nUsuario);

        /* Asignar parametros */
        $nombre         = $_POST["nombre"];
        $telefono       = $_POST["telefono"];
        $fNacimiento    = $_POST["fNacimiento"];
        $email          = $_POST["email"];
        $nUsuario       = $_POST["nUsuario"];

        /* Ejecutar consulta */
        $consulta->execute();
        
        /* Guardar mensaje en sesion */
        $_SESSION['mensaje'] = "El usuario $nUsuario ha sido modificado correctamente";
        
        /* Preparar consulta */
        $consulta = $db->prepare("SELECT * FROM Usuario WHERE nUsuario = :nUsuario");
        
        $consulta->bindParam(':nUsuario', $nUsuario);

        $nUsuario       = $_POST["nUsuario"];

        /* Ejecutar consulta */
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $resultado = $resultado[0];
    
        $_SESSION['usuario'] = new Usuario($resultado["nUsuario"], $resultado["nombre"], $resultado["dni"], $resultado["telefono"], $resultado["fNacimiento"], $resultado["email"]);
        
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
    
    /* Redirigir */
    header('Location: index.php?url=lista_peliculas');
    die();
}
function cambiar_contraseña(){
    try
    {
        $db = conectarDB();

        /* Preparar consulta */
        $consulta = $db->prepare("SELECT pass FROM Usuario WHERE nUsuario = :nUsuario");
        
        $consulta->bindParam(':nUsuario', $nUsuario);

        $nUsuario       = $_POST["nUsuario"];
        
        /* Ejecutar consulta */
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $resultado = $resultado[0];
        
        if($resultado["pass"] == $_POST["antiguaContraseña"])
        {
            $db = conectarDB();
            /* Preparar consulta */
            $consulta = $db->prepare("UPDATE Usuario SET pass=:nuevaPass WHERE nUsuario=:nUsuario");
            
            $consulta->bindParam(':nuevaPass', $pass);
            $consulta->bindParam(':nUsuario', $usuario);

            /* Asignar parametros */
            $pass           = $_POST["nuevaContraseña"];
            $usuario        = $_POST["nUsuario"];

            /* Ejecutar consulta */
            $consulta->execute();
        }
    }

    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
    
    /* Redirigir */
    cerrarSesion();
}

function login()
{
	try
    {
        $db = conectarDB();

        /* Preparar consulta */
        $consulta = $db->prepare("SELECT * FROM Usuario WHERE nUsuario = :nUsuario");
        
        $consulta->bindParam(':nUsuario', $nUsuario);

        $nUsuario       = $_POST["nombre"];

        /* Ejecutar consulta */
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $resultado = $resultado[0];
        if($resultado != null){
            if($resultado["pass"] == $_POST["clave"])
            {
                $_SESSION['usuario'] = new Usuario($resultado["nUsuario"], $resultado["nombre"], $resultado["dni"], $resultado["telefono"], $resultado["fNacimiento"], $resultado["email"]);

                /* Guardar mensaje en sesion */
                $_SESSION['mensaje'] = "Bienvenido";
            }
        }
        else
        {
            /* Guardar mensaje en sesion */
            $_SESSION['error'] = "Usuario/contraseña incorrectos.";
        }
    }
    catch(PDOException $e)
    {
        $_SESSION['error'] = "No se a podido procesar la petición";
    }
    
    /* Redirigir */
    header('Location: index.php?url=lista_peliculas');
    die();
}

function cerrarSesion()
{
    unset($_SESSION['usuario']);
    /* Redirigir */
    header('Location: index.php?url=login');
    die();
}
?>
