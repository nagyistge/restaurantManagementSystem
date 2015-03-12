<?php
if($_POST["username"] == "admin" and $_POST['password'] == "admin") {
		header("location: ./admin/index.php");
}
elseif($_POST["username"] == "serving" and $_POST['password'] == "serving") {
		header("location: ./serving/forms.php");
}
elseif($_POST["username"] == "cashier" and $_POST['password'] == "cashier") {
		header("location: ./cashier/index.php");
}
elseif($_POST["username"] == "kitchen" and $_POST['password'] == "kitchen") {
		header("location: ./kitchen/tables.php");
}
elseif($_POST["username"] == "storemanager" and $_POST['password'] == "storemanager") {
		header("location: ./storemanager/tables.php");
}
elseif($_POST["username"] == "manager" and $_POST['password'] == "manager") {
		header("location: ./Manager/tables.php");
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Restaurant Employee Login</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
<script type="text/javascript" src="./js/placeholder.js"></script>
</head>
<body>
<form id="slick-login" action="" method="post">
<label for="username">username</label><input type="text" name="username" class="placeholder" placeholder="Employee_id">
<label for="password">password</label><input type="password" name="password" class="placeholder" placeholder="password">
<input type="submit" value="Log In">
</form>
</body>
</html>
