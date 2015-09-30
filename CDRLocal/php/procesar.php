<?php 

#DATOS DE CONEXION AL A BASE DE DATOS

#$servidorMysql = "localhost";
#$usuarioMysql  = "root";
#$passwordMysql = "";
#$basededatos   = "generadoresobras";

$servidorMysql = "localhost";
$usuarioMysql  = "root";
$passwordMysql = "";
$basededatos   = "nlsystem_system";

######################################

mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
mysql_select_db($basededatos);

date_default_timezone_set('America/Monterrey');
$Fecha=date("d/m/Y H:i:s");

$Nombre = $_POST['Nombre'];
$apellidop = $_POST['apellidop'];
$apellidom = $_POST['apellidom'];
$fechanac = $_POST['fechanac'];
$domicilio = $_POST['domicilio'];
$numero = $_POST['numero'];
$domicilio2 = $_POST['domicilio2'];
$numero2 = $_POST['numero2'];
$cp = $_POST['cp'];
$colonia = $_POST['colonia'];
$claveelector = $_POST['claveelector'];
$curp = $_POST['curp'];
$telefono = $_POST['telefono'];
$lugar=$_POST['lugar'];
$padron=$_POST['padron'];
$correo=$_POST['correo'];




 
 mysql_query("INSERT INTO crede(Nombre,apellidop,apellidom,fechanac,domicilio,numero,domicilio2,numero2,cp,colonia,claveelector,curp,Fecha,telefono,lugar,padron,correo) VALUES('$Nombre','$apellidop','$apellidom','$fechanac','$domicilio','$numero','$domicilio2','$numero2','$cp','$colonia','$claveelector','$curp','$Fecha','$telefono','$lugar','$padron','$correo')");

$id=mysql_insert_id();
 
 mysql_query("UPDATE crede SET folio='".$id."".$curp."' where idCred=".$id."");
 

if(mysql_affected_rows()>0){
	echo $id;
}
else{
	echo "2";
}
?>