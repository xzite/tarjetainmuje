<script type="text/javascript">
window.onload = function() {
	$('#div2').hide();
		$('#div1').hide();
		$('#camaraabajo').hide();
	$('#GotoAgain').click(function(){
		$('#camaraabajo').fadeIn('slow');
	});	
	$('#Busca1').click(function(){
		$('#div2').fadeOut('slow');
		$('#div1').fadeIn('slow');
	});
	$('#Busca2').click(function(){
		$('#div1').fadeOut('slow');
		$('#div2').fadeIn('slow');
	});
	
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;

    var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        btnStart = document.getElementById("btnStart"),
        btnStop = document.getElementById("btnStop"),
        btnPhoto = document.getElementById("btnPhoto"),
        videoObj = {
            video: true,
            audio: true
        };

    btnStart.addEventListener("click", function() {
        var localMediaStream;

        if (navigator.getUserMedia) {
            navigator.getUserMedia(videoObj, function(stream) {              
                video.src = (navigator.webkitGetUserMedia) ? window.webkitURL.createObjectURL(stream) : stream;
                localMediaStream = stream;
                
            }, function(error) {
                console.error("Video capture error: ", error.code);
            });

            btnStop.addEventListener("click", function() {
                localMediaStream.stop();
            });

            btnPhoto.addEventListener("click", function() {
                context.drawImage(video, 0, 0, 340, 300);
				
					
			
				

			/*	$( "#imagenG" ).append( '<img src="'+img+'"/>' );*/
			

            });
        }
    });
	
	}	
function Guardar(){
	var id=$('#id').val();
	var Nombre=$('#Nombre').val();
	var curp=$('#curp').val();
	

	var data = document.getElementById("canvas").toDataURL();

	$.post("saveImage2.php", {
		imageData : data, Nombre:Nombre, id:id,curp:curp
	}, function(data) {
		
	});
	
}
</script>	
<?php
if ( isset($_POST['Actualiza'])){
	$Nombre= mysql_real_escape_string($_POST['Nombre']);
	$ApellidoP= mysql_real_escape_string($_POST['ApellidoP']);
	$ApellidoM= mysql_real_escape_string($_POST['ApellidoM']);
	$telefono= mysql_real_escape_string($_POST['telefono']);
	$fechanac= mysql_real_escape_string($_POST['fechanac']);
	$Domicilio= mysql_real_escape_string($_POST['Domicilio']);
	$numero= mysql_real_escape_string($_POST['numero']);
	$cp= mysql_real_escape_string($_POST['cp']);
	$colonia= mysql_real_escape_string($_POST['colonia']);
	$claveelector= mysql_real_escape_string($_POST['claveelector']);
	$curp= mysql_real_escape_string($_POST['curp']);
	$id= mysql_real_escape_string($_POST['id']);
	
	 mysql_query("UPDATE crede SET Nombre='".$Nombre."', apellidop='".$ApellidoP."', apellidom='".$ApellidoM."', fechanac='".$fechanac."', domicilio='".$Domicilio."', numero='".$numero."', cp='".$cp."', colonia='".$colonia."', claveelector='".$claveelector."', curp='".$curp."', telefono='".$telefono."' WHERE idCred='".$id."'");
$data = mysql_fetch_object(mysql_query("SELECT * FROM crede WHERE idCred='".$id."'"));	 
}


if ( isset($_POST['curp2']) || isset($_POST['Nombre2']) ){
	
	if($_POST['Nombre2']<>""){
		$Nombre2	= mysql_real_escape_string($_POST['Nombre2']);	
		$ApellidoP2	= mysql_real_escape_string($_POST['ApellidoP2']);	
		$ApellidoM2	= mysql_real_escape_string($_POST['ApellidoM2']);	
		$data = mysql_fetch_object(mysql_query("SELECT * FROM crede WHERE Nombre='".$Nombre2."' and apellidop='".$ApellidoP2."' and apellidom='".$ApellidoM2."'"));
	}
	if($_POST['curp2']<>""){
		$curp	= mysql_real_escape_string($_POST['curp2']);	
		$data = mysql_fetch_object(mysql_query("SELECT * FROM crede WHERE curp='".$curp."'"));
	}
	
}


