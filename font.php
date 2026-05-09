<?php include 'conn.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TBIG DECOR</title>

 <?php
// lấy tất cả css font
foreach (glob("admins/uploads/cssfont/*.css") as $css) {echo "<link type='text/css' rel='stylesheet' href='$css'>\n";}
?>	
<link rel="stylesheet" href="css/style.css" />	
<link rel="stylesheet" href="css/select2.css" />	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script src="js/select2.js"></script>
<script src="js/svg-export.min.js"></script>	
</head>
<body onLoad="codeAddress()">

<?php include 'plugin/tenshop.php';?>

<hr>
<?php include 'plugin/logoshop.php';?>
<hr>
<div  id="mysvgbox" >


<svg id="mysvg" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
viewBox="0 0 64.95 60.73"
 xmlns:xlink="http://www.w3.org/1999/xlink">
 <?php include("svg_bang/bangdaugau.svg"); ?> 
		 <g id="logo">
			<?php include("admins/uploads/svg/mebe.svg"); ?>
		 </g>
 </svg>
 
 <button id="btn_export_svg"><i class="fi-rr-download"></i> SVG</button>	


 

</div>


<script src="js/svg-export.js"></script>    
</body>