<?php 
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

if(!isset($_SESSION['usuario']))
{
	include 'vista/recursos/nav_login.php';
}
else
{
    include 'vista/recursos/nav_user.php';
}

if(isset($_SESSION['error']))
{
    include "error.php";
}
   
if(isset($_SESSION['mensaje']))
{
    include "mensaje.php";
}
?>