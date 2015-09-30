<?php 

require('fpdf/fpdf.php');
 include('barcode/php-barcode.php');
include("conectar.php");

if ( isset($_GET['id']) ){
	$id=$_GET['id'];
	
}
class PDF extends FPDF
{
	function Header()
	{
$servidorMysql = "localhost";
$usuarioMysql  = "root";
$passwordMysql = "";
$basededatos   = "nlsystem_system";
		mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
		mysql_select_db($basededatos);	
		
		if ( isset($_GET['id']) ){
			$id=$_GET['id'];
	
		}
		
		$row4 = mysql_fetch_array($result4=mysql_query("select foto from imagenesc where id='".$id."'"));
		$foto = $row4['foto'];
		
		$this->Image($foto,2,5,30,40);

	}
	 function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0) 
    { 
        $font_angle+=90+$txt_angle; 
        $txt_angle*=M_PI/180; 
        $font_angle*=M_PI/180; 
     
        $txt_dx=cos($txt_angle); 
        $txt_dy=sin($txt_angle); 
        $font_dx=cos($font_angle); 
        $font_dy=sin($font_angle); 
     
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt)); 
        if ($this->ColorFlag) 
            $s='q '.$this->TextColor.' '.$s.' Q'; 
        $this->_out($s); 
    }
}

    
 
//Create new pdf file
#$pdf=new PDF('L','mm',array(215.9,355.6));
$pdf=new PDF('L','mm',array(86,54));
#$pdf->AddFont('CaviarDreams','','CaviarDreams.php');
$pdf->AliasNbPages();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page

$pdf->AddPage('L',array(85.6,54));
#$pdf->AddPage('L',array(215.9,355.6));

//print column titles for the actual page


$row = mysql_fetch_array($result=mysql_query("select Nombre,apellidop,apellidom,fechanac,domicilio,claveelector,curp,numero from crede where folio='".$id."'"));

		
	

		 $Nombre = utf8_decode($row['Nombre']);
		 $ApellidoP = utf8_decode($row['apellidop']);
		 $ApellidoM = utf8_decode($row['apellidom']);
		 $Domicilio = utf8_decode($row['domicilio']);
		 $numero = utf8_decode($row['numero']);
		 $curp = utf8_decode($row['curp']);
		 
		 $NombreCompleto=$Nombre." ".$ApellidoP." ".$ApellidoM;
	  	  

	   $pdf->SetFont('Arial', '', 9);	   
	   $pdf->Text(18, 45, $NombreCompleto);
	   $pdf->Text(18, 51, $Domicilio." ".$numero);

	

	$conca=substr($id,2,4);
#	$conca=$id.$parte;

   $totalCaracteres= strlen($conca);

 

  $fontSize = 7; 
  $marge    = 0.7;   // between barcode and hri in pixel 
  $x        = 56.2;  // barcode center 
  $y        = 35.5;  // barcode center 
  $height   = 6.0;   // barcode height in 1D ; module size in 2D 
  $width    = 0.50;    // barcode height in 1D ; not use in 2D 
  $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation 
  
  if($totalCaracteres=6){ 
	  $code     ="00".(string)$conca; // barcode, of course ;) 
  }
  if($totalCaracteres=7){ 
	  $code     ="0".(string)$conca; // barcode, of course ;) 
  }
  if($totalCaracteres=8){ 
	  $code     =$conca; // barcode, of course ;) 
  } 
  
  
  $row = mysql_fetch_array($result=mysql_query("select code from crede where code='".$conca."'"));
  $validaCodigo = "";
  
  if($validaCodigo==""){
	  mysql_query("UPDATE crede SET code='".$code."' where idCred=".$id."");
  }else{

  }
  
  $type     = 'code128'; 
  $black    = '000000'; // color in hexa 
   
   
  // -------------------------------------------------- // 
  //            ALLOCATE FPDF RESSOURCE 
  // -------------------------------------------------- // 
 
  // -------------------------------------------------- // 
  //                      BARCODE 
  // -------------------------------------------------- // 
   
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height); 
   
  // -------------------------------------------------- // 
  //                      HRI 
  // -------------------------------------------------- // 
   
  $pdf->SetFont('Arial','B',$fontSize); 
  $pdf->SetTextColor(0, 0, 0); 
  $len = $pdf->GetStringWidth($data['hri']); 
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt); 
  $pdf->TextWithRotation(50, $y + 5, $data['hri'], $angle); 

//Create file
$pdf->Output();
?>