<?php
	header("content-type: application/x-javascript");
	include '../conectar.php';
	@session_start();  
			$idcred		=$_POST['idcred'];
			$nombre		=$_POST['nombre'];
			$concepto	=$_POST['concepto'];
			$secretaria	=$_POST['secretaria'];
			$costo		=$_POST['costo'];
			$descuento	=$_POST['descuento'];
			mysql_query("INSERT INTO registrosc (
							idcred,
							fecha,
							nombre,
							concepto,
							secretaria,
							costo,
							descuento
						) 
						VALUES (
							'".$idcred."',
							'".getFecha()."',
							'".$nombre."',
							'".$concepto."',
							'".$secretaria."',
							'".$costo."',
							'".$descuento."')");	
?>