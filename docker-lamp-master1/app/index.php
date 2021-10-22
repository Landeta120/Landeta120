<?php
include "config.php";

include 'modelo/usuario.php';
include 'modelo/pelicula.php';

session_start();

include 'controlador/db.php';
include 'controlador/c_usuario.php';
include 'controlador/c_pelicula.php';

$url = '';
if(isset($_GET['url']))
{
	$url = $_GET['url'];
}

switch ($url) {
    /* Vistas */
    case "login":
        include 'vista/login.php';
        break; 
    case "registro":
        include 'vista/registro.php';
        break;
    case "perfil":
        include 'vista/perfil.php';
        break;
    case "lista_peliculas":
        getPeliculas();
        include 'vista/lista_peliculas.php';
        break;
    case "pelicula":
        getPeliculas();
        include 'vista/pelicula.php';
        break;
    case "cambiar_contraseña":
        include 'vista/cambiar_contraseña.php';
        break;
        
    /* Usuario */  
	case "c_login":
		login();
		break;
	case "c_registro":
		anadirUsuario();
		break;
	case "c_modificarUsuario":
		modificarUsuario();
		break;
    case "c_cerrarSesion":
		cerrarSesion();
    break;
    case "c_cambiar_contraseña":
      cambiar_contraseña();
      break;
        
    /* Pelicula */ 
    case "c_modificarPelicula":
		modificarPelicula();
		break;
    case "c_eliminarPelicula":
		eliminarPelicula();
		break;
    case "c_anadirPelicula":
		anadirPelicula();
		break;
        
    /* Predeterminado */
	default:
		include 'vista/login.php';
}
?>