<?php
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}

class Pelicula {
	//Atributos
	public $id;
	public $nombre;
	public $fechaEstreno;
	public $genero;
	public $director;

	//Constructor
	function __construct($id, $nombre, $fechaEstreno, $genero, $director) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->fechaEstreno = $fechaEstreno;
		$this->genero = $genero;
		$this->director = $director;
	}
}
?>
