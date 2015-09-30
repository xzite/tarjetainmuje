<?php 

$servidorMysql = "localhost";
$usuarioMysql  = "root";
$passwordMysql = "";
$basededatos   = "nlsystem_system";

######################################

mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
mysql_select_db($basededatos);


mysql_query("SET NAMES 'utf8'");

$elector = $_POST['elector'];

$sql="SELECT ClaveElector,Paterno,Materno,Nombre,Calle,Num_Ext,Num_Int,Colonia,CP FROM laredo2015c WHERE ClaveElector='".$elector."' LIMIT 1";


$re=mysql_query($sql);
	

	while($data=mysql_fetch_array($re)){
			    
					$array[]=$data;
				
				}
				
	
				echo json_encode($array);

?>