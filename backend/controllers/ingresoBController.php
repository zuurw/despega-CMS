<?php 

/*
CONTROLADOR QUE PERMITE INGRESO DE USUARIO EN BACKEND

*/

class ingresoAdminControllers
{
	public function ingresoAdminController()
	{
		$datosController = [
			"usuario" => $_POST["usuarioIngreso"],
			"password" => $_POST["passwordIngreso"]
		];

		$response = IngresoAdminModels::ingresoAdminModel($datosController);
		
		$user = $response["usuario"];
		$pass = $response["password"];

		if ($user == $datosController["usuario"] && $pass == $datosController["password"]) {
			# code...
		}
	}
}