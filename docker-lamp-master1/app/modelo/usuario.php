<?php
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

class Usuario {
	//Atributos
	public $nUsuario; 		//texto
	public $nombre; 		//texto
	public $dni;			//formato 11111111-Z
	public $telefono;		//numero 9 digitos
	public $fNacimiento;	//formato dd-mm-aaaa
	public $email;			//formato de email valido

	//Constructor
	function __construct($nUsuario, $pNombre, $dni, $telefono, $fNacimiento, $email) {
		$this->nUsuario = $nUsuario;
		$this->nombre = $pNombre;
		$this->dni = $dni;
		$this->telefono = $telefono;
		$this->fNacimiento = $fNacimiento;
		$this->email = $email;
	}
}
?>
