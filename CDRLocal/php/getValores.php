<?php
	header("content-type: application/x-javascript");
	include '../conectar.php';  
	$concepto =$_POST['concepto'];
	$s = mysql_fetch_object(mysql_query("SELECT * FROM conceptosc WHERE REPLACE(concepto,' ','')='".$concepto."' limit 1")); 
	$secretaria = $s->secretaria;
	$costo 		= $s->costo;
	$descuento 	= $s->descuento;
	$total 		= $costo - (($costo * $descuento) / 100);
	echo 'var secretaria="'.$secretaria.'";';
	echo 'var costo		="'.$costo.'";';
	echo 'var descuento	="'.$descuento.'";';
	echo 'var total		="'.$total.'";';
	$mensaje=$concepto;
	echo 'var concepto="'.$concepto.'";';
?>