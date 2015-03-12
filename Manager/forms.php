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
                <a class="navbar-brand" href="tables.php">Restaurant Manager</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Manager<b class="caret"></b></a>
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

                        <form id="Employees" name="Employees" method="post" action="">

                            <div class="form-group">
                                <label>Employees</label>
                                <input class="form-control" placeholder="Name" name="Name">
                                <input class="form-control" placeholder="Designation" name="Designation">
                                <input class="form-control" placeholder="Address" name="Address">
                                <input class="form-control" placeholder="Mobile" name="Mobile">
                                <input class="form-control" placeholder="Alternate_Mobile" name="Alternate_Mobile">
                                <input class="form-control" placeholder="Email" name="Email">
                                <button name="AddEmployee" class="btn btn-default" type="submit">Add New Employee</button>
                            </div>
                         </form>
                         <form id="OpenShift" name="OpenShift" method="post" action="">
                            <div class="form-group">
                                <label>OpenShift</label>
                                <input class="form-control" placeholder="Employee_id" name="Employee_id">
                                <button name="OpenShift" class="btn btn-default" type="submit">OpenShift</button>
                            </div>
						</form>
						<form id="CloseShift" name="CloseShift" method="post" action="">
                            <div class="form-group">
                                <label>CloseShift</label>
                                <input class="form-control" placeholder="Employee_id" name="Employee_id">
                                <button name="CloseShift" class="btn btn-default" type="submit">CloseShift</button>
                            </div>
						</form>
						<form id="OpenBillingOutlet" name="OpenBillingOutlet" method="post" action="">
                            <div class="form-group" >
                                <label>OpenBillingOutlet</label>
                                <input class="form-control" placeholder="Employee_id" name="Employee_id">
                                <input class="form-control" placeholder="OpeningAmount" name="OpeningAmount">
                                <button name="StartBillingSession" class="btn btn-default" type="submit">StartBillingSession</button>
                            </div>
						</form>
						<form id="CloseBillingOutlet" name="CloseBillingOutlet" method="post" action="">
                            <div class="form-group">
                                <label>CloseBillingOutlet</label>
                                <input class="form-control" placeholder="Employee_id" name="Employee_id">
                                <input class="form-control" placeholder="ClosingAmount" name="ClosingAmount">
                                <button name="CloseBillingSession" class="btn btn-default" type="submit">CloseBillingSession</button>
                            </div>
						</form>
					</div>
                    <div class="col-lg-6">
                    <form id="CustomerDetails" name="CustomerDetails" method="post" action="">
                            <div class="form-group">
                                <label>CustomerDetails</label>
                                <input class="form-control" placeholder="Name" name="Name">
                                <div class="form-group">
                                <label>TableNo</label>FinalItemPrice
                                <select class="form-control" name="TableNo">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                	<option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                </select>
                            	</div>
                            	<div class="form-group">
                                <label>NoofCovers</label>
                                <select class="form-control" name="NoofCovers">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                	<option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            	</div>
                            	<input class="form-control" placeholder="NoofPeople" name="NoofPeople">
                                <div class="form-group">
                                <label>NC</label>
                                <select class="form-control" name="NC">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            	</div>
                                <button name="SaveCustomerDetails" class="btn btn-default" type="submit">SaveCustomerDetails</button>
                            </div>
						</form>
						<form id="OrderEntry" name="OrderEntry" method="post" action="">
                            <div class="form-group">
                                <label>OrderEntry</label>
                                <input class="form-control" placeholder="Customer_id" name="Customer_id">
                                <input class="form-control" placeholder="ItemCode" name="ItemCode">
                                <input class="form-control" placeholder="Quantity" name="Qunatity">
                            	<input class="form-control" placeholder="PricePerUnit" name="PricePerUnit">
                                <input class="form-control" placeholder="ModificationsInDish" name="ModificationsInDish">
                                <input class="form-control" placeholder="ModificationsPrice" name="ModificationsPrice">
                            	<!--<input class="form-control" placeholder="FinalItemPrice" name="FinalItemPrice">-->
                                <input class="form-control" placeholder="Discount" name="Discount">
                            	<!--<input class="form-control" placeholder="NetPrice" name="NetPrice">-->
                                <button name="PlaceOrder" class="btn btn-default" type="submit">PlaceOrder</button>
                            </div>
						</form>
						<form id="Payment" name="Payment" method="post" action="">
                            <div class="form-group">
                                <label>OrderEntry</label>
                                <input class="form-control" placeholder="Customer_id" name="Customer_id">
                                <input class="form-control" placeholder="ServiceTax" name="ServiceTax">
                                <input class="form-control" placeholder="TotalAmount" name="TotalAmount">
                            	<div class="form-group">
                                <label>Mode Of Payment</label>
                                <select class="form-control" name="ModeOfPayment">
                                    <option>CASH</option>
                                    <option>CARD</option>
                                </select>
                                </div>
                            	<button name="ConfirmPayment" class="btn btn-default" type="submit">ConfirmPayment</button>
                            </div>
						</form>
                       </div>
                       <div class="col-lg-6">
                        <form id="Items" name="Items" method="post" action="">

                            <div class="form-group">
                                <label>Items</label>
                                <input class="form-control" placeholder="ItemCode" name="ItemCode">
                                <input class="form-control" placeholder="ItemName" name="ItemName">
                                <input class="form-control" placeholder="Type" name="Type">
                                <input class="form-control" placeholder="Rate" name="Rate">
                                <input class="form-control" placeholder="Tax" name="Tax">
                                <input class="form-control" placeholder="Discount" name="Discount">
                               <!-- <input class="form-control" placeholder="NC" name="NC">-->
                                <button name="AddItem" class="btn btn-default" type="submit">Add Item</button>
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