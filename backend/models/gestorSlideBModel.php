<?php 
require_once "conexionBModel.php";
class slideModels
{
	public function mostrarImagenModel($ruta, $tabla)
	{
		$query = "SELECT ruta FROM $tabla WHERE ruta=:ruta";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt->execute();

		//Entregando todos los slides
		$data = $stmt->fetch();
		$stmt = null;
		return $data;
	}

	public function subirImagenSlideModel($ruta, $tabla){

		$query = "INSERT INTO $tabla (ruta) VALUES (:ruta)";

		$stmt = ConexionModels::conexionModel()->prepare($query);

		$stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);

		if ($stmt->execute()) {
			$stmt = null;
			return true;
		}
		$stmt = null;
		return false;

	}
}