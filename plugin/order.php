<?php
include '../conn.php';

 function vn_str_filter ($str){
 
       $unicode = array(
 
           'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
           'd'=>'đ',
 
           'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
           'i'=>'í|ì|ỉ|ĩ|ị',
 
           'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
           'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
           'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
           'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
           'D'=>'Đ',
 
           'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
           'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
           'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
           'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
           'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
       );
 
      foreach($unicode as $nonUnicode=>$uni){
 
           $str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
      }
 
       return $str;
 
   }
   
   
 if(isset($_GET['xacnhandon'])){
$work_id=$_GET['work_id'];
$dvvc=$_GET['dvvc'];
if($dvvc==1  ){
	$sql = "UPDATE Work SET work_tt='1', work_ttn='1' WHERE work_id = '$work_id'";
}else{
	$sql = "UPDATE Work SET work_tt='1', work_ttn='0' WHERE work_id = '$work_id'";
}



$affectedRows = $conn->exec($sql);
header('Refresh: 0; URL = ../work.php');
 }
 
 
if(isset($_POST['lendon'])){
	
$masp=$_POST['masp'];
 $soluong=implode(",",$_POST['person']['soluong']);
 $size=implode(",",$_POST['person']['size']); 
$tensp=implode(",",$_POST['person']['tensp']);
$tiendo=implode(",",$_POST['person']['tiendo']);  
$cod=$_POST['cod'] ;
$dvvc=$_POST['dvvc'] ;
if($dvvc==1){
	$work_priority=1;
}else{
	$work_priority=0;
}
$ship=$_POST['ship'] ;
$coso=$_POST['coso'] ;	
$tendon=$_POST['tendon'] ;	
$sdtdon=$_POST['sdtdon'] ;	
$dcdon=$_POST['dcdon'] ;	
$userdon=$_POST['userdon'] ;	
$note=$_POST['note'] ;
$kytumd=vn_str_filter($tendon);
$kytumd=explode(' ',$kytumd);
$kytumd1=substr($kytumd[0],0,1);
$kytumd2=substr($kytumd[1],0,1);
$kytumd3=substr($kytumd[2],0,1);
$madon=strtoupper($kytumd1).strtoupper($kytumd2).strtoupper($kytumd3).'-'.date('dm').$userdon.$coso;		
$today = date("Y-m-d H:i:s");
$todayorder = date("d/m/Y H:i:s");
$soluongar=explode(',',$soluong);
$tenspss=implode("#",$_POST['person']['tensp']); 
$tenspar=explode('#',$tenspss);
$i=0;
$items = array();
$countsp=count($tenspar);



 
if($dvvc==1){
$dvvc_logo="<span style='padding-left: 10px; font-weight: bold;font-size: x-large;'> Hỏa tốc </span>"	;
}else if($dvvc==2){
$dvvc_logo="<img style='height: 30px;;margin-left: 10px;position: absolute;top: 6px;' src='logoshopee.png'/>";
}else if($dvvc==3){
$dvvc_logo="<img style='height: 30px;;margin-left: 10px;position: absolute;top: 6px;' src='logolazada.png'/>";	
}else if($dvvc==4){
	$dvvc_logo=" ";
} 
foreach ($tenspar as $key=>$item){ 
$s=$i+1;

if($i<=12){
if(strlen($tenspar[$i])>=60){
	if($i==12){
		$items[] = "<div class='listsp' >".$s.", ...............................<span style='font-size: 10px;'>(sản phẩm ẩn bớt do danh sách quá dài)<span>"."</div>";	
	}
	else{		
		$items[] = "<div class='listsp' >".$s.". ".substr($item,0,60).'...'." x".$soluongar[$i]."</div>";
	}
}else{
	if($i==12){	
		$items[] = "<div class='listsp' >".$s.", ...............................<span style='font-size: 10px;'>(sản phẩm ẩn bớt do danh sách quá dài)<span>"."</div>";	
	}else{
		$items[] = "<div class='listsp' >".$s.". ".$item." x".$soluongar[$i]."</div>";	
	}
}
}
$i++;
}
$thongtinsp=implode(' ',$items);

	$filename = $_FILES['filepdf']['name'];
	$filecat_yc=$_FILES['filecat_yc']['name'];
	$filedemo_yc=$_FILES['filedemo_yc']['name'];
	$chuoi_tim=array(".pdf");
	$chuoi_tim_yc=array(".cdr");
	$chuoi_tim_demoyc=array(".jpg");
	$chuoi_thay_the="";
	$namefile = str_replace($chuoi_tim, $chuoi_thay_the, $filename);
	$namefile_yc = str_replace($chuoi_tim_yc, $chuoi_thay_the, $filecat_yc);
	$namefiledemo_yc = str_replace($chuoi_tim_demoyc, $chuoi_thay_the, $filedemo_yc);
	
	$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["filepdf"]["name"]));
	
	if($_FILES["filecat_yc"]["name"]!=""){
	$newfilename_yc= date('dmYHis').'-'.str_replace(" ", "", basename($_FILES["filecat_yc"]["name"]));
	}
	else{$newfilename_yc= "";}
	
	
	if($_FILES["filedemo_yc"]["name"]!=""){
	$newfiledemo_yc= date('dmYHis').'-'.str_replace(" ", "", basename($_FILES["filedemo_yc"]["name"]));
	}
	else{$newfiledemo_yc= "";}
	
	
	
	$location = '../uploads/pdf/'.$newfilename;
	$location_yc = '../uploads/filecatyc/'.$newfilename_yc;
	$location_demoyc = '../uploads/images/thumb/'.$newfiledemo_yc;
	$file_extension = pathinfo($location, PATHINFO_EXTENSION);
	$file_extension_yc = pathinfo($location_yc, PATHINFO_EXTENSION);
	$file_extension_demoyc = pathinfo($location_demoyc, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);
	$file_extension_yc = strtolower($file_extension_yc);
	$file_extension_demoyc = strtolower($file_extension_demoyc);
	//cho up với định dạng đuôi svg
	$valid_ext = array("pdf");
	$valid_ext_yc = array("jpg","cdr","rar","zip","svg","ai");
	$valid_ext_demoyc = array("jpg","cdr","rar","zip","svg","ai");
	$response = 0;
	$response_yc = 0;
	$response_demoyc = 0;
