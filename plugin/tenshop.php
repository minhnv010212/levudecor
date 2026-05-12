<?php

function changeMoveTenShop($id_formbang, $type = 'x') {
    $config = [
        // FORM 1
        '1' => [
            'size' => [
                'min'   => 1,
                'max'   => 10,
                'step'  => 0.1,
                'value' => 5
            ],
            'x' => [
                'min'   => 10,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 17
            ],
            'y' => [
                'min'   => 10,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 15
            ],

        ],
		// FORM 3
        '3' => [
            'size' => [
                'min'   => 1,
                'max'   => 7,
                'step'  => 0.1,
                'value' => 4.5
            ],
            'x' => [
                'min'   => 10,
                'max'   => 22,
                'step'  => 0.1,
                'value' => 17
            ],
            'y' => [
                'min'   => 7,
                'max'   => 11,
                'step'  => 0.1,
                'value' => 10.5
            ],

        ],
		// FORM 4
        '4' => [
            'size' => [
                'min'   => 1,
                'max'   => 7,
                'step'  => 0.1,
                'value' => 4.5
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 21
            ],
            'y' => [
                'min'   => 7,
                'max'   => 14,
                'step'  => 0.1,
                'value' => 13.5
            ],

        ],
		// FORM 5
        '5' => [
            'size' => [
                'min'   => 1,
                'max'   => 7,
                'step'  => 0.1,
                'value' => 3.8
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
                'value' => 6
            ],

        ],
		// FORM 6
        '6' => [
            'size' => [
                'min'   => 1,
                'max'   => 7,
                'step'  => 0.1,
                'value' => 5
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
                'value' => 15
            ],

        ],
		// FORM 7
        '7' => [
            'size' => [
                'min'   => 1,
                'max'   => 7,
                'step'  => 0.1,
                'value' => 5
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
                'value' => 7
            ],

        ],
		// FORM 8
        '8' => [
            'size' => [
                'min'   => 5,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 14
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 20
            ],
            'y' => [
                'min'   => 12,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 16
            ],

        ],
		// FORM 9
        '9' => [
            'size' => [
                'min'   => 5,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 14
            ],
            'x' => [
                'min'   => 10,
                'max'   => 30,
                'step'  => 0.1,
                'value' => 20
            ],
            'y' => [
                'min'   => 12,
                'max'   => 20,
                'step'  => 0.1,
                'value' => 16
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

<table  id="tbtenshop" class="tbplugin" >
							<tr class="titletb">
								<td colspan="6"></i>Tên shop</td>
							</tr>
							<td colspan="6">
									<input type="text" id="titleshop" value="Levu Shop" oninput="changeTitle()" >
									 
								</td>
							 
							<tr>
								
								<td colspan="2">
								<label class="lbplugin"  for="slider-fill">Quy cách:</label><br>
									<select name="slider2" id="shadow" data-role="slider" data-mini="true" onchange="changeShadow(this);">
									    <option value="off" selected="selected">Khắc</option>
									    <option value="on"  >Nổi</option>
									</select>
								</td>
								<td colspan="2">
								<label class="lbplugin"  for="slider-fill">Màu:</label><br>
									<select name="slider-flip-m" id="color" data-role="slider" data-mini="true" onchange="changeBackground(this);">
									    <option value="red">Đỏ</option>
									    <option value="black" selected="selected">Đen</option>
									</select>

							 
								</td>
								<td colspan="2">
								<label class="lbplugin"  for="slider-fill">Font:</label>
									<select  id="fonttenshop"  onchange="changeFonttitle(this);" >										
										<?php 
										//SELECT sql table decor_font
										$data_font = $conn->query("SELECT * FROM decor_font")->fetchAll();
										foreach ($data_font as $row) {
										?>
										<option style="font-family:<?php echo $row['Name_font'];?>" value="<?php echo $row['ID'];?>"  ><?php echo $row['Name_font'];?></option>	
										<?php }?>
									</select>
								</td>
								
							</tr>
							<tr>
							 
								<td colspan="6">
								<label   class="lbplugin"  for="slider-fill">Size:</label>
									<input  id="tenshopinput"  class="slider "  type="range" name="range-1a" id="sel1" <?= changeMoveTenShop($id_formbang, 'size') ?> data-highlight="true" onchange="changeSizetitle(this);" > 
								</td>
							</tr>
							<tr>
								 
								<td colspan="6">
								<label class="lbplugin"  for="slider-fill">Move(x,y):</label>
									<input id="tenshop_x" class="slider " type="range" name="range-1a" id="margin" <?= changeMoveTenShop($id_formbang, 'x') ?> data-highlight="true" onchange="changeMargintitle_x(this);">
									<input id="tenshop_y" class="slider " type="range" name="range-1a" id="margin" <?= changeMoveTenShop($id_formbang, 'y') ?> data-highlight="true" onchange="changeMargintitle(this);"> 
									 
								</td>
							</tr>
						</table>



	

														
<script>
// Lấy giá trị(fontsize, x, y) add vào input control 1
// var tenshop_size = document.getElementById("tenshop").getAttribute("font-size");  
// $('#tenshopinput').attr('value',tenshop_size);
// var tenshop_mins =parseFloat(tenshop_size)*0;
// var tenshop_maxs =parseFloat(tenshop_size)*2;
// $('#tenshopinput').attr('min',tenshop_mins);
// $('#tenshopinput').attr('max',tenshop_maxs);
// var tenshop_x = document.getElementById("tenshop").getAttribute("x");  
// $('#tenshop_x').attr('value',tenshop_x);
// var tenshop_x_mins =parseFloat(tenshop_x)*0;
// var tenshop_x_maxs =parseFloat(tenshop_x)*2;
// $('#tenshop_x').attr('min',tenshop_x_mins);
// $('#tenshop_x').attr('max',tenshop_x_maxs);
// var tenshop_y = document.getElementById("tenshop").getAttribute("y");  
// $('#tenshop_y').attr('value',tenshop_y);
// var tenshop_y_mins =parseFloat(tenshop_y)*0;
// var tenshop_y_maxs =parseFloat(tenshop_y)*2;
// $('#tenshop_y').attr('min',tenshop_y_mins);
// $('#tenshop_y').attr('max',tenshop_y_maxs);
// var tenshopvalue = $('#tenshop').text();
// $('#titleshop').attr('value',tenshopvalue);

// console.log(document.getElementById("tenshop").textContent);
document.getElementById("titleshop").value = document.getElementById("tenshop").textContent

//Đổi màu tên shop---------------
function changeBackground(obj) {
    document.getElementById("tenshop").style.fill = obj.value;
}
//Đổi quy cách tên shop---------------
function changeShadow(obj) {
	if(obj.value=="on"){
		document.getElementById("tenshop").style.textShadow = "0.03em 0.03em #5d5d5d";} 
	else if(obj.value=="off"){
		document.getElementById("tenshop").style.textShadow = "none";}
}
//Đổi font tên shop---------------
function changeFonttitle(obj){
 	
	if(obj.value=="0"){	} 	
	
	<?php foreach ($data_font as $row) {?>
		else if(obj.value==<?php  echo '"'.$row['ID'].'"' ?>){ 
			
		 document.getElementById("tenshop").style.fontFamily  = <?php echo '"'.$row['Name_font']. '"' ;?>;
		 document.getElementById("fonttenshop-button").style.fontFamily = <?php echo '"'.$row['Name_font']. '"' ;?>; 
		}		 		
	<?php } ?>
}

//Đổi kích thước tên shop---------------
function changeSizetitle(n) {
    var s = document.getElementById('tenshop');
    s.style.fontSize = n.value + 'px'

}
//Đổi vị trí tên shop---------------

function changeMargintitle(n) {
    var s = document.getElementById('tenshop');
     s.setAttribute('y', n.value);
	 
}
function changeMargintitle_x(n) {
    var s = document.getElementById('tenshop');
     s.setAttribute('x', n.value);
	 
}
function changeTitle(value) {
	var x = document.getElementById("titleshop");
	var titleshop = x.value;
    document.getElementById("tenshop").innerHTML= titleshop;

}

 
 </script>