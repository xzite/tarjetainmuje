<?php
#if(isset($GLOBALS['HTTP_RAW_POST_DATA'])){
#	$rawImage=	$GLOBALS['HTTP_RAW_POST_DATA'];
#	$removeHeaders=substr($rawImage,strpos($rawImage,",")+1);
#	$decode=base64_decode($removeHeaders);
#	$fopen=fopen('fotos/Myimage2.png','wb');
#	$fwrite($fopen,$decode);
#	$fclose($fopen);
#}

$servidorMysql = "localhost";
$usuarioMysql  = "root";
$passwordMysql = "";
$basededatos   = "nlsystem_system";

######################################

mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
mysql_select_db($basededatos);

$Nombre=$_POST['Nombre'];
$id=$_POST['id'];
$curp=$_POST['curp'];


$data = substr($_POST['imageData'], strpos($_POST['imageData'], ",") + 1);
$decodedData = base64_decode($data);
$ruta="fotos/".$id."".$curp.".png";
$fp = fopen("fotos/".$id."".$curp.".png", 'wb');
fwrite($fp, $decodedData);
fclose();

mysql_query("INSERT INTO imagenesc(foto,id) VALUES('$ruta','".$id."".$curp."')");
?>