if($file_extension == "pdf" ) {
	
	$file = $_FILES['filepdf']['tmp_name'];	
	
	
	if(in_array($file_extension_yc,$valid_ext_yc)) {
		$file_yc = $_FILES['filecat_yc']['tmp_name'];
		move_uploaded_file($file_yc, $location_yc);
		 
	}else{$newfilename_yc= "";}
	
	 
	if(in_array($file_extension_demoyc,$valid_ext_demoyc)) {
		 
		$file_demoyc = $_FILES['filedemo_yc']['tmp_name'];	
		move_uploaded_file($file_demoyc, $location_demoyc);
	}else{$newfiledemo_yc= "";} 
	
	 

	 
		if(move_uploaded_file($file, $location)){
				 "Tập tin <span style='color:#4caf50;font-weight: bold;'>".$_FILES['filepdf']['name']."</span> update thành công<br>";
				$response = 1;
				// up tên font lên CSDL
				$query = "INSERT INTO `Work`  (`work_id`, `work_madon`, `work_sp`, `work_sl`, `work_tt`, `work_note`, `work_thuoctinh`, `work_tendon`, `work_phone`, `work_address`, `work_user`, `work_tiendo`, `work_filepdf`, `work_coso`, `work_dvvc`, `work_filecat`, `work_filedemo`, `work_priority`,`work_phiship`)  VALUES (NULL, '".$madon."', '".$masp."', '".$soluong."', '0', '".$note."', '".$size."', '".$tendon."', '".$sdtdon."', '".$dcdon."', '".$userdon."', '".$tiendo."', '".$newfilename."', '".$coso."', '".$dvvc."', '".$newfilename_yc."', '".$newfiledemo_yc."', '".$work_priority."', '".$ship."')";
				$conn->exec($query);
				header('Refresh: 0; URL = ../work.php');
 
				
			}else{
					 
						header('Refresh: 2; URL = ../work.php');
			}		
		
	 
}else{
	
	
	
		$i = 1;
		while($i <= 10) {
			$madon=strtoupper($kytumd1).strtoupper($kytumd2).strtoupper($kytumd3).$i.'-'.date('dm').$userdon.$coso;	
			$datawork = $conn->query("SELECT * FROM Work WHERE work_madon='$madon'");
			$count_work = $datawork ->rowCount();
			
$url = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://quanly.tbigshop.com/donkhach.php?madon='.$madon;
$img = 'qrcode/'.$madon.'.png';
file_put_contents($img, file_get_contents($url));			
			
			 $noidungpdf='
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="../css/uicons-regular-rounded.css" rel="stylesheet" />

<style>
.listsp{text-indent: 1px;border-bottom: 1px dashed #bdbdbd;padding: 2px;font-size: 11.5px;}
.listsp:last-child {border-bottom: 0px dashed #bdbdbd;}
@page { margin: 8px 10px 2px 10px; font-family: DejaVu Sans, sans-serif; }
body { margin: 8px 10px 2px 10px; }
@font-face {
    font-family: "UTMAvo";
    src: url("font/UTM Avo.eot"); /* IE9 Compat Modes */
    src: url("font/UTM Avo.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
         url("font/UTM Avo.woff") format("woff"), /* Modern Browsers */
         url("font/UTM Avo.woff2") format("woff2"), /* Modern Browsers */
         url("font/UTM Avo.ttf") format("truetype"); /* Safari, Android, iOS */
             font-style: normal;
    font-weight: normal;
    text-rendering: optimizeLegibility;
}
@font-face {
    font-family: "UTMAvo";
    src: url("font/UTM AvoBold.eot"); /* IE9 Compat Modes */
    src: url("font/UTM AvoBold.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
         url("font/UTM AvoBold.woff") format("woff"), /* Modern Browsers */
         url("font/UTM AvoBold.woff2") format("woff2"), /* Modern Browsers */
         url("font/UTM AvoBold.ttf") format("truetype"); /* Safari, Android, iOS */
             font-style: normal;
    font-weight: bold;
    text-rendering: optimizeLegibility;
}
 .UTMAvo{font-family:UTMAvo}
</style>
<div style="border: 2px solid #000;padding: 2px;margin: -10px;height: 100vh;">
<img src="logo-tbig.png" style="width: 80px;margin-top: 4px;margin-left: 10px;"/>'.$dvvc_logo.'
<h2 style="    font-weight: bold;
    background: #000;
    color: #fff;
    padding: 3px 6px 5px 18px;
    position: absolute;
    top: -22px;
    right: -10px;
    font-size: 15px;border-radius:0px 0px 0px 30px;
   " class="UTMAvo"> #'.$madon.'</h2>
 <p class="UTMAvo" style=" margin: 5px 0px;position: absolute;right: 5px;top: 15px;font-size: 10px;"> '.$todayorder.'</p>
<div class="UTMAvo" style=";border:1px dashed #000;padding: 5px;margin: 3px;border-radius: 5px;">
	 <p class="UTMAvo" style="margin: 0px;font-size: 12px;font-weight: bold;">Bên gửi:</p>
	<p class="UTMAvo" style="margin: 5px 0px;
    
    font-size: 11px;
    line-height: 10px"><img src="user-icon.png" style="width: 9px;margin-right: 2px;margin-top: 1px;"/> <span style="margin-right: 10px;">TBIG.VN</span> <img src="hotline-icon.png" style="width: 10px;margin-right: 3px;"/> <img src="zalo-icon.png" style="width: 10px;"/> 0932100906</p>
	<p class="UTMAvo"  style="margin: 5px 0px;
   
    font-size: 11px;
    line-height: 11px"><img src="address-icon.png" style="width: 8px;"/> 282 QL1A, P.Tam Bình, Q.Thủ Đức, Tp.HCM</p>
<p class="UTMAvo" style="margin: 0px;font-size: 12px;">Phí ship: <span style="margin: 5px 0px 0px;font-weight: bold;">'.$ship.'</span></p>
 <img style="position: absolute; right: 4px; top: 38px;width: 81px;" src="qrcode/'.$madon.'.png" />
</div>
<div class="UTMAvo" style="border:1px dashed #000;padding: 5px;margin: 3px;border-radius: 5px;">
<p class="UTMAvo" style="margin: 0px;font-size: 12px;font-weight: bold;">Bên nhận:</p>
<p class="UTMAvo" style="margin: 5px 0px;
    font-size: 11px;
    line-height: 11px
 "><img src="user-icon.png" style="width: 9px;margin-top: 1.7px;margin-right: 2px;"/><span style="margin-right: 10px;"> '.$tendon.'</span> <img src="hotline-icon.png" style="width: 10px;margin-right: 3px;"/>'.$sdtdon.'</p>
<p class="UTMAvo" style="margin: 5px 0px;
    font-size: 11px;
    line-height: 11px
 "><img src="address-icon.png" style="width: 8px;"/> '.$dcdon.'</p>
 <p class="UTMAvo" style="margin: 0px;font-size: 12px; ">Thu tiền người nhận (COD) :</p>
  <p class="UTMAvo" style="margin: 5px 0px 0px;font-weight: bold;font-size: 18px;">'.$cod.' VNĐ</p>

</div>
<div class="UTMAvo" style="padding:0px 5px;margin: 3px 3px 5px 3px;">
<p class="UTMAvo" style="font-size: 12px;font-weight: bold;border-bottom:1px solid #838383;padding: 5px 0px;margin:0px;"><span style="padding-right: 3px;">Tổng đơn</span> <span style="font-weight: normal;"> ('.$countsp.' sản phẩm)</span></p> 
'.$thongtinsp.'</div></div>'; 
			 
			 
			 
			 
				  
				if($count_work==0){
					if($_POST['dvvc']!=0 ){
					if(in_array($file_extension_yc,$valid_ext_yc) ) {
						$file_yc = $_FILES['filecat_yc']['tmp_name'];	
						move_uploaded_file($file_yc, $location_yc);
						$file_demoyc = $_FILES['filedemo_yc']['tmp_name'];	
						move_uploaded_file($file_demoyc, $location_demoyc);
					}else{$newfilename_yc= "";}  
					require_once 'taopdf.php';
					$query = "INSERT INTO `Work`  (`work_id`, `work_madon`, `work_sp`, `work_sl`, `work_tt`, `work_note`, `work_thuoctinh`, `work_tendon`, `work_phone`, `work_address`, `work_user`, `work_tiendo`, `work_filepdf`, `work_coso`, `work_dvvc`, `work_filecat`,`work_filedemo`,`work_priority`,`work_phiship`)  VALUES (NULL, '".$madon."', '".$masp."', '".$soluong."', '0', '".$note."', '".$size."', '".$tendon."', '".$sdtdon."', '".$dcdon."', '".$userdon."', '".$tiendo."', '".$file."', '".$coso."', '".$dvvc."', '".$newfilename_yc."',  '".$newfiledemo_yc."', '".$work_priority."', '".$ship."')"; 
					$conn->exec($query);
					header('Refresh: 0; URL = ../work.php');					
					$i=$i+11;
					}else{header('Refresh: 0; URL = ../work.php');	}
				} 
					
					
				 
			header('Refresh: 0; URL = ../work.php'); 
		  $i++;
		}
	
	
		
	
	
	
	
	
	}
 

 } 
 
 
 
//$query = "INSERT INTO `Work`  (`work_id`, `work_madon`, `work_date`, `work_sp`, `work_sl`, `work_tt`, `work_note`, `work_thuoctinh`, `work_tendon`, `work_phone`, `work_address`, `work_user`, `work_tiendo`, `work_filepdf`)  VALUES (NULL, '".$madon."', '".$today."', '".$masp."', '".$soluong."', '0', '".$note."', '".$size."', '".$tendon."', '".$sdtdon."', '".$dcdon."', '".$userdon."', '".$tiendo."', '".$namefile."')";
//$conn->exec($query);
//header('Refresh: 0; URL = ../work.php');
  if(isset($_POST['submitnote'])){
	 $idnote=$_POST['idnote'];
	 $notecontent=$_POST['notecontent'];
	 $sqlnote = "UPDATE Work SET work_note='$notecontent' WHERE work_id = '$idnote'"; 
	 $updatenote = $conn->exec($sqlnote);
	 header('Refresh: 0; URL = ../work.php');
  }
 
 if(isset($_GET['idxoadon'])){
	 
	 $iddon=$_GET['idxoadon'];
	 $sql = "DELETE FROM Work WHERE work_id='".$iddon."'";
	 $conn->exec($sql);
	 header('Refresh: 0; URL = ../work.php');
 }
 if(isset($_GET['xacnhannhanh'])){
	 
	 $xacnhan=$_GET['xacnhannhanh'];
		$data_work = $conn->query("SELECT * FROM Work  WHERE work_id = '$xacnhan'")->fetchAll();
		foreach ($data_work as $row_work){ 
		if(count($row_work['work_id'])==1 ){
		$work_sl=$row_work['work_sl'];
	 $sql = "UPDATE Work SET work_tiendo='$work_sl' WHERE work_id = '$xacnhan'";
		}
		}
		$affectedRows = $conn->exec($sql);
	header('Refresh: 0; URL = ../work.php');
 }
header('Refresh: 0; URL = ../work.php'); 
?>
