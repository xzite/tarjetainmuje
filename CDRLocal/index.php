<?php 
@session_start();
if ( isset($_SESSION['IdUsuario']) ){
	echo "<script>top.location.href='Principal.php'</script>";
	die();
}
if ( isset($_POST['Usuario']) && isset($_POST['Contrasena']) ){
	include "conectar.php";
	$user = mysql_real_escape_string($_POST['Usuario']);
	$pass = mysql_real_escape_string($_POST['Contrasena']);

	$co = "SELECT * FROM usuarios WHERE usuario='".$user."' AND contrasena='".md5($pass)."'";
	#$co = "SELECT * FROM Usuarios WHERE Usuario='".$user."' AND Contrasena='".$pass."'";
	
	$ok = mysql_num_rows(mysql_query($co));
	if ( $ok ){

		$datos   = mysql_fetch_object(mysql_query($co));

		# ESTABLECEMOS VARIABLES DE SESION PARA RECONOCER AL ADMINISTRADOR Y PERMISOS
		$_SESSION['IdUsuario'] = $datos->idUsuario;
		$_SESSION['Usuario'] = $datos->Usuario;
		$_SESSION['Nombre'] = $datos->Nombre;
		$_SESSION['Privilegio'] = $datos->Privilegio;
		$_SESSION['rol'] = $datos->rol;
		$_SESSION['idcontratista'] = $datos->idcontratista;
		$_SESSION['orden'] = $datos->orden;
		

		mysql_query("UPDATE Usuarios SET ultimaip='".$_SERVER['REMOTE_ADDR']."',ultimafecha='".getFecha()."',ultimahora='".getHora()."' WHERE idUsuario='".$datos->idUsuario."'");

		echo "<script>top.location.href='Principal.php'</script>";
	} else {
		$err = "Usuario o contrase&ntilde;a incorrecta";
	}
}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  
  
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" type="text/css" href="css/Principal.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<div id="menuu">
 

</div>
<div id="head">
	<div id="head2"><div style="text-align:center; padding-top:05px;"><img src="imgs/manos.png" width="219" height="129" alt=""/>
    
    </div></div>
    
</div>

<div id="contenido" style="padding-top:150px;">

<div id="topright3" style="float:right; top:0px; width:600px; padding-left:60px; padding-right:70px;">
     			<!-- <span style="height:36px;"><div id="facee"></div></span>-->
                 <form action=''  method='post' style="float:right;">
	  				<input  id="txt1" type='text' name='Usuario'  placeholder="Correo Electronico" />
					<input id="txt2"  type='password' name='Contrasena' placeholder="Password" /> 
					<input  id="Bsubmit" type='submit' value='Iniciar' />
			    </form>
                
 </div>
 </div> 
</body>
</html>