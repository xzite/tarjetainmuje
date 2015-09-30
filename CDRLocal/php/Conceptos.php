<script type="text/javascript">
$(function(){
		$('#guardar').click(function(){
				var concepto	=$('#concepto').val();
				var secretaria	=$('#secretaria').val();
				var costo		=$('#costo').val();
				var descuento	=$('#descuento').val();
				if (concepto == "" || costo == "" || descuento == "")
				{
					alert("Todos los campos son OBLIGATORIOS.");
				}
				else
					alert("Concepto almacenado.");
					jQuery.post("php/Guardar.php", {
					concepto:concepto,
					secretaria:secretaria,
					costo:costo,
					descuento:descuento
					}, function(data, textStatus){
				});
		});	
});
</script>
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
<form  method="post" enctype="multipart/form-data">
<div id="captura" style="float:left; text-align:left; padding-top:20px; padding-bottom:80px; padding-left:500px;" align="left">
	<img src="imgs/starHor.png" height="42" alt=""/>
    <h3>Captura de Conceptos</h3>
	<p>Concepto</p><input name="concepto" id="concepto" type="text"  class="inputs" onKeyUp="this.value=this.value.toUpperCase();"/>
	<p>&Aacute;rea</p>
    <select name="secretaria" id="secretaria" class="inputs">
		<option value=""></option>
		<?php
        	$secretarias= mysql_query("SELECT secretaria FROM secretarias");
            while($row = mysql_fetch_array($secretarias)) 
            { 
				$secretaria = $row["secretaria"]; 
                echo "<option value=".str_replace(' ','&nbsp;',$secretaria).">".$secretaria."</option>";
        	}
    	?>
   	</select>
	<p>Costo</p><input type="text" name="costo" id="costo" class="inputs"  />
    <p>Descuento </p><input type="text" name="descuento"  id="descuento"  class="inputs" />
    <p>
     	<div style="clear:both"></div>
        <input type="button"  name="guardar" id="guardar" value="Guardar"  class="botones"/>
        <?php
        echo '<a href="php/listadoconceptos.php" target="_blank" onclick="window.open(this.href,\'window\',\'width=1250, height=600\');return false"><input type="button"  name="listado" id="listado" value="Ver Listado"  class="botones"/></a>';
    	?>
	</p><br>

    
</div>
