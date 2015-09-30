<?php
@session_start();
date_default_timezone_set('America/Mexico_City');
if ( !isset($_SESSION['IdUsuario']) ){
	echo "<script>top.location.href='index.php'</script>";
	die();
} else {
	@include 'conectar.php';
	

}

?>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
  
  
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" type="text/css" href="css/Principal.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>

<!-- MENU -->
<div id="menuu">
<div id="headertop">
	<div id="line_top" >
	       	    <div style="padding-top:04px; width:200px;"> <span style="color:rgb(0, 175, 253);">7 11-35-56&nbsp;&nbsp;&nbsp;</span>
              		<img src="imgs/mail.png" width="13" height="11" alt="" />
   	          		<a href="mailto:jesuskori@gmail.com">Sistemas</a>
                </div>
                <div style="float:right;">
     			 <span style="height:36px; padding-top:-10px;"><div id="facee"></div></span>
                </div>
	</div>   


	<div id="logo">
		<img src="imgs/escudo.png" width="341" height="113" alt=""/> 
	</div>

	<div id="MEN"  style="text-align:left; font-size:16px; padding-top:30px; font-family:Open Sans; width:auto;">
		<ul class="nav">
     		<li><a href="#">Inicio</a></li>
     		<li><a href="#">Captura</a>
       			<ul>
          			<li><a href="#"></a></li>    
          			<li><a href="#"></a></li>    
		       </ul>
     		</li>
	   	    <li><a href="Principal.php?m=cerrar">Salir</a></li>
  	   </ul>
	</div>
</div>
</div>


<!-- MENU -->

<div id="contenido">

<?php
		if ( isset($_GET['m'])){
			switch($_GET['m']){
				# Usuarios 
				
				case "Inicio":
					include 'php/Inicio.php';
				break;
				case "cerrar":
					@session_destroy();
					echo "<script>top.location.href='index.php'</script>";
					die();
				break;
				#case "Obras":
				#	if ( isset($_GET['borrar']) ){
				#		mysql_query("DELETE FROM obras WHERE idObra='".mysql_real_escape_string($_GET['borrar'])."'");
				#	}
				#	if ( isset($_GET['next']) ){
				#		mysql_query("UPDATE obras SET NumEstimacion='".mysql_real_escape_string($_GET['numestimacion'])."' WHERE idObra='".mysql_real_escape_string($_GET['next'])."'");
				#	}
				#	include 'php/Obras.php';
				#break;
				
			}
		} else {
			include 'php/Default.php';
		}
?>

</div>

</body>
</html>