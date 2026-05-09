<?php
function console($data){
    echo '<script>';
    echo 'console.log('.json_encode($data).')';
    echo '</script>';
}
?>
<table  id="tbthongtinlh"class="tbplugin">
   <tr  class="titletb"><td colspan="5"><i class="fi-rr-info"></i>  <span class="sans-serif">Thông tin liên hệ</span>
   <fieldset  data-role="none" style="position: relative;display: contents;background: #f00;">
 <label class="lbplugin2"  for="radio1">1</label>  
<input class="ipradio2"  data-role="none" type="radio" name="radio-choice-b" id="radio1" value="0" checked="checked">
 <label  class="lbplugin2"  for="radio2">2</label>  
<input class="ipradio2"  data-role="none" type="radio" name="radio-choice-b" id="radio2" value="1">
 <label  class="lbplugin2"  for="radio3">3</label>  
<input class="ipradio2"  data-role="none" type="radio" name="radio-choice-b" id="radio3" value="2">
</fieldset>
       <div  id="thongtinlhbt">
	   <select name="slider2" id="thongtinlhicon" data-role="slider" data-mini="true" onchange="changeoficontt(this);">
        <option value="1" >Tắt</option>
        <option value="2" selected="selected">Bật</option>
	</select>
	</div>
   </td></tr>  
  <tr>
    <td class="tdicon"  colspan="1" 
<?= ($_GET['id_formbang'] == "2" || "10") ? 'style="display:none;"' : '' ?>
    >
    <label class="lbplugin"  for="slider-fill">Icon:</label>
    <select style="font-size:28px;font-family: TBIGFC; " onchange="changeIconthongtin(this);" >
	<option   value="1"  selected="selected">`</option>
    <option value="2"  >~</option>
    <option value="3"  >+</option> 
    <option value="4"  >=</option> 
	<option value="5"  ><</option>
    <option value="6"  >></option> 
	<option value="7"  ></option> 
    </select>

</td>
<td <?= ($_GET['id_formbang'] == "2" || "10") ? 'colspan="2"' : 'colspan="1"' ?> >
	<label class="lbplugin"  for="slider-fill">Font chữ:</label>
	<select  id="Fontttshop"  onchange="changeFonttt(this);" >										
	<?php 
	//SELECT sql table decor_font
	$data_font = $conn->query("SELECT * FROM decor_font")->fetchAll();
    console($_GET['id_formbang']);
	foreach ($data_font as $row) {
	?>
	<option style="font-family:<?php echo $row['Name_font'];?>" value="<?php echo $row['ID'];?>"  ><?php echo $row['Name_font']."<br />\n";?></option>	
	<?php }?>
	</select>
</td>
    <td colspan="3">
        <label class="lbplugin"  for="slider-fill">Nội dung:</label>
     <input style="width: 200px;"type="text" id="thongtinlh" value="012 345 6789" oninput="changeThongtin()" >
    </td>
 
  
  </tr>
    <tr>
   
    <td colspan="5">
	<label   class="lbplugin"  for="slider-fill">Size:</label>
    <input id="thongtininput"   class="slider " type="range" name="range-1a" min="0" max="10" value="5" step="0.01" onchange="changeSizethongtin(this);" data-highlight="true"/>
    </td>
  </tr>
    <tr>

    <td colspan="5"> <label class="lbplugin"  for="slider-fill">Move(x,y):</label>
	<input id="vitriinput_x"  class="slider "  type="range" name="range-1a"  min="13" max="53" value="33" step="0.01" onchange="changeMarginthongtin_x(this);" data-highlight="true"/>
	<input id="vitriinput_y"   class="slider "  type="range" name="range-1a" min="23" max="63" value="43" step="0.01" onchange="changeMarginthongtin(this);" data-highlight="true"/>
	</td>
  </tr>

</table>
<div id="control-tt">
<table  id="tbthongtinlh1" class="tbplugin an"><tr class="titletb"><td colspan="5"><i class="fi-rr-info"></i> <span class="sans-serif">Thông tin liên hệ 2</span> 
   </td></tr>  
  <tr>
    <td class="tdicon"  colspan="1">
    <label class="lbplugin"  for="slider-fill">Icon:</label>
    <select style="font-size:28px;font-family: TBIGFC; " onchange="changeIconthongtin1(this);" >
	<option   value="1"  >`</option>
    <option value="2" selected="selected" >~</option>
    <option value="3"  >+</option> 
    <option value="4"  >=</option> 
	<option value="5"  ><</option>
    <option value="6"  >></option> 
	<option value="7"  ></option> 
    </select>

    </td>
    <td colspan="1">
        <label class="lbplugin"  for="slider-fill">Font chữ:</label>
        <select  id="Fontttshop1"  onchange="changeFonttt1(this);" >										
        <?php 
        //SELECT sql table decor_font
        $data_font = $conn->query("SELECT * FROM decor_font")->fetchAll();
        foreach ($data_font as $row) {
        ?>
        <option style="font-family:<?php echo $row['Name_font'];?>" value="<?php echo $row['ID'];?>"  ><?php echo $row['Name_font']."<br />\n";?></option>	
        <?php }?>
        </select>
    </td>
        <td colspan="3">
            <label class="lbplugin"  for="slider-fill">Nội dung:</label>
        <input style="width: 200px;"type="text" id="thongtinlh1" value="Thông tin 2" oninput="changeThongtin1()" >
        </td>
    
    
    </tr>
        <tr>
    
        <td colspan="5">
        <label   class="lbplugin"  for="slider-fill">Size:</label>
        <input id="thongtininput1"   class="slider " type="range" name="range-1a" min="0" max="10" value="5" step="0.01" onchange="changeSizethongtin1(this);" data-highlight="true"/>
        </td>
    </tr>
        <tr>

        <td colspan="5"> <label class="lbplugin"  for="slider-fill">Move(x,y):</label>
        <input id="vitriinput_x1"  class="slider "  type="range" name="range-1a" min="13" max="53" value="33" step="0.01" onchange="changeMarginthongtin_x1(this);" data-highlight="true"/>
        <input id="vitriinput_y1"  class="slider "  type="range" name="range-1a" min="28" max="68" value="48" step="0.01" onchange="changeMarginthongtin1(this);" data-highlight="true"/>
        </td>
    </tr>
