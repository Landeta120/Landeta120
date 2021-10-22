<?php 
if(isset($_SESSION['usuario']))
{
	header("Location: index.php?url=perfil");
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
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
                    <form name="registro" action="index.php?url=c_registro" method="post">

                        <!-- Nombre de usuario -->
                        <div class="form-group">
                            <label for="nUsuario">Nombre de usuario</label>
                            <input type="text" class="form-control" id="nUsuario" name="nUsuario" required>
                            <div class="invalid-feedback">
                                Introduce un nombre de usuario valido.
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <!-- DNI -->
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="11111111-Z" required>
                        </div>

                        <!-- Telefono -->
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fNacimiento" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>

                        <!-- Repetir contraseña -->
                        <div class="form-group">
                            <label for="contraseña2">Repetir contraseña</label>
                            <input type="password" class="form-control" id="contraseña2" name="contraseña2" required>
                        </div>

                        <button onclick="validateForm(event)" type="submit" class="btn btn-primary">Registrarse</button>

                    </form>
                </div>
            </div>
		</section>
        
        <script>
        function validateForm(evt) {
            var nombre = document.forms["registro"]["nombre"].value;
            if(!nombre.match(/^[A-Za-z\s]+$/)){
                alert("El nombre solo puede contener letras.");
                evt.preventDefault();
                return false;
            }
            
            var abc = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
            var dni = document.forms["registro"]["dni"].value;
            
            dni = dni.split("-");
            if(dni[0].length != 8 || dni[0].match(/^[0-9]+$/) == null)
            {
                alert("El dni no es valido.");
                evt.preventDefault();
                return false;
            }
            else{
                var num = parseInt(dni[0]);
                var resto = num % 23;
                if(abc[resto] != dni[1])
                {
                    alert("La letra del dni no es valida.");
                    evt.preventDefault();
                    return false;
                }
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
		
		<?php include 'vista/recursos/pie.php';?>
	</body>
</html>
