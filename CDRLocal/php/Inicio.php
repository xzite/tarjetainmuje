<script type="text/javascript">
window.onload = function() {
		$('#camara').hide();
		$('#divcanvas').hide();
		$('#guardado').hide();
		$('#siguiente').hide();
		$('#printer').hide();
		
		$('#printer').click(function(){
			var curp = $('#curpC').val();
			var id = $('#id').val();
			
			
			window.open('http://localhost/CDRLocal/Impresion.php?id='+id+curp,'_blank');			
		});
		
		
		$('#buscarr').click(function(){

			var elector = $('#clvelector').val();
			
			
			
			if(elector.length!=18){				
				alert("Favor de verificar La Clave de elector");
				return false;
			}
			
		jQuery.post("php/BuscaElector.php", {
								elector:elector
					
							}, function(data, textStatus){
								console.log(data);
								var datos = JSON.parse(data);
								for(var i in datos){
									
									
									$("#Nombre").val(datos[i].Nombre);
									$("#ApellidoP").val(datos[i].Paterno);
									$("#ApellidoM").val(datos[i].Materno);
									$("#Domicilio2").val(datos[i].Calle);
									$("#numero2").val(datos[i].Num_Ext+datos[i].Num_Int);
									$("#colonia").val(datos[i].Colonia);
									$("#cp").val(datos[i].CP);
									$("#claveelector").val(datos[i].ClaveElector);
									var nom=$("#Nombre").val();
									
									if (nom!=""){
										var padron="1";

										$("#padron").val(padron);
									 }
									
									
								}
							}
		);
		
			
			
			
		});
		
		$('#Siguiente').click(function(){
			if($("#curp").val().length < 1) {  
	        		alert("DEBE CAPTURAR EL CURP");  
			        return false;  
		}
		if($("#Domicilio").val().length < 1) {  

	        		alert("DEBE CAPTURAR EL DOMICILIO ACTUAL");  

			        return false;  

			}
			if($("#claveelector").val().length != 18) { 		
				alert("Favor de verificar La Clave de elector");
				return false;
			}
		
		var curp=$('#curp').val();
		jQuery.post("php/busca.php", {
						curp:curp
						
						
					}, function(data, textStatus){
						$('#respuesta').val(data);
						
						var resp=$('#respuesta').val();
						
						/*if(resp=="no"){*/
								if($("#Nombre").val().length < 1 && $("#ApellidoP").val().length < 1) {  
					        		alert("Faltan Campos por Capturar");  
							        return false;  
						    	}else { 
    

			
								$('#respuesta').hide();

								$('#NombreC').val($('#Nombre').val());

								$('#ApellidoPC').val($('#ApellidoP').val());

								$('#ApellidoMC').val($('#ApellidoM').val());

								$('#fechanacC').val($('#fechanac').val());

								$('#DomicilioC').val($('#Domicilio').val());

								$('#numeroC').val($('#numero').val());

								$('#DomicilioC2').val($('#Domicilio2').val());

								$('#numeroC2').val($('#numero2').val());

								$('#cpC').val($('#cp').val());

								$('#coloniaC').val($('#colonia').val());

								$('#claveelectorC').val($('#claveelector').val());

								$('#curpC').val($('#curp').val());

								$('#telefonoC').val($('#telefono').val());

								$('#lugarC').val($('#lugar').val());
								
								$('#correoC').val($('#correo').val());

			
			
			
								var Nombre = $('#NombreC').val();

								var apellidop=$('#ApellidoPC').val();

								var apellidom=$('#ApellidoMC').val();

								var fechanac=$('#fechanacC').val();

								var domicilio=$('#DomicilioC').val();

								var domicilio2=$('#DomicilioC2').val();

								var numero=$('#numeroC').val();

								var numero2=$('#numeroC2').val();

								var cp=$('#cpC').val();

								var colonia=$('#coloniaC').val();

								var claveelector=$('#claveelectorC').val();

								var curp=$('#curpC').val();

								var telefono=$('#telefonoC').val();

								var lugar=$('#lugarC').val();
								
								var padron=$('#padron').val();
								
								var correo=$('#correo').val();
								

						
								jQuery.post("php/procesar.php", {
								Nombre:Nombre,

								apellidop:apellidop,

								apellidom:apellidom,

								fechanac:fechanac,

								domicilio:domicilio,

								numero:numero,

								domicilio2:domicilio2,

								numero2:numero2,

								cp:cp,

								colonia:colonia,

								claveelector:claveelector,

								curp:curp,

								telefono:telefono,

								lugar:lugar,
								
								padron:padron,
								
								correo:correo

						
						
								}, function(data, textStatus){
						
									$('#id').val(data);
									
						
								});
			
			
								$('#captura').fadeOut('slow');
								$('#camara').toggle('slow');
								$('#divcanvas').toggle('slow');
			
						}
						/*}else{
							$('#respuesta').val("La Persona ya Fue Capturada Anteriormente");
							alert("La Persona ya esta Registrada");
						}*/
						
					});
		

   		 
			
			
			
			
			
		  });
    //Compatibility
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;

    var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        btnStart = document.getElementById("btnStart"),
        btnStop = document.getElementById("btnStop"),
        btnPhoto = document.getElementById("btnPhoto"),
        videoObj = {
            video: true,
            audio: false
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
};
function Guardar(){
var id=$('#id').val();
var Nombre=$('#Nombre').val();
var curp=$('#curpC').val();



var data = document.getElementById("canvas").toDataURL();

$.post("saveImage.php", {
	imageData : data, Nombre:Nombre, id:id, curp:curp
}, function(data) {
	$('#guardado').fadeIn('fast');
	$('#printer').fadeIn("slow");
	
});
	}
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
	<!--	<div style="height:60px; width:100%; background-image:url(imgs/parallax.png); text-align:center; padding-top:20px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, 		sans-serif; color:#FFFFFF;"><h1 style="font-size:32px;line-height:48px">Inicio</h1></div>
		<section style=" font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#444; padding-top:100px;"><h2>Manos por el Futuro</h2></section>-->
<header>		
<!--<h1>Manos por el Futuro</h1>-->
</header>
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

 <div id="divcanvas" style="float:left;padding-top:60px; padding-left:50px;"><canvas id="canvas" width="400" height="400" ></canvas><input type="button" id="printer" value="Imprimir" class="botones" /></div>
 <div style="clear:both;"></div>
 <div id="guardado" class="correcto"><b>Datos Guardados con Exito.</b></div>
<form  method="post" enctype="multipart/form-data">
<div id="captura" style="float:left; text-align:left; padding-top:20px; padding-bottom:80px; padding-left:500px;" align="left">
<div style="float:left; padding-right:20px;" id="div2"> 
        <input type="text"  id="clvelector" name="clvelector" class="inputs" placeholder="CLAVE DE ELECTOR" style="width:600px;"/>
		<input type="button"  name="buscarr" id="buscarr" value="Buscar"  src="imgs/search.png" />
	</div>
    <br>
	<img src="imgs/starHor.png" height="42" alt=""/>
    <h3>Captura de Datos</h3>

	<p>Nombre</p><input id="Nombre" type="text"  class="inputs" name="Nombre" />
	<p>Apellido Paterno</p><input id="ApellidoP" type="text"  class="inputs" name="ApellidoP" />
	<p>Apellido Materno</p><input id="ApellidoM" type="text"  class="inputs" name="ApellidoM" />
    <p>Telefono</p><input id="telefono" type="text"  class="inputs" name="telefono" />
    <p>Fecha de nacimiento</p><input id="fechanac" type="date"  class="inputs" name="fechanac"  value="1960-01-01"/>
    <p>Calle(Domicilio Actual)</p><p style="color:rgba(239,23,23,1.00);">Si es el Mismo de la del Elector Copien y Pegen en este Campo. Gracias!!</p><input id="Domicilio" type="text"  class="inputs" name="Domicilio" />

    <p>Numero</p><input id="numero" type="text"  class="inputs" name="Numero"  />

    

    <p>Calle(Domicilio Elector)</p><input id="Domicilio2" type="text"  class="inputs" name="Domicilio2" />

    <p>Numero</p><input id="numero2" type="text"  class="inputs" name="Numero2" />

    <p>Codigo Postal</p><input id="cp" type="text"  class="inputs" name="cp" />
    <p>Colonia</p><input id="colonia" type="text"  class="inputs" name="colonia" />
    <p>Clave de Elector</p><input id="claveelector" type="text"  class="inputs" name="claveelector" />
    <p>CURP</p><input id="curp"  type="text"  class="inputs" name="curp" />
	<p>correo</p><input id="correo"  type="text"  class="inputs" name="correo" />
    <p>
    <p>LUGAR</p>
    <select name="lugar" id="lugar" class="inputs">
	  <option value="TARJETACAMBIO">TARJETA DE CAMBIO</option>
      <option value="IMJUVE">IMJUVE</option>
      <option value="GIMNASIO">GIMNASIO</option>
      <option value="PG">PUBLICO EN GENERAL</option>
      <option value="DEM">DEPORTISTA ESCUELA MUNICIPAL</option>
      <option value="DAR">DEPORTISTA ALTO RENDIMIENTO</option>
      <option value="EM">EMPLEADOS MUNICIPALES</option>
      <option value="BPE">BOXEADOR PROFESIONAL Y EXTERNOS</option>
      <option value="BA">BOXEADOR AMATEUR</option>
      <option value="OTRO">OTRO</option>
   </select>
     <div style="clear:both"></div>
	   
      <input id="Siguiente" type="button" value="Siguiente"  class="botones"/>
    </p>

</div>

<input id="NombreC" type="hidden"  class="inputs" name="Nombre" />

<input id="ApellidoPC" type="hidden"  class="inputs" name="ApellidoPC" />

<input id="ApellidoMC" type="hidden"  class="inputs" name="ApellidoMC" />

<input id="fechanacC" type="hidden"  class="inputs" name="fechanacC" />

<input id="DomicilioC" type="hidden"  class="inputs" name="DomicilioC" />

<input id="numeroC" type="hidden"  class="inputs" name="numeroC" />

<input id="DomicilioC2" type="hidden"  class="inputs" name="DomicilioC2" />

<input id="numeroC2" type="hidden"  class="inputs" name="numeroC2" />

<input id="cpC" type="hidden"  class="inputs" name="cpC" />

<input id="coloniaC" type="hidden"  class="inputs" name="coloniaC" />

<input id="claveelectorC" type="hidden"  class="inputs" name="claveelectorC" />

<input id="curpC" type="hidden"  class="inputs" name="curp" />

<input id="id" type="hidden"  class="inputs" name="id" />

<input id="telefonoC" type="hidden"  class="inputs" name="telefonoC" />

<input id="lugarC" type="hidden"  class="inputs" name="lugarC" />

<input id="correoC" type="hidden"  class="inputs" name="correoC" />

<input id="respuesta" type="hidden"  class="inputs" name="respuesta" />

<input id="padron" type="hidden"  class="inputs" name="padron" />
</form>

