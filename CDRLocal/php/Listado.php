<script type="text/javascript">
$('document').ready(function(){
});        
</script>
  <style type="text/css">
  .estiloListado{
	list-style: none;
	margin:0px;
	padding:0px;
}

.estiloListado li{
	height:30px;
}

.estiloListado label{
	
	font-weight: normal;
	width:130px;
}
 .listado th{
	background:#09F;
	color:white;
	padding:5px;
	border-radius:5px 5px 0px 0px;
}
.listado tr{
	background:#FFF; 
	}
.odd{
	font-family: 'Tahoma', Helvetica, Arial, Sans-Serif;
	font-size:9px;
	}	
	
/* ----------- Paginacion --------- */
#pagination-digg			 { border:0; margin:20px auto; padding:0;}
#pagination-digg li          { border:0; margin:0; padding:0; font-size:11px; list-style:none;float:left; }
#pagination-digg a           { border:solid 1px #2E2E2E; margin-right:2px; }
#pagination-digg .previous-off,
#pagination-digg .next-off   { border:solid 1px #DEDEDE; color:#424242; display:block; float:left; font-weight:bold; margin-right:2px; padding:3px 4px; }
#pagination-digg .next a,
#pagination-digg .previous a { font-weight:bold; }
#pagination-digg .active     { background:#424242; color:#FFFFFF; font-weight:bold; display:block; float:left; padding:4px 6px;margin-right:2px; }
#pagination-digg a:link,
#pagination-digg a:visited   { color:#00A5D5; display:block; float:left; padding:3px 6px; text-decoration:none; }
#pagination-digg a:hover     { border:solid 1px #00A5D5; }	 
  </style>
<div  id="container" style="padding-left:100px; padding-top:50px;">
<div class='listado'>
	<table style="font-size:12px;">
		<tr>
			<th width='150'>Nombre</th>
			<th width='150'>Fecha de Nacimiento</th>
            <th width='150'>Domicilio</th>
            <th width='150'>Telefono</th>
            <th width='150'>Codigo Postal</th>
            <th width='150'>Colonia</th>
			<th width='150'>Clave de Elector</th>
            <th width='150'>Curp</th>
            <th width='150'>Lugar</th>
            
		</tr>
		<?php
		$consulta = "SELECT * FROM crede";
		$rows_per_page 	= 30;
		if(isset($_GET['pag']))
			$page = mysql_real_escape_string($_GET['pag']);
		else
    		$page = 1;
    	$num_rows 		= mysql_num_rows(mysql_query($consulta));
		$lastpage		= ceil($num_rows / $rows_per_page);

		$page     = (int)$page;
		if($page > $lastpage){
		   	$page = $lastpage;
		}
		if($page < 1){
			$page = 1;
		}

		$limit 		= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
		$consulta  .=" $limit";
		# termina paginador 
		
		$consulta = mysql_query($consulta);
		while($s   = mysql_fetch_object($consulta)){
			
			
			echo "<tr class='odd'>
					
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->Nombre." ".$s->apellidop." ".$s->apellidom."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->fechanac."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->domicilio." ".$s->numero." </td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->telefono."/2014</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->cp."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->colonia."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->claveelector."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->curp."</td>
					<td height='30px' width='200px;' style='font-size:14px;'>".$s->lugar."</td>
				</tr>";
		}
		?>
	</table>
</div>


<?php
# ESTILO DE PAGINACION
if($num_rows != 0){
	$nextpage = $page + 1;
	$prevpage = $page - 1;
		
	echo '<div style="float:right;"><ul id="pagination-digg">';

	if ($page == 1) {
		echo '<li class="previous-off">&laquo; Previous</li>';
		echo '<li class="active">1</li>';
		for($i= $page+1; $i<= $lastpage ; $i++){
			echo '<li><a href="Principal.php?m=Listado&pag='.$i.'">'.$i.'</a></li>';
		}

		if($lastpage >$page ){
      		echo '<li class="next"><a href="Principal.php?m=Listado&pag='.$nextpage.'" >Next &raquo;</a></li>';
		}else{
	  		echo '<li class="next-off">Next &raquo;</li>';
		}
	} else {
		echo '<li class="previous"><a href="Principal.php?m=Listado&pag='.$prevpage.'"  >&laquo; Previous</a></li>';
		for($i= 1; $i<= $lastpage ; $i++){
			if($page == $i){
				echo '<li class="active">'.$i.'</li>';
			} else {
				echo '<li><a href="Principal.php?m=Listado&pag='.$i.'" >'.$i.'</a></li>';
			}
		}
         
	 	if($lastpage >$page ){
	    	echo '<li class="next"><a href="Principal.php?m=Listado&pag='.$nextpage.'">Next &raquo;</a></li>';
		} else {
			echo '<li class="next-off">Next &raquo;</li>';
		}
 	}	  
	echo '</ul></div>';
}
# TERMINA EL ESTILO DE PAGINACION
?>
<br><br><br><br>
</div>