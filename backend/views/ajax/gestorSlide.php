<?php 

require_once("../../models/gestorSlideBModel.php");
require_once("../../controllers/gestorSlideBController.php");


#CLASE Y METODOS ------------------------------------
class Ajax
{	
	public $nombreImagen;
	public $imagenTemporal;

	//Subir imagen del slide
	public function gestorSlideAjax()
	{
		$datos = [
			"nombreImagen" => $this->nombreImagen,
			"imagenTemporal" => $this->imagenTemporal
		];

		$respuesta = slideControllers::mostrarImagenController($datos);
		//Mandar imagen que estamos subiendo al JS gestorSlide
		echo $respuesta;
	}

	//Eliminar item slide
	public $slide;

	public function eliminarSlideAjax()
	{
		$datos = [
			"idSlide" => $this->idSlide,
		];

		$respuesta = slideControllers::eliminarSlideController($datos);
		echo $respuesta;
	}
}

#OBJETOS -------------------------------------------

if (isset($_FILES["imagen"]["name"])) 
{
	#Instancia para subir
	$upload = new Ajax();
	$upload->nombreImagen = $_FILES["imagen"]["name"];
	$upload->imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$upload->gestorSlideAjax();
}

if (isset($_POST["idSlide"])) 
{
	#instancia para borrar
	$delete = new Ajax();
	$delete->idSlide = $_POST["idSlide"];
	$delete->eliminarSlideAjax();
}
