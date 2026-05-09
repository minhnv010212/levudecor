<?php 
include 'header.php';
$id_formbang=$_GET['id_formbang'] ?? '';
if($id_formbang!=""){
$data_formbang = $conn->query("SELECT * FROM decor_formbang WHERE ID_formbang='".$id_formbang."'")->fetchAll();
foreach ($data_formbang as $row_formbang){
?>

<!-- Start of first page -->
<div data-role="page" >
	<div data-role="header">
		<a data-ajax="false"  href="formbang.php" class="ui-btn  ui-corner-all ui-icon-home  ui-btn-icon-notext">Home</a> 
		<h1>FORM DECOR</h1>
	</div>
	
	<!-- /header -->
<div role="main" class="ui-content"> 

	<div class="ui-grid-a  rwd-example">
	<div class="ui-block-a">
		<div class="ui-body ui-body-d">
		
			<div  id="mysvgbox">
	
			<input type="range" name="viewSize" id="viewSize" value="88" min="0" max="88" step="0.01" data-highlight="true" onchange="changeSizeiview(this)">  
		
				<div id="pic">
					<div id="formbang-<?php echo $row_formbang['ID_formbang'] ?>" >
						<svg id="mysvg" class="<?php echo "form-".$row_formbang['tenfile'] ?>" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
							viewBox="0 0 64.95 60.73"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							
								<?php
									include("svg_bang/".$row_formbang['tenfile'].".svg"); 
								?> 
							
						</svg>
					</div>
			  <div id="test"></div><div id="tests"></div>
				 </div>

<script>

var viewbox = document.getElementsByTagName("svg")[1].getAttribute("viewBox");  
document.getElementsByTagName("svg")[0].setAttribute('viewBox', viewbox);
$('svg svg').removeAttr('viewBox');	

</script>
				<button id="btn_export_svg"><i class="fi-rr-download"></i> SVG</button>	
				
			</div>	
			<div class="content"></div>
		</div>
	</div>
	<!-- /block-a -->
	<div class="ui-block-b">
		<div class="ui-body ui-body-d">
			<?php	
								if($row_formbang['listbang']==1){
					include 'plugin/list_bang.php';
				}
				if($row_formbang['logoshop']==1){
					include 'plugin/logoshop.php';
				}

				if($row_formbang['tenshop']==1){
					 include 'plugin/tenshop.php';
				}
				if($row_formbang['slogan']==1){
					 include 'plugin/sloganshop.php';
				}

				if($row_formbang['thongtinlienhe']==1){
					include 'plugin/thongtinlienhe.php';
				}
			 ?>
		</div>
	</div>
	<!-- /block-b -->
	
</div>
<!-- /grid-a -->
 
 
</div>
<!-- /rwd-example -->	
	</div>
	<!-- /content -->

	<div data-role="footer">
		<h4>TBIG DECOR</h4>
	</div>
	<!-- /footer -->
	
	
</div>
<!-- /page -->


<?php }}else{?>
	<div data-role="header">
	<a data-ajax="false"  href="formbang.php" class="ui-btn  ui-corner-all ui-icon-home  ui-btn-icon-notext">Home</a> 
	<h1>FORM DECOR</h1>
	</div> 
<div role="main" class="ui-content">

<ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
<?php $data_formbang = $conn->query("SELECT * FROM decor_formbang")->fetchAll(); 
foreach ($data_formbang as $row_formbang){
		?>
		<li><a data-ajax="false" href="?id_formbang=<?php echo $row_formbang['ID_formbang'] ?>"><img src="img/<?php echo $row_formbang['tenfile'] ?>.png"><h2><?php echo $row_formbang['tenbang'] ?></h2></a></li><?php }?></ul>
 </div>
<?php	
 	
}?>
<?php include 'footer.php';?>