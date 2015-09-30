<style type="text/css">
.inputs{
	background-color: #edf0f2;
	border: none;
	border-radius: 5px;
	font-size: 15px;
	padding: 8px;
	color: #444;
	line-height: normal;
	-webkit-rtl-ordering: logical;
	-webkit-user-select: text;
	cursor: auto;
	letter-spacing: normal;
	word-spacing: normal;
	text-transform: none;
	text-indent: 0px;
	text-shadow: none;
	display: inline-block;
	width:600px;
	margin-bottom:20px;
}
h3{
	font-size: 22px;
	src:url(../fonts/Trebuchet%20MS.ttf);
	font-family:"Trebuchet MS", Tahoma,sans-serif;
	margin-bottom: 24px;
	color: #444;
	font-weight:100;
}
p{
	font: 14px 'Open Sans';	
}
label{
	font: 16px 'Open Sans';	
}
.botones{
	background-color: #e14d43;	
	color: #FFFFFF;	
	font-family: 'Open Sans';
	font-size: 15px;
	line-height: 22px;
	font-weight: 500;
	text-transform: uppercase;
	padding: 10px 36px;
	margin: 5px 0;
	border: none !important;
	border-radius: 5px;
	overflow: hidden;
	-webkit-appearance: button;
	}
.botones:hover{
	background-color:#E0060A;	
	}
 #mage{
        display:block;
        float:left;
        width:120px;
        height:150px;
        text-align:center;
        padding:6px 0;
        margin:5px 0 5px 14px;
		font-size:11px;
		font-family:Georgia, "Times New Roman", Times, serif;

    }
header {
    padding: 15px;
    box-shadow: 0px 1px 2px rgba(0,0,0,0.4);
    background-color: rgb(27, 161, 226);
    color: #fff;
}

    header h1 {
        font-size: 14pt;
    }


article {
    width: 80%;
    margin: auto;
    margin-top: 20px;
}
.correcto{
    border: 1px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
    font-family:Arial, Helvetica, sans-serif;
    font-size:13px;
    text-align:left;
    width:auto;
}
.correcto {
    color: #4F8A10;
    background-color: #DFF2BF;
    background-image: url(imgs/correcto.jpg)
}
</style>
<header>		
</header>
<?php
	if (isset($_POST['leer']) )
	{
		if ($_POST['idcred']!="")
		{
			$idcred	=$_POST['idcred'];
			$data 	= mysql_fetch_object(mysql_query("SELECT * FROM crede WHERE code='".$idcred."'"));
			$nombre=$data->Nombre." ".$data->apellidop." ".$data->apellidom;
		}
		else
		{
			$nombre		="";
			$idcred		="";
		}
		if ($_POST['concepto']!="")
		{
			$concepto	=$_POST['concepto'];
			$data2 		= mysql_fetch_object(mysql_query("SELECT * FROM conceptosc WHERE concepto='".$concepto."'"));
			$costo		=$data2->costo;
			$descuento	=$data2->descuento;
		}
		else
		{
			$costo		="";
			$descuento	="";
		}
	}
	else
	{
		$nombre		="";
		$costo		="";
		$descuento	="";
		$total		="";
		$idcred		="";
	}
?>
<form  method="post" enctype="multipart/form-data">
<div id="captura" style="float:left; text-align:left; padding-top:20px; padding-bottom:80px; padding-left:500px;" align="left">
	<img src="imgs/starHor.png" height="42" alt=""/>
    <h3>Registro de Descuentos</h3>
	<p>C&oacute;digo de Credencial</p><input name="idcred" id="idcred" type="text"  class="inputs" onKeyUp="this.value=this.value.toUpperCase();" style="width:300px;background:#99FDF3" value="<?php echo $idcred?>" autofocus/>
	<!--<input type="submit"  name="leer" id="leer" value="LEER CODIGO"  class="botones" style="background:#489191"/><br>
    <input type="button"  name="leer2" id="leer" value="LEER CODIGO2"  class="botones" style="background:#489191"/><br>-->
    <p>Nombre</p><input readonly type="text" name="nombre" id="nombre" class="inputs" value="<?php echo $nombre ?>"/>
    <p>Concepto</p>
    <select name="concepto" id="concepto" class="inputs" >
		<option value="">Seleccione un concepto</option>
		<?php
        	$conceptos= mysql_query("SELECT concepto FROM conceptosc ORDER BY concepto ASC");
            while($row = mysql_fetch_array($conceptos)) 
            { 
				$concepto = $row["concepto"]; 
				$concepto2 = preg_replace("/\s/",'',$concepto);
				#echo "<option value=".str_replace(' ','&nbsp;',$concepto).">".$concepto."</option>";
				echo "<option value=".$concepto2.">".$concepto."</option>";
			}
    	?>
        <option value="OTRA">OTRA</option>
   	</select>
    <p>Secretaria</p><input readonly type="text" name="secretaria" id="secretaria" class="inputs" />
	<p>Costo</p><input readonly type="text" name="costo" id="costo" class="inputs" value="<?php echo $costo ?>"/>
    <p>Descuento</p><input readonly type="text" name="descuento"  id="descuento"  class="inputs" value="<?php echo $descuento ?>"/>
    <p>
     	<div style="clear:both"></div>
        <input type="submit"  name="guardar" id="guardar" value="Guardar"  class="botones"/>
        <?php
		@session_start();
		if($_SESSION['IdUsuario']=="76" or $_SESSION['IdUsuario']=="1" or $_SESSION['IdUsuario']=="79")
		{
        	echo '<a href="php/listadoregistro.php" target="_blank" onclick="window.open(this.href,\'window\',\'width=1350, height=600\');return false"><input type="button"  name="listado" id="listado" value="Ver Listado"  class="botones"/></a>';
		}
		?>
	</p><br>
</div>
<script type="text/javascript">
	$(function(){
    	$('#concepto').change(function(){
			var concepto=$('#concepto').val();
			jQuery.post("php/getValores.php", {
				concepto:concepto
				}, function(data, textStatus){
					/*alert (concepto);*/
					$('#secretaria').val(secretaria);
					$('#costo').val(costo);
					$('#descuento').val(descuento);
   				}) ;
		});	
	});	
	$(function(){
		$('#guardar').click(function(){
			var idcred		=$('#idcred').val();
			var nombre		=$('#nombre').val();
			var concepto	=$('#concepto').val();
			var secretaria	=$('#secretaria').val();
			var costo		=$('#costo').val();
			var descuento	=$('#descuento').val();
			if (idcred == "" || concepto == "")
			{
				alert("El campo CONCEPTO es obligatorio.");
			}
			else
				alert("Registro almacenado.");
				jQuery.post("php/GuardarRegistro.php", {
				idcred:idcred,
				nombre:nombre,
				concepto:concepto,
				secretaria:secretaria,
				costo:costo,
				descuento:descuento
				}, function(data, textStatus){
					location.href="Registro.php";
			});
		});
	});	
	$(document).ready(function(){
		$("input[name=idcred]").change(function(){
			var idcred=$('#idcred').val();
			jQuery.post("php/Leer.php", {
				idcred:idcred
				}, function(data, textStatus){
					/*alert (nombre);*/
					$('#nombre').val(nombre);
				});
		});
	});
</script>
