<?php
	
	require ('../Conexiones/ConexionSISTEMAESCOLAR.php');
	
	$idEstado = $_POST['idEstado'];

	// $consulta = mysqli_query($conexionSISTEMAESCOLAR, "SELECT idMunicipio, Municipio FROM Municipios WHERE idEstado = '$idEstado' ORDER BY Municipio ASC");  
	$query = "SELECT idMunicipio, Municipio FROM Municipios WHERE idEstado = '$idEstado' ORDER BY Municipio ASC";
	$consultaMunicipios = $conexionSISTEMAESCOLAR->query($query);

	$html= "<option value='0' selected disabled>Seleccionar Municipio</option>";
	
	while($filaMunicipios = $consultaMunicipios->fetch_assoc()):	
		$html.= "<option value='".$filaMunicipios['idMunicipio']."'>".$filaMunicipios['Municipio']."</option>";
	endwhile;
	
	echo $html;
?>		