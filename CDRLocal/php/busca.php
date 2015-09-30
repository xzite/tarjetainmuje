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

$curp = $_POST['curp'];


 
 $result=mysql_query("SELECT * FROM crede where curp='$curp'");
 
$contar = mysql_num_rows($result);
             
            if($contar == 0){
                 echo "no";
            }else{
				 while($row=mysql_fetch_array($result)){
                        $id = $row['idCred'];
                         
                        echo $id;    
                  }
			}

?>