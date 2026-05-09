<table id="tblogoshop" class="tbplugin" >
	<tr class="titletb">
		<td colspan="6" >
			<span class="sans-serif"><i class="fi-rr-layers"></i> Logo shop</span>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;" class="td_logo" colspan="2" rowspan="2">
			<select  data-role="none" id="iconshop" style="font-family: TBIGFC;" style="width:200px;"  onchange="changeicon(this);" >	
				 
				<?php 
				$data_icon = $conn->query("SELECT * FROM decor_icon")->fetchAll();
				foreach ($data_icon as $row_icon) {
				$url_svg = "admins/uploads/svg/".$row_icon['Name_icon'].".svg"; 
				?>
				<option data-img_src="<?php echo $url_svg;?>"  value="<?php echo $row_icon['ID_icon'];?>" ><?php echo $row_icon['Name_icon']?></option>	
				<?php } ?>
			</select>
		</td>
		<td width="100%"  colspan="4">
			<label class="lbplugin"  for="slider-fill">Size:</label>
			<input type="range" name="slider-iconSize" id="slider-iconSize" value="1" min="0" max="2" step="0.05" data-highlight="true" onchange="changeSizeiconbang(this)">  
		</td>
	</tr>
	<tr>
		<td  colspan="4">
			<label class="lbplugin" for="slider-fill">Move(x,y):</label>
			<input id="logoshop_x"type="range" name="slider-iconmargin" id="slider-iconmargin_x" value="14" min="0" max="28" step="0.05" data-highlight="true"   onchange="changeMarginiconbang_x(this)">
			<input id="logoshop_y" type="range" name="slider-iconmargin" id="slider-iconmargin" value="4" min="0" max="8" step="0.05" data-highlight="true"   onchange="changeMarginiconbang(this)">
		</td>
	</tr>
</table>

<script>

//Đổi kích thước logo shop---------------
function changeSizeiconbang(n) {
	var s = document.getElementById('logo');
	$('#logo path').attr('transform', 'scale('+n.value+')');	
	$('svg svg').removeAttr('viewBox');
 
	}
//Đổi vị trí logo shop---------------
function changeMarginiconbang(n) {
	$('#logo svg').attr("y", n.value);	 
	}
function changeMarginiconbang_x(n) {
	$('#logo svg').attr("x", n.value);	 
	}	
//Đổi  logo shop---------------
 
	$('svg svg').removeAttr('viewBox');
 
 $('#logo svg').attr('x', '14');
 $('#logo svg').attr('y', '4');
 

 

 function changeicon(obj) {	
	if(obj.value=="0"){ $('#logo svg').attr('viewBox', '');}
	<?php 
		foreach ($data_icon as $row_icon) {
		$url_svg = "admins/uploads/svg/".$row_icon['Name_icon'].".svg";

	?>
	else if(obj.value== <?php echo '"'.$row_icon['ID_icon'].'"';?>){
		var ajax = new XMLHttpRequest();
		ajax.open("GET", <?php echo '"'.$url_svg. '"' ;?>, true);
		ajax.send();
		ajax.onload = function(e) {
		var div = document.getElementById("logo");
		div.innerHTML = ajax.responseText;
		//Đổi  viewBox svg logo shop---------------
			$('#logo svg').removeAttr('viewBox');
			$('#logo svg').attr('x', '14');
			$('#logo svg').attr('y', '4');
		}
	}
	<?php } ?>
 } 
 
 
     function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:30px;    height: 30px;padding: 2px;\"/><p style=\"font-size: 9px;display: none;text-align:center;margin: -2px;\">" + text + "</p></div>");
                return template;
            }
        }
    var options = {
        'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#iconshop').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '100%'}); 
$('.select2-container--default .select2-selection--single').css({'padding-top': '8px'});

	 $('.select2-container').css({'height': '100%'});
	 $('.select2-container').css({'width': '100%'});

 
 </script>