</table>
<table  id="tbthongtinlh2" class="tbplugin an"><tr class="titletb"><td colspan="5"><i class="fi-rr-info"></i> <span class="sans-serif">Thông tin liên hệ 3</span> 
   </td></tr>  
  <tr>
    <td class="tdicon"  colspan="1">
    <label class="lbplugin"  for="slider-fill">Icon:</label>
    <select style="font-size:28px;font-family: TBIGFC; " onchange="changeIconthongtin2(this);" >
	<option   value="1"  >`</option>
    <option value="2"  >~</option>
    <option value="3"  selected="selected">+</option> 
    <option value="4"  >=</option> 
	<option value="5"  ><</option>
    <option value="6"  >></option>
	<option value="7"  ></option> 	
    </select>

</td>

<td colspan="1">
	<label class="lbplugin"  for="slider-fill">Font chữ:</label>
	<select  id="Fontttshop2"  onchange="changeFonttt2(this);" >										
	<?php 
	//SELECT sql table decor_font
	$data_font = $conn->query("SELECT * FROM decor_font")->fetchAll();
	foreach ($data_font as $row) {
	?>
	<option style="font-famiiconthongtin1ly:<?php echo $row['Name_font'];?>" value="<?php echo $row['ID'];?>"  ><?php echo $row['Name_font']."<br />\n";?></option>	
	<?php }?>
	</select>
</td>
    <td colspan="3">
    <label class="lbplugin"  for="slider-fill">Nội dung:</label>
    <input style="width: 200px;"type="text" id="thongtinlh2" value="Thông tin 3" oninput="changeThongtin2()" >
    </td>
 
  
  </tr>
    <tr>
   
    <td colspan="5">
	<label   class="lbplugin"  for="slider-fill">Size:</label>
    <input id="thongtininput2"   class="slider " type="range" name="range-1a" min="0" max="10" value="5" step="0.01" onchange="changeSizethongtin2(this);" data-highlight="true"/>
    </td>
  </tr>
    <tr>

    <td colspan="5"> <label class="lbplugin"  for="slider-fill">Move(x,y):</label>
	<input id="vitriinput_x2"  class="slider "  type="range" name="range-1a" min="13" max="53" value="33" step="0.01" onchange="changeMarginthongtin_x2(this);" data-highlight="true"/>
	<input id="vitriinput_y2" class="slider "  type="range" name="range-1a" min="33" max="73" value="53" step="0.01" onchange="changeMarginthongtin2(this);" data-highlight="true"/>
	</td>
  </tr>
</table>
</div>
<script>

// =========================
// KHỞI TẠO
// =========================

let thongtinEnabled = true;


// =========================
// ELEMENT
// =========================

const ttMain  = $('#thongtinm');
const tt1     = $('#thongtin1m');
const tt2     = $('#thongtin2m');

const box1    = $('#tbthongtinlh1');
const box2    = $('#tbthongtinlh2');


// =========================
// UPDATE HIỂN THỊ
// =========================

function updateThongTinDisplay(){

    // OFF -> ẩn toàn bộ
    if(!thongtinEnabled){

        ttMain.hide();
        tt1.hide();
        tt2.hide();

        box1.addClass('an');
        box2.addClass('an');

        return;
    }

    // ON -> hiện thông tin chính
    ttMain.show();

    // lấy radio hiện tại
    let checkedValue =
    $('input[name="radio-choice-b"]:checked').val();

    // reset
    tt1.hide();
    tt2.hide();

    box1.addClass('an');
    box2.addClass('an');

    // =========================
    // THÔNG TIN 2
    // =========================

    if(checkedValue == "1"){

        tt1.show();

        box1.removeClass('an');
    }

    // =========================
    // THÔNG TIN 2 + 3
    // =========================

    else if(checkedValue == "2"){

        tt1.show();
        tt2.show();

        box1.removeClass('an');
        box2.removeClass('an');
    }
}


// =========================
// RADIO CHANGE
// =========================

$('input[name="radio-choice-b"]')
.on('change', function(){

    // nếu OFF -> không cho hiện
    if(!thongtinEnabled){
        return;
    }

    updateThongTinDisplay();
});


// =========================
// BẬT/TẮT THÔNG TIN
// =========================

function changeoficontt(obj){

    thongtinEnabled = (obj.value == "2");

    updateThongTinDisplay();
}


// =========================
// SIZE
// =========================

function changeSizethongtin(n){
    ttMain.css('font-size', n.value + 'px');
}

function changeSizethongtin1(n){
    tt1.css('font-size', n.value + 'px');
}

function changeSizethongtin2(n){
    tt2.css('font-size', n.value + 'px');
}


// =========================
// POSITION Y
// =========================

function changeMarginthongtin(n){
    ttMain.attr('y', n.value);
}

function changeMarginthongtin1(n){
    tt1.attr('y', n.value);
}

function changeMarginthongtin2(n){
    tt2.attr('y', n.value);
}


// =========================
// POSITION X
// =========================

function changeMarginthongtin_x(n){
    ttMain.attr('x', n.value);
}

function changeMarginthongtin_x1(n){
    tt1.attr('x', n.value);
}

function changeMarginthongtin_x2(n){
    tt2.attr('x', n.value);
}


// =========================
// ICON
// =========================

function getThongTinIcon(value){

    switch(value){

        case "1": return "`";
        case "2": return "~";
        case "3": return "+";
        case "4": return "=";
        case "5": return "<";
        case "6": return ">";
        case "7": return "";

        default: return "~";
    }
}