?>
<script type="text/javascript">
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
	<form method="post">
    <div style="float:right;"><label>Buscar por: &nbsp;&nbsp;</label><input id="Busca1" type="Button" value="Nombre"  class="botones"/>&nbsp;&nbsp;<input id="Busca2" type="button" value="CURP"  class="botones"/></div>
	<div style="float:right; padding-top:10px; padding-right:10px;" id="div1">
        <input type="text"  id="Nombre2" name="Nombre2" class="inputs" placeholder="Nombre" style="width:200PX;"/>
        <input type="text"  id="ApellidoP2" name="ApellidoP2" class="inputs" placeholder="Apellido Paterno" style="width:200PX;"/>
        <input type="text"  id="ApellidoM2" name="ApellidoM2" class="inputs" placeholder="Apellido Materno" style="width:200PX;"/>
		<input type="image"  name="buscar" id="buscar" value="Buscar"  src="imgs/search.png" />
    </div>    
        <div style="clear:both;"></div>
       <div style="float:right; padding-right:20px;" id="div2"> 
        <input type="text"  id="curp2" name="curp2" class="inputs" placeholder="CURP" style="width:200PX;"/>
		<input type="image"  name="buscar" id="buscar" value="Buscar"  src="imgs/search.png" />
	</div>

<div id="captura" style="float:left; text-align:left; padding-top:20px; padding-bottom:80px; padding-left:500px;" align="left">
	
    <h3>Datos</h3>

	<p>Nombre</p><input id="Nombre" type="text"  class="inputs" name="Nombre" value="<?php if(isset($data->Nombre)){ echo $data->Nombre; }?>" />
	<p>Apellido Paterno</p><input id="ApellidoP" type="text"  class="inputs" name="ApellidoP"  value="<?php if(isset($data->apellidop)){ echo $data->apellidop; }?>" />
	<p>Apellido Materno</p><input id="ApellidoM" type="text"  class="inputs" name="ApellidoM" value="<?php if(isset($data->apellidom)){ echo $data->apellidom; }?>" />
    <p>Telefono</p><input id="telefono" type="text"  class="inputs" name="telefono" value="<?php if(isset($data->telefono)){ echo $data->telefono; }?>" />
    <p>Fecha de nacimiento</p><input id="fechanac" type="date"  class="inputs" name="fechanac"  value="<?php if(isset($data->fechanac)){ echo  $data->fechanac; }?>"/>
    <p>calle</p><input id="Domicilio" type="text"  class="inputs" name="Domicilio"  value="<?php if(isset($data->domicilio)){ echo  $data->domicilio; }?>"/>
    <p>Numero</p><input id="numero" type="text"  class="inputs" name="numero"  value="<?php if(isset($data->numero)){ echo  $data->numero; }?>"/>
    <p>Codigo Postal</p><input id="cp" type="text"  class="inputs" name="cp"  value="<?php if(isset($data->cp)){ echo  $data->cp; }?>"/>
    <p>Colonia</p><input id="colonia" type="text"  class="inputs" name="colonia"  value="<?php if(isset($data->colonia)){ echo  $data->colonia; }?>"/>
    <p>Clave de Elector</p><input id="claveelector" type="text"  class="inputs" name="claveelector"  value="<?php if(isset($data->claveelector)){ echo $data->claveelector; }?>"/>
    <p>CURP</p><input id="curp"  type="text"  class="inputs" name="curp"  value="<?php if(isset($data->curp)){ echo $data->curp; }?>"/>
   <input id="id"  type="hidden"  class="inputs" name="id"  value="<?php if(isset($data->idCred)){ echo $data->idCred; }?>"/>
    <p>
      <input name="Actualiza" id="Actualiza" type="submit" value="Actualizar"  class="botones"/>
     <!-- <input id="GotoAgain" type="button" value="Volver a Tomar Foto"  class="botones"/>-->

    </p>

</div>
<a style="padding-top:50px; padding-left:50px; float:left;" href="Impresion.php?id=<?php echo $data->idCred.$data->curp; ?>"   target="blank"><img src="imgs/hp_printer.png"></a>
</form>
<div style="clear:both;"></div>
<div id="camaraabajo">
<div id="camara" style="float:left;padding-left:230px; padding-top:40px;">

            

        <article>
            <video  id="video" width="560" height="440" autoplay></video>
            <section>
                <button id="btnStart" class="botones">Iniciar Video</button>
                <button id="btnStop" class="botones">Detener video</button>            
                <button id="btnPhoto" class="botones">Tomar Foto</button>
                <button onClick="Guardar();" class="botones">Guardar</button>
            </section>
        </article>
        
 </div>

 <div id="divcanvas" style="float:left;padding-top:60px; padding-left:50px;"><canvas id="canvas" width="400" height="400" ></canvas></div>
</div>