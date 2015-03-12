<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$db = "Restaurant";
$hostname = "localhost";
$username = "IntroToDB";
$password = "db123";
$condb = mysqli_connect($hostname, $username, $password, $db);
//mysql_connect($hostname,$username,$password) or die("Cannot Connect to user" + mysql_error());
//mysql_select_db($db) or die("cannot connect to Database" + mysql_error());
function InsertIntoTable($button, $tablename, $calcvalue) {
	global $condb;
	$field = array();
	foreach ($_POST as $name=>$value) {
		if ($name != $button && $value != NULL) {
			array_push($field,$name);
		}
	}
	if (count($field) == 0);
	else {
	$key = "";
	$val = "";
	if (count($calcvalue) == 0);
	else {
		foreach ($calcvalue as $key1 => $value1) {
		$key .= $key1; $key.=","; $val.="\""; $val.=$value1; $val.="\",";}
	}
	for ($i = 0; $i < count($field); $i++) {
			if ($i == 0){
			$key .= $field[$i];
			$val .= "\"";
			$val .= $_POST[$field[$i]];
			$val .= "\"";
			}
			else {
				$key .= ",";
				$key .= $field[$i];
				$val .= ",";
				$val .= "\"";
				$val .= $_POST[$field[$i]];
				$val .= "\"";
			}
	}
	$req = "INSERT INTO ";
	$req .= $tablename;
	$req .= "(";
	$req .= $key;
	$req .= ") values(";
	$req .= $val;
	$req .= ")";
	//echo $req;
	//echo $key;
	//echo $val;
	$det = $condb->query($req);
	if ($det) {
		echo "<div style='float:right;margin-right:2%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Successfully Inserted";
		echo "</div></div>";
	}
	else {
		echo "<div style='float:right;margin-right:2%;margin-left:30%;' class='bs-example'><div class='alert alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>";
		echo "Error Inserting";
		echo mysqli_error($condb);
		echo "</div></div>";
	}
	}
}
if (isset($_POST["AddEmployee"])) {
	$calc = array();
	$temp = substr($_POST['Designation'],0,3);
	$temp .= substr($_POST['Mobile'], 0,4);
	$calc['Employee_id'] = $temp;
	InsertIntoTable("AddEmployee","Employees",$calc);
}
if (isset($_POST["OpenShift"])){
	InsertIntoTable("OpenShift", "OpenShift");
}
if (isset($_POST["CloseShift"])) {
	InsertIntoTable("CloseShift","CloseShift");
}
if (isset($_POST["StartBillingSession"])) {
	InsertIntoTable("StartBillingSession", "OpenBillingOutlet");
}
if (isset($_POST["CloseBillingSession"])) {
	InsertIntoTable("CloseBillingSession","CloseBillingOutlet");
}
if (isset($_POST["SaveCustomerDetails"])){
	InsertIntoTable("SaveCustomerDetails","CustomerDetails");
}
if (isset($_POST["PlaceOrder"])) {
	$calc = array();
	$temp = ((int)$_POST["Qunatity"] * (int)$_POST["PricePerUnit"]);
	$temp = $temp + (int)$_POST["ModificationsPrice"];
	$calc["FinalItemPrice"] = $temp;
	$temp1 = $temp * (100 - (int)$_POST["Discount"])/100;
	$calc["NetPrice"] = $temp1;
	InsertIntoTable("PlaceOrder","OrderEntry", $calc);
}
if (isset($_POST["ConfirmPayment"])) {
	InsertIntoTable("ConfirmPayment","Payment");
}
if (isset($_POST["PurchaseRequisition"])) {
	InsertIntoTable("PurchaseRequisition","PurchaseRequisition");
}
if (isset($_POST["PurchaseOrder"])) {
	InsertIntoTable("PurchaseOrder","PurchaseOrder");
}
if (isset($_POST["Transactions"])) {
	$calc = array();
	$temp = (int)$_POST["Quantity"] * (int)$_POST["PricePerUnit"];
	$calc['TotalPrice'] = $temp;
	InsertIntoTable("Transactions","Transactions",$calc);
}
if (isset($_POST["SaveStock"])) {
	$calc = array();
	$temp = (int)$_POST["ItemValuePerUnit"] * (int)$_POST["QuantityInStore"];
	$calc['TotalValue'] = $temp;
	InsertIntoTable("SaveStock","PhysicalStockEntry",$calc);
}
if (isset($_POST["AddItem"])) {
	InsertIntoTable("AddItem","Items");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurant DataBase</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="../bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>
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
                <a class="navbar-brand" href="tables.php">Restaurant StoreManager</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>StoreManager<b class="caret"></b></a>
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
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li class="active">
                        <a href="forms.php"><i class="fa fa-fw fa-edit"></i> Forms</a>
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
                            Forms
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                       <div class="col-lg-6">
                       <form id="PurchaseRequisition" name="PurchaseRequisition" method="post" action="">
                            <div class="form-group">
                                <label>PurchaseRequisition</label>
                               	<div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="Department">
                                    <option>KITCHEN</option>
                                    <option>MANGEMENT</option>
                                </select>
                                </div>
                                <input class="form-control" placeholder="Requisition_Reference" name="Requisition_Reference">
                                <input class="form-control" placeholder="CreatedBy" name="CreatedBy">
                                <input class="form-control" placeholder="Authorization" name="Authorization">
                                <button name="PurchaseRequisition" class="btn btn-default" type="submit">PurchaseRequisition</button>
                            </div>
						</form>
						
                       </div>
                       <div class="col-lg-6">
                       <form id="PurchaseOrder" name="PurchaseOrder" method="post" action="">
                            <div class="form-group">
                                <label>PurchaseOrder</label>
                                <input class="form-control" placeholder="Vendor" name="Vendor">
                                <input class="form-control" placeholder="POValue" name="POValue">
                                <input class="form-control" placeholder="DeliveryDate" name="DeliveryDate">
                                <input class="form-control" placeholder="PaymentTerms" name="PaymentTerms">
                                <input class="form-control" placeholder="Authorization" name="Authorization">
                                <input class="form-control" placeholder="Employee_id" name="Employee_id">
                                <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="Status">
                                    <option>TO BE DELIVERED</option>
                                    <option>PENDING</option>
                                    <option>DELIVERED</option>
                                </select>
                                </div>
                                <button name="PurchaseOrder" class="btn btn-default" type="submit">PurchaseOrder</button>
                            </div>
						</form>
						
                       </div>
                       <div class="col-lg-6">
                       <form id="Transactions" name="Transactions" method="post" action="">
                            <div class="form-group">
                                <label>Transactions</label>
                                <input class="form-control" placeholder="ItemCode" name="ItemCode">
                                <input class="form-control" placeholder="Transaction_id" name="Transaction_id">
                                <div class="form-group">
                                <label>STORE</label>
                                <select class="form-control" name="STORE">
                                    <option>KITCHEN</option>
                                    <option>MANAGEMENT</option>
                                </select>
                                </div>
                                <input class="form-control" placeholder="Item_Name" name="Item_Name">
                                <input class="form-control" placeholder="Quantity" name="Quantity">
                                <input class="form-control" placeholder="PricePerUnit" name="PricePerUnit">
                                <!--<input class="form-control" placeholder="TotalPrice" name="TotalPrice">-->
                                <button name="Transactions" class="btn btn-default" type="submit">Transactions</button>
                            </div>
						</form>
						
                       </div>
                        <div class="col-lg-6">
                       <form id="PhysicalStockEntry" name="PhysicalStockEntry" method="post" action="">
                            <div class="form-group">
                                <label>PhysicalStockEntry</label>
                                <input class="form-control" placeholder="ItemCode" name="ItemCode">
                                <input class="form-control" placeholder="ItemValuePerUnit" name="ItemValuePerUnit">
                                <input class="form-control" placeholder="QuantityInStore" name="QuantityInStore">
                                <!--<input class="form-control" placeholder="TotalValue" name="TotalValue">-->
                                <button name="SaveStock" class="btn btn-default" type="submit">SaveStock</button>
                            </div>
						</form>
						
                       </div>
                </div>
                <!-- /.row -->

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
    <script type="text/javascript" src="../bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
    
    <script src="../validation.js"></script>

</body>

</html>