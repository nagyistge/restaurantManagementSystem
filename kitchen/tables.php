<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$db = "Restaurant";
$hostname = "localhost";
$username = "IntroToDB";
$password = "db123";
$CloseBillingOutlet = array();
$CloseShift = array();
$CustomerDetails = array();
$Employees = array();
$Items = array();
$OpenBillingOutlet = array();
$OpenShift = array();
$OrderEntry = array();
$Payment = array();
$PhysicalStockEntry = array();
$PurchaseOrder = array();
$PurchaseRequisition = array();
$Transactions = array();
$condb = mysqli_connect($hostname, $username, $password, $db);
//mysql_connect($hostname,$username,$password) or die("Cannot Connect to user" + mysql_error());
//mysql_select_db($db) or die("cannot connect to Database" + mysql_error());
session_start();
function getColumns($tablenames) {
	global $hostname, $db, $username,	$password;
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
function GetTable($table_name) {
	global $Employees;
	global $condb;
	$CloseBillingOutlet = array();
	$CloseShift = array();
	$CustomerDetails = array();
	$Employees = array();
	$Items = array();
	$OpenBillingOutlet = array();
	$OpenShift = array();
	$OrderEntry = array();
	$Payment = array();
	$PhysicalStockEntry = array();
	$PurchaseOrder = array();
	$PurchaseRequisition = array();
	$Transactions = array();
	$details = "SELECT * from ".$table_name;
	//$result = mysql_query($details);
	//$thead = mysql_fetch_assoc($result);
	echo '<thead>';
	echo '<tr>';
	
	/*foreach($thead as $row=>$value) {
		echo '<th>',$row,'</th>';
	}*/
	$mad = getColumns($table_name);
	for ($i = 0; $i < sizeof($mad); $i++) {
		echo '<th>',$mad[$i],'</th>';
	}
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	$idno = 0;
	$result = mysqli_query($condb, $details);
	if (mysqli_num_rows($result)){
		while($row = mysqli_fetch_row($result)) {
			$id = $table_name.(string)$idno;
			$idno++;
			echo "<tr id='$id' onClick='getId(this);' type='button' data-toggle='modal' data-target='#myModal'>";
			$single = array();
			foreach($row as $value) {
				if($value != '') {
					array_push($single, $value);
					echo '<td>',$value,'</td>';
				}
				else {
					array_push($single, 'NULL');
					echo '<td>','NULL','</td>';
				}
			}
			switch ($table_name) {
				case 'CloseBillingOutlet':
					array_push($CloseBillingOutlet, $single);
				break;
				case 'CloseShift':
					array_push($CloseShift, $single);
				break;
				case 'CustomerDetails':
					array_push($CustomerDetails, $single);
				break;
				case 'Employees':
					array_push($Employees, $single);
				break;
				case 'Items':
					array_push($Items, $single);
				break;
				case 'OpenBillingOutlet':
					array_push($OpenBillingOutlet, $single);
				break;
				case 'OpenShift':
					array_push($OpenShift, $single);
					break;
				case 'OrderEntry':
					array_push($OrderEntry, $single);
				break;
				case 'Payment':
					array_push($Payment, $single);
				break;
				case 'PhysicalStockEntry':
					array_push($PhysicalStockEntry, $single);
				break;
				case 'PurchaseOrder':
					array_push($PurchaseOrder, $single);
				break;
				case 'PurchaseRequisition':
					array_push($PurchaseRequisition, $single);
				break;
				case 'Transactions':
					array_push($Transactions, $single);
				break;
			}
			echo '</tr>';
		}
	}
	echo '</tbody>';
	/*if ($table_name == 'Employees') {
		$_SESSION["Employeesarray"] = $Employees;
	}*/
	switch ($table_name) {
		case 'CloseBillingOutlet':
			$_SESSION["CloseBillingOutlet"] = $CloseBillingOutlet;
		break;
		case 'CloseShift':
			$_SESSION["CloseShift"] = $CloseShift;
		break;
		case 'CustomerDetails':
			$_SESSION["CustomerDetails"] = $CustomerDetails;
		break;
		case 'Employees':
			$_SESSION["Employees"] = $Employees;
		break;
		case 'Items':
			$_SESSION["Items"] = $Items;
		break;
		case 'OpenBillingOutlet':
			$_SESSION["OpenBillingOutlet"] = $OpenBillingOutlet;
		break;
		case 'OpenShift':
			$_SESSION["OpenShift"] = $OpenShift;
		break;
		case 'OrderEntry':
			$_SESSION["OrderEntry"] = $OrderEntry;
		break;
		case 'Payment':
			$_SESSION["Payment"] = $Payment;
		break;
		case 'PhysicalStockEntry':
			$_SESSION["PhysicalStockEntry"] = $PhysicalStockEntry;
		break;
		case 'PurchaseOrder':
			$_SESSION["PurchaseOrder"] = $PurchaseOrder;
		break;
		case 'PurchaseRequisition':
			$_SESSION["PurchaseRequisition"] = $PurchaseRequisition;
		break;
		case 'Transactions':
			$_SESSION["Transactions"] = $Transactions;
		break;
	}
}
if(isset($_POST['delete'])) {
	//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	//echo $_SESSION["tablename"];
	$req = 'DELETE FROM '.$_SESSION['tablename'];
	$req .= " WHERE ";
	foreach ($_SESSION['keys'] as $key=>$value) {
		$req .= $key;
		$req .= "=";
		$req .= "\"";
		$req .= $value;
		$req .= "\"";
	}
	$que = mysqli_query($condb,$req);
	if ($que) {
		echo "<div style='float:right;margin-right:2%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Successfully Deleted";
		echo "</div></div>";
	}
	else {
		echo "<div style='float:right;margin-right:2%;margin-left:30%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Error Deleting";
		echo mysqli_error($condb);
		echo "</div></div>";
		
	}
	//echo $req;
	//echo $_SESSION['tablename'];
}
if (isset($_POST["update"])) {
	//echo "vvvvvvvvvvvvvvvvvvvvvvvvv";
	$req = "UPDATE ".$_SESSION['tablename'];
	$req .= " SET ";
	for ($i = 0; $i < count($_SESSION['posting']); $i++) {
		$req .= $_SESSION['posting'][$i];
		$req .= "=\"";
		$req .= $_POST[$_SESSION['posting'][$i]];
		$req .= "\" ";
		if ($i < count($_SESSION['posting'])-1) {
			$req .=	 ", ";
		}
		
	}
	foreach ($_SESSION['keys'] as $key=>$value) {
		$req .= "WHERE ";
		$req .= $key;
		$req .= "=";
		$req .= "\"";
		$req .= $value;
		$req .= "\"";
	}
	$que = mysqli_query($condb, $req);
	if ($que) {
		echo "<div style='float:right;margin-right:2%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Successfully Updated";
		echo "</div></div>";
	}
	else {
		echo "<div style='float:right;margin-right:2%;margin-left:30%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Updating Error: ";
		echo mysqli_error($condb);
		echo "</div></div>";
	
	}
	//echo "aaaaaaaaaaaaaaaaaaa";
	//echo $req;
	//var_dump($que);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="VenuMadhav Kattagoni" >

    <title>Restaurant DataBase</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	function getId(e) {
		$.ajax({
		     url: 'mymodal.php',
		     type: "POST",
			 data: ({id: e.id}),
		     success: function(data){
		         $('.modal-content').html(data);
		     }
		});
	}
	</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="tables.php">Restaurant Kitchen</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Kitchen<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                         <li>
		    		<a href="../login.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li class="active">
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Tables
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                	<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      
					    </div>
					  </div>
					</div>
				  
                <div class="col-lg-4444">
                <h2>OrderEntry</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <?php 
                                	GetTable('OrderEntry');
                                ?>
                            </table>
                </div>
                </div>
               
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
