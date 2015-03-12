<?php
session_start();
$db = "Restaurant";
$hostname = "localhost";
$username = "IntroToDB";
$password = "db123";
function getColumns($tablenames) {
	global $hostname, $db, $username,$password;
	try {
		$condb = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);

		//debug connection
		$condb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// get column names
		$query = $condb->prepare("DESCRIBE $tablenames");
		$query->execute();
		$table_names = $query->fetchAll(PDO::FETCH_COLUMN);
		return $table_names;

		//Close connection
		$condb = null;

	} catch(PDOExcepetion $e) {
		echo $e->getMessage();
	}
}
$tablenameid = $_POST["id"];
$id = preg_replace('/[^0-9]/','',$tablenameid);
$tablename = preg_replace('/[^a-zA-Z]/','',$tablenameid);
echo "<div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
echo "<h4 class='modal-title' id='myModalLabel'>$tablename</h4>";
echo "</div><div class='modal-body'>";
$values = $_SESSION[$tablename];
$keys = getColumns($tablename);
$defkey = array();
$postarrray = array();
echo "<form method='post' action=''>";
for ($i = 0; $i < count($values[$id]); $i++) {
	$value = $values[$id][$i];
	$key = $keys[$i];
	if (strpos($key,'id') or $key =='SNO' or strpos($key,'Code') or $key == 'BillNo') {
		$defkey = array();
		$defkey[$key] = $value;	
	}
	else {
		array_push($postarrray,$key);
		echo "<p><b>$key:</b></p><input class='form-control' value='$value' name=$key><br>";
	}
}
echo "<div class='modal-footer'><button name='delete' type='submit' class='btn btn-default'>Delete</button><button name='update' type='submit' class='btn btn-primary'>Save changes</button></div>";
echo "</form>";
echo "</div>";
$_SESSION['keys'] = $defkey;
$_SESSION['posting'] = $postarrray;
$_SESSION['tablename'] = $tablename;
?>
