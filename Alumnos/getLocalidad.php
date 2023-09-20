<?php
	require ('../Conexiones/ConexionSISTEMAESCOLAR.php');
	
	$idMunicipio = $_POST['idMunicipio'];
	
	$consulta = mysqli_query($conexionSISTEMAESCOLAR, "SELECT idCodigoPostal, codigoPostal, colonia FROM CodigosPostales  WHERE idMunicipio = '$idMunicipio' ORDER BY colonia");  
	$html= "<option value='0' selected disabled>Seleccionar Localidad</option>";

	while($filaLocalidades = $consulta->fetch_assoc())
	{
		$html.= "<option value='".$filaLocalidades['idCodigoPostal']."'>".$filaLocalidades['colonia']."</option>";
	}
	echo $html;
?>