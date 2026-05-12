<?php include 'conn.php';
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TBIG DECOR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS jquery mobile-->	
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
<!-- Jquery thư viện js-->	
<script src="js/jquery-1.11.1.min.js"></script>
<!-- Jquery Xuất mobile-->	
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<!-- CSS form bảng-->	
<link rel="stylesheet" href="css/css_bang/formbang.css" />
<!-- CSS icon font -->	
<link href="css/uicons-regular-rounded.css" rel="stylesheet" />
<!-- CSS Tổng của site -->	
<link rel="stylesheet" href="css/style.css" />
<script src="js/select2.js"></script>
<!-- CSS chuyển select thành menu icon -->	 
<link rel="stylesheet" href="css/select2.css" />	
<!-- Lấy tất cả CSS trong thư mục cssfont -->
 <?php
foreach (glob("admins/uploads/cssfont/*.css") as $css) {echo "<link type='text/css' rel='stylesheet' href='$css'>\n";}
?>
</head>

<body >
 