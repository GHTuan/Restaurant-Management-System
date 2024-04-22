<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Lib/css/bootstrap.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/20b9485268.js" crossorigin="anonymous"></script>
	<script src="Lib/js/bootstrap.js" crossorigin="anonymous"></script>
</head>
<body>
	
</body>
</html>
<?php
	if (!isset($_GET['controller'])) {
		require 'View/user/pages/home.php'; /*require giao diện trang chủ*/
		return;
	}
	session_start();
	if (isset($_SESSION['Role'])){
		if ($_SESSION['Role'] == 'admin'){
			require 'Route/admin/web.php'; 
			return;
		}
		if ($_SESSION['Role'] == 'member'){
			require 'Route/user/web.php'; 
			return;
		}
	}
	#This is guest
	require 'Route/guest.php';
	
	
?>