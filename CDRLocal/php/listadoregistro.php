<style type="text/css">
.listado{ width:300px;font: normal 12px/150% Arial, Helvetica, sans-serif;border-radius:6px; } 
.dlistado{ width:75px;font: normal 12px/150% Arial, Helvetica, sans-serif;border-radius:6px;text-align:right } 
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="../css/paginador.css">
<script type="text/javascript" src="../js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>  
<script type="text/javascript" src="../js/Cabin_400.font.js"></script>
<script type="text/javascript" src="../js/tabs.js"></script> 
<script type="text/javascript" src="../js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="../js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="../js/atooltip.jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<body style='background:#FFF;padding-left:25px;min-width:400px;'>
<?php
	@session_start();
	include '../conectar.php';
?>
<link rel="stylesheet" type="text/css" href="../css/paginador.css">
<div class='listado'>
	<table>
    	<tr style=font-size:14px>
        	<th width='50'>Fecha</th>
            <th width='50'>Nombre</th>
			<th width='100'>Concepto</th>
            <th width='100'>Secretaria</th>
            <th width='50'>Costo</th>
            <th width='50'>Descuento</th>
		</tr>
		<?php
		# paginador
			$consulta = "SELECT * FROM registrosc ";
			$rows_per_page 	= 85;
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
			while($c   = mysql_fetch_object($consulta))
			{
				echo "<tr>
					<td><input readonly type='text' class='dlistado' value='".$c->fecha."'></td>	
					<td><input readonly type='text' class='listado' value='".$c->nombre."'></td>
					<td><input type='text' class='listado' value='".$c->concepto."'></td>
					<td><input readonly type='text' class='listado' value='".$c->secretaria."'></td>
					<td><input readonly type='text' class='dlistado' value='".$c->costo."'></td>
					<td><input readonly type='text' class='dlistado' value='".$c->descuento."'></td>
					<td><img src='../imgs/guardar.png'></td>
					<td><img src='../imgs/eliminar.png'></td>
				</tr>";
			}
		?>
	</table>
</div>
<script type="text/javascript">

</script>