<script type="text/javascript">
window.onload = function() {

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
                context.drawImage(video, 0, 0, 320, 240);
				var canvas = document.getElementById("canvas");
				var img    = canvas.toDataURL("image/jpeg");
				$('#AgregaImagen').append('<img src="'+img+'"/>');


            });
        }
    });
};
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
</style>
	<!--	<div style="height:60px; width:100%; background-image:url(imgs/parallax.png); text-align:center; padding-top:20px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, 		sans-serif; color:#FFFFFF;"><h1 style="font-size:32px;line-height:48px">Inicio</h1></div>
		<section style=" font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;color:#444; padding-top:100px;"><h2>Manos por el Futuro</h2></section>-->
		

<div style="float:left;padding-left:150px; padding-top:40px;">
<header>
            <h1>Foto</h1>
</header>
        <article>
            <video  id="video" width="320" height="200" autoplay></video>
            <section>
                <button id="btnStart">Start video</button>
                <button id="btnStop">Stop video</button>            
                <button id="btnPhoto">Take a photo</button>
            </section>
            <canvas id="canvas" width="320" height="240" style="display:none"></canvas>
            <div id="AgregaImagen"></div>
        </article>
 </div>
 
<form  method="post" enctype="multipart/form-data">
<div style="float:left; text-align:left; padding-top:20px; padding-bottom:80px; padding-left:110px;" align="left">
	<img src="imgs/starHor.png" height="42" alt=""/>
    <h3>Captura de Datos</h3>

	<p>Nombre</p><input type="text"  class="inputs" name="Nombre" />
	<p>Apellido Paterno</p><input type="text"  class="inputs" name="ApellidoP" />
	<p>Apellido Materno</p><input type="text"  class="inputs" name="ApellidoM" />
    <p>Fecha de nacimiento</p><input type="date"  class="inputs" name="fechanac" />
    <p>Domicilio</p><input type="text"  class="inputs" name="Domicilio" />
    <p>Clave de Elector</p><input type="text"  class="inputs" name="claveelector" />
    <p>CURP</p><input type="text"  class="inputs" name="curp" />
   
    <p>
      <input type="submit" value="Guardar"  class="botones"/>
    </p>
    
</div>
</form>