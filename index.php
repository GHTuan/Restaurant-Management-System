<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Lib/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
</body>
</html>
<?php
	require('Model/Database.php');
	$db = new Database;
	$db->connect();
	if (isset($_GET['controller'])) {
		require 'Route/user/web.php'; /*xử lý các request trong Route/web.php*/
	} else {
		require 'View/user/pages/home.php'; /*require giao diện trang chủ*/
	}
	$db->closeDatabase();
?>