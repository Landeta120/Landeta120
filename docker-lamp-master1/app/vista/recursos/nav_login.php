<?php 
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}
?>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php?url=login">
        PeliHub
    </a>
    
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-light active" href="index.php?url=login"> Iniciar sesion </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="index.php?url=registro"> Registrarse </a>
        </li>
    </ul>
</nav>