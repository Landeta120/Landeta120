<?php 
if(!isset($_SESSION['usuario']))
{
	header("Location: index.php?url=login");
	die();
}

?>

<DOCTYPE html>
<html>
	<head>
          	<title> Perfil </title>
            <link rel="stylesheet" href="vista/recursos/bootstrap/css/bootstrap.css">
		  	<meta charset="UTF-8">
		  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <head>

	<body>
		<?php include 'vista/recursos/navegacion.php';?>
		
		<section class="container">
            <div class="row">
                <div class="col">
                    <br/>
                    <form name="registro" action="index.php?url=c_modificarUsuario" method="post">
                        <div class="form-group">
                            <label for="nUsuario">Nombre Usuario</label>
                            <input type="text" value="<?php echo $_SESSION['usuario']->nUsuario ?>" class="form-control" id="nUsuario" name="nUsuario" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" value="<?php echo $_SESSION['usuario']->nombre ?>" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $_SESSION['usuario']->telefono ?>" class="form-control" id="telefono" name="telefono">
                        </div>

                        <div class="form-group">
                            <label for="fNacimiento">Fecha de nacimiento</label>
                            <input type="date" value="<?php echo $_SESSION['usuario']->fNacimiento ?>" class="form-control" id="fNacimiento" name="fNacimiento">
                        </div>

                          <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" value="<?php echo $_SESSION['usuario']->email ?>" class="form-control" id="email" name="email">
                        </div>

                        <button onclick="validateForm(event)" type="submit" class="btn btn-primary">Modificar</button>
                    </form>

                    <a href="index.php?url=cambiar_contraseña"> Cambiar Contraseña </a>
                </div>
            </div>
        </section>
		
		<?php include 'vista/recursos/pie.php';?>
	<body>
        
	<script>
        function validateForm(evt) {
            var nombre = document.forms["registro"]["nombre"].value;
            if(!nombre.match(/^[A-Za-z\s]+$/)){
                alert("El nombre solo puede contener letras.");
                evt.preventDefault();
                return false;
            }
            
            var tel = document.forms["registro"]["telefono"].value;
            if (tel.length != 9)
            {
                alert("El telefono no es valido.");
                evt.preventDefault();
                return false;
            }
            
            var email = document.forms["registro"]["email"].value;
            filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!filter.test(email)){
                alert("El email no es valido.");
                evt.preventDefault();
                return false;
            }
        }
        </script>
<html>