function changeIconthongtin(obj){
    $('#iconthongtin')
    .html(getThongTinIcon(obj.value));
}

function changeIconthongtin1(obj){
    $('#iconthongtin1')
    .html(getThongTinIcon(obj.value));
}

function changeIconthongtin2(obj){
    $('#iconthongtin2')
    .html(getThongTinIcon(obj.value));
}


// =========================
// TEXT
// =========================

function changeThongtin(){
    $('#thongtin')
    .html($('#thongtinlh').val());
}

function changeThongtin1(){
    $('#thongtin1')
    .html($('#thongtinlh1').val());
}

function changeThongtin2(){
    $('#thongtin2')
    .html($('#thongtinlh2').val());
}


// =========================
// FONT
// =========================

function setThongTinFont(target, button, font){

    $(target).css('font-family', font);

    $(button).css('font-family', font);
}


function changeFonttt(obj){

    let font =
    $('#Fontttshop option:selected')
    .css('font-family');

    setThongTinFont(
        '#thongtin',
        '#Fontttshop-button',
        font
    );
}


function changeFonttt1(obj){

    let font =
    $('#Fontttshop1 option:selected')
    .css('font-family');

    setThongTinFont(
        '#thongtin1',
        '#Fontttshop1-button',
        font
    );
}


function changeFonttt2(obj){

    let font =
    $('#Fontttshop2 option:selected')
    .css('font-family');

    setThongTinFont(
        '#thongtin2',
        '#Fontttshop2-button',
        font
    );
}


// =========================
// LOAD VALUE SVG
// =========================

function initThongTinInput(){

    // MAIN
    $('#thongtininput')
    .val(ttMain.attr('font-size'));

    $('#vitriinput_x')
    .val(ttMain.attr('x'));

    $('#vitriinput_y')
    .val(ttMain.attr('y'));

    $('#thongtinlh')
    .val($('#thongtin').text());


    // TT1
    $('#thongtininput1')
    .val(tt1.attr('font-size'));

    $('#vitriinput_x1')
    .val(tt1.attr('x'));

    $('#vitriinput_y1')
    .val(tt1.attr('y'));


    // TT2
    $('#thongtininput2')
    .val(tt2.attr('font-size'));

    $('#vitriinput_x2')
    .val(tt2.attr('x'));

    $('#vitriinput_y2')
    .val(tt2.attr('y'));
}


// =========================
// INIT
// =========================

initThongTinInput();

updateThongTinDisplay();

</script>
