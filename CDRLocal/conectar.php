<?php
# DATOS DE CONEXION AL A BASE DE DATOS

$servidorMysql = "localhost";
$usuarioMysql  = "root";
$passwordMysql = "";
$basededatos   = "nlsystem_system";

#$servidorMysql = "localhost";
#$usuarioMysql  = "nlsystem_user";
#$passwordMysql = "8pbnl.2";
#$basededatos   = "nlsystem_system";

######################################

mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
mysql_select_db($basededatos);


mysql_query("SET NAMES 'utf8'");
# FUNCIONES PARA EXTRAER LA FECHA
function getFecha(){
	$h 		= "5";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
	$hm 	= $h * 60; 
	$ms 	= $hm * 60;
	
	$hora = getHora();

	if ( preg_match("/PM/", $hora) ){
		$fecha 	= gmdate("d/m/Y", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.
	} else if ( preg_match("/AM/", $hora) ){
		$partes = explode(":", $hora);

		if ($partes[0] != "12"){
			if ($partes[0] >= 8){
				$fecha 	= gmdate("d/m/Y", time()-($ms));
			} else {
				$fecha = getFechaAyer();
			}
		} else {
			$fecha = getFechaAyer();
		}
	}
	return $fecha;
}

function getFechaAyer(){
	return  date('d/m/Y', strtotime('yesterday'));
}

function getHora(){
	$h 		= "5";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
	$hm 	= $h * 60; 
	$ms 	= $hm * 60;
	$hora 	= gmdate("g:i:s A", time()-($ms)); // the "-" can be switched to a plus if that's what your time zone is.

	return $hora;
}

function xss( $palabra ){
	return htmlentities(strip_tags($palabra));
}

function sqli( $palabra ){
	return mysql_real_escape_string($palabra);
}

function formato( $html ){
	$html = str_replace("font-family:arial;", "font-family:Georgia;", $html);
	$html = str_replace("&amp;nbsp;"," ",$html);
	$html = str_replace( array("&lt;","&gt;"), array("<",">"), $html);

	return $html;
}

?>