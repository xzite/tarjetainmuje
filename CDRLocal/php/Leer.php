<?php
	header("content-type: application/x-javascript");
	include '../conectar.php';
	@session_start();  
	$idcred	=$_POST['idcred'];
	$data 	= mysql_fetch_object(mysql_query("SELECT * FROM crede WHERE code='".$idcred."'"));
	$nombre=$data->Nombre." ".$data->apellidop." ".$data->apellidom;
	echo 'var nombre="'.$nombre.'";';
?>