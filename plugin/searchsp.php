 <?php 
 ob_start();
 session_start();
if(isset($_COOKIE['username']) || isset($_SESSION['username'])){?>

<?php 
$mysqli = new mysqli("localhost", "tbigshop_decor", "!@#SONbang123", "tbigshop_decor");
if($mysqli->connect_error) {

  exit('Could not connect');
}
$mysqli -> set_charset("utf8");
$sql = "SELECT * FROM SANPHAM WHERE LCASE(TenSP) LIKE ? OR  LCASE(MaSP) LIKE ? LIMIT 10";

 

$keyword=$_GET['q'];
$keyword = "%".$keyword."%";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss",$keyword,$keyword);
$stmt->execute();
$result = $stmt->get_result();
?>

 
<?php
while ($row = $result->fetch_assoc()) {
$masp = $row['MaSP'];
$tensp = $row['TenSP'];
$dmsp = $row['Danhmuc'];
$imagesp = $row['ImageSP'];
$filevector= $row['filevector'];	
$imgthumb='uploads/images/thumb/'.$row['ImageSP'].'.jpg';	 
$size =$row['Size'];
$gia = $row['Gia'];

?>
 <li >
<a data-ajax="false" href="uploads/filevector/<?php echo $filevector ?>.ai" style="    font-size: 12px;
    color: #ffffff;
    text-decoration: none;
    position: absolute;
    margin: 14px;
    z-index: 1;
    right: -30px;"><i class="fi-rr-download"></i></a>
<a style="    background-color: #333333f7;
    border-color: #212121;
    color: #fff;
    font-weight: normal;
    text-shadow: 0 1px 0 #111;    font-size: 14px;
    padding: 6px;" data-ajax="false" href="sanphamchitiet.php?id=<?php echo $masp?>" class="ui-btn ui-btn-icon-right ui-icon-carat-r"> 
  <img style="width: 30px;float: left;padding-right: 10px;" src="<?php echo $imgthumb ?>"/> <div style="    padding: 6px;"><?php echo $masp ?> - <?php echo $tensp ?></div>

  
 </a>
 </li>

<?php
}
?>


<?php
$stmt->close();
?>
 <?php }else{   header('Refresh: 0; URL = catalog.php');}?> 


 