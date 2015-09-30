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
<link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

</head>
<body>

<!-- MENU -->
<div id="menuu">
<div id="sidebar">

		<a href="#" id="icono"><i class="fa fa-bars"></i></a>

		<div id="logo1" style="color:#FFFFFF;">
        <img src="imgs/escudo.png" width="245" height="124" alt=""/><br>
         <?php echo $_SESSION['Nombre']; ?>
		</div>
		<!-- Menu del sidebar -->
		<div id="menu1">
			<ul>
				<li><a href="Principal.php?m=Inicio">Inicio</a></li>
				<li><a href="Principal.php?m=Captura">Buscar</a></li>
                <?php
				if($_SESSION['IdUsuario']=="76" or $_SESSION['IdUsuario']=="1" or $_SESSION['IdUsuario']=="79" or $_SESSION['IdUsuario']=="94"){
				?>
                <li><a href="Principal.php?m=Listado">Listado</a></li>
                <li><a href="Principal.php?m=Conceptos">Conceptos</a></li>
                <?php
				}
				?>
                <li><a href="Principal.php?m=Registro">Registro</a></li>
				<li><a href="Principal.php?m=cerrar">Salir</a></li>
		  </ul>
		</div>
		<!-- Fin Menu del sidebar -->
		<!-- redes sociales -->
		<div id="social">
			<ul>
				<li>
                <a href="https://www.facebook.com/gobiernodenuevolaredo?fref=ts" ><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="https://twitter.com/Gob_NuevoLaredo" target="_blank"><i class="fa fa-twitter"></i></a>
				</li>
				
			</ul>

			<div id="copyright">Gobierno de Nuevo Laredo</div>
		</div>
		<!--Fin redes sociales -->
	</div>
</div>
<div id="head">
	<div id="head2"><div style="text-align:center; padding-top:05px;"><img src="imgs/manos.png" width="219" height="129" alt=""/>
    
    </div></div>
    
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
				case "Captura":
					include 'php/captura.php';
				break;
				case "Listado":
					include 'php/Listado.php';
				break;
				case "Conceptos":
					include 'php/Conceptos.php';
				break;
				case "Registro":
					include 'php/Registro.php';
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
<div id="pie"></div>
</body>
</html>