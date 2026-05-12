<?php

function changeMoveSlogan($id_formbang, $type = 'x') {
    $config = [
        // FORM 1
        '1' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 17
            ],
            'y' => [
                'min'   => 5,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 18
            ],

        ],
		// FORM 3
        '3' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 22,
                'step'  => 0.1,
                'value' => 17
            ],
            'y' => [
                'min'   => 7,
                'max'   => 16,
                'step'  => 0.1,
                'value' => 13.2
            ],

        ],
		// FORM 4
        '4' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2.7
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 21
            ],
            'y' => [
                'min'   => 7,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 16.5
            ],

        ],
		// FORM 5
        '5' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 24
            ],
            'y' => [
                'min'   => 3,
                'max'   => 13,
                'step'  => 0.1,
                'value' => 8.5
            ],

        ],
		// FORM 6
        '6' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 14.8
            ],
            'y' => [
                'min'   => 5,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 18
            ],

        ],
		// FORM 7
        '7' => [
            'size' => [
                'min'   => 1,
                'max'   => 4,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 16
            ],
            'y' => [
                'min'   => 4,
                'max'   => 14,
                'step'  => 0.1,
                'value' => 9.5
            ],

        ],
		// FORM 8
        '8' => [
            'size' => [
                'min'   => 1,
                'max'   => 3,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 20.25
            ],
            'y' => [
                'min'   => 2,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 4.25
            ],

        ],
		// FORM 9
        '9' => [
            'size' => [
                'min'   => 1,
                'max'   => 3,
                'step'  => 0.1,
                'value' => 2
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 20.25
            ],
            'y' => [
                'min'   => 2,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 4.25
            ],

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

<table id="tbslogan" class="tbplugin">
	<tr class="titletb">
		<td colspan="7"><i class="fi-rr-edit"></i> Slogan</td>
	</tr>
	<tr>
		<td colspan="7">
			<input type="text" id="sloganshop" value="Thiết kế - gia công bảng hiệu" oninput="changeSlogan()" >
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<label class="lbplugin"  for="slider-fill">Font:</label>
			<select id="Fontslogan" onchange="changeFontslogan(this);" >
			<?php 
				//SELECT sql table decor_font
			foreach ($data_font as $row) {
			?>
				<option style="font-family:<?php echo $row['Name_font'];?>" value="<?php echo $row['ID'];?>"  ><?php echo $row['Name_font']."<br />\n";?></option>	
			<?php }?>
			</select>
		</td>
		<td colspan="2">
			<label class="lbplugin"  for="slider-fill">Phân cách:</label><br>
			<select onchange="gachchan(this);" name="gachchan" id="gachchan " data-role="slider" data-mini="true" >
				<option value="2" >No</option>
				<option value="1" selected="selected">Yes</option>
			</select>
			</td>
		<td colspan="3">
			<label class="lbplugin"  for="slider-fill">Move y:</label>
		<input class="slider" type="range" name="range-1a" id="marginslogan" min="-10" max="10" value="0" step="0.05" onchange="changeMargin_gachchan(this);"  data-highlight="true"/>
		 
		</td>
	</tr>
	<tr>
		<td colspan="7">
			<label class="lbplugin"  for="slider-fill">Size:</label>
			<input id="sloganshopinput" class="slider " type="range" name="range-1a" id="sizeslogan" <?= changeMoveSlogan($id_formbang, 'size') ?> onchange="changeSizeslogan(this);"  data-highlight="true"/>
		</td>
	</tr>
	<tr>
		<td colspan="7">
			<label class="lbplugin"  for="slider-fill">Move (x,y):</label>
			<input id="sloganshop_x" class="slider" type="range" name="range-1a" id="marginslogan_x" <?= changeMoveSlogan($id_formbang, 'x') ?> onchange="changeMarginslogan_x(this);"  data-highlight="true"/>
			<input id="sloganshop_y" class="slider" type="range" name="range-1a" id="marginslogan" <?= changeMoveSlogan($id_formbang, 'y') ?> onchange="changeMarginslogan(this);"  data-highlight="true"/>
		</td>
	</tr>
</table>
<script>
// Lấy giá trị(fontsize, x, y) add vào input control 1
// var sloganshop_size = document.getElementById("slogan").getAttribute("font-size");  
// $('#sloganshopinput').attr('value',sloganshop_size);
// var sloganshop_mins =parseFloat(sloganshop_size)*0;
// var sloganshop_maxs =parseFloat(sloganshop_size)*2;
// $('#sloganshopinput').attr('min',sloganshop_mins);
// $('#sloganshopinput').attr('max',sloganshop_maxs);
// var sloganshop_x = document.getElementById("slogan").getAttribute("x");  
// $('#sloganshop_x').attr('value',sloganshop_x);
// var sloganshop_x_mins =parseFloat(sloganshop_x)*0;
// var sloganshop_x_maxs =parseFloat(sloganshop_x)*2;
// $('#sloganshop_x').attr('min',sloganshop_x_mins);
// $('#sloganshop_x').attr('max',sloganshop_x_maxs);
// var sloganshop_y = document.getElementById("slogan").getAttribute("y");  
// $('#sloganshop_y').attr('value',sloganshop_y);
// var sloganshop_y_mins =parseFloat(sloganshop_y)*0;
// var sloganshop_y_maxs =parseFloat(sloganshop_y)*2;
// $('#sloganshop_y').attr('min',sloganshop_y_mins);
// $('#sloganshop_y').attr('max',sloganshop_y_maxs);

var sloganvalue = $('#slogan').text();
$('#sloganshop').attr('value',sloganvalue);
var phancach = document.getElementById("gachchan").getAttribute("d");  

function changeMargin_gachchan(n) {
     $('#phancach').attr('y', n.value);
	}	
function gachchan(obj) {
	if(obj.value=="2"){
		  $('#gachchan').attr('d','0'); 
	   }else if(obj.value=="1"){
		    $('#gachchan').attr('d',phancach);	
		   }
	}
//Đổi slogan shop---------------
function changeSlogan(value) {
	var x = document.getElementById("sloganshop");
	var slogans = x.value;
    document.getElementById("slogan").innerHTML= slogans;
}
//Đổi font slogan shop---------------
function changeFontslogan(obj){
 	
	if(obj.value=="0"){	} 	
	
	<?php foreach ($data_font as $row) {?>
		else if(obj.value==<?php  echo '"'.$row['ID'].'"' ?>){ 
			
			document.getElementById("slogan").style.fontFamily  = <?php echo '"'.$row['Name_font']. '"' ;?>;
			  document.getElementById("Fontslogan-button").style.fontFamily = <?php echo '"'.$row['Name_font']. '"' ;?>
		}		 		
	<?php } ?>
}
//Đổi size slogan shop---------------
function changeSizeslogan(n) {
    var s = document.getElementById('slogan');
    s.style.fontSize = n.value + 'px'
}
//Đổi vị trí slogan shop---------------
function changeMarginslogan(n) {
    var s = document.getElementById('slogan');
     $('#slogan').attr('y', n.value);
}
function changeMarginslogan_x(n) {
    var s = document.getElementById('slogan');
     $('#slogan').attr('x', n.value);
}



 
 
 

 
</script>