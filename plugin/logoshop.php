<?php 
function changeMoveLogo($id_formbang, $type = 'x') {

    $config = [
        // FORM 1
        '1' => [
            'size' => [
                'min'   => 1,
                'max'   => 3.5,
                'step'  => 0.1,
                'value' => 2.5
            ],
            'x' => [
                'min'   => 13,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 16.5
            ],
            'y' => [
                'min'   => 22,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 22.5
            ]
        ],

    ];

    // default
    $default = [
        'min'   => 0,
        'max'   => 31,
        'step'  => 0.1,
        'value' => 15.5
    ];

    $data = $config[$id_formbang][$type] ?? $default;

    return
        'min="'.$data['min'].'" '.
        'max="'.$data['max'].'" '.
        'step="'.$data['step'].'" '.
        'value="'.$data['value'].'"';
}

$id_formbang = $_GET['id_formbang'] ?? '';
?>
<table id="tblogoshop" class="tbplugin" >
	<tr class="titletb">
		<td colspan="6" >
			<span class="sans-serif"><i class="fi-rr-layers"></i> Logo shop</span>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;" class="td_logo" colspan="2" rowspan="2">
			<label class="lbplugin"  for="slider-fill">Icon:</label>
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
		<td colspan="2" style="vertical-align:top;">
			<label class="lbplugin"  for="slider-fill">Size:</label>
			<input type="range" name="slider-iconSize" id="slider-iconSize" value="1" min="0.5" max="2" step="0.05" data-highlight="true" onchange="changeSizeiconbang(this)">  
		</td>
				<td  colspan="2" style="vertical-align:top;">
			<label class="lbplugin" for="slider-fill">Move(x,y):</label>
			<input id="logoshop_x"type="range" name="slider-iconmargin" id="slider-iconmargin_x" value="14" min="4" max="20" step="0.05" data-highlight="true"   onchange="changeMarginiconbang_x(this)">
			<input id="logoshop_y" type="range" name="slider-iconmargin" id="slider-iconmargin" value="4" min="1" max="8" step="0.05" data-highlight="true"   onchange="changeMarginiconbang(this)">
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
// $('svg svg').removeAttr('viewBox');
// $('#logo svg').attr('x', '14');
// $('#logo svg').attr('y', '4');
 function changeicon(obj) {	
	var logoshop_x = document.getElementById('logoshop_x').value;
	var logoshop_y = document.getElementById('logoshop_y').value; 
	var logoshop_size = document.getElementById('slider-iconSize').value;
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
			$('#logo svg').attr('x', logoshop_x);
			$('#logo svg').attr('y', logoshop_y);
			$('#logo path').attr('transform', 'scale('+logoshop_size+')');		
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