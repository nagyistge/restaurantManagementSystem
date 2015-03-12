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
function SearchTable($table_name, $id) {
	global $condb;
	$details = "SELECT * from ".$table_name;
	$details .= " WHERE Customer_id=";
	$details .= $id;
	//$result = mysql_query($details);
	//$thead = mysql_fetch_assoc($result);
	echo "<div id='wrapper'>";
	echo "<div id='page-wrapper'>";
	echo "<div class='container-fluid'>";
	echo "<div class='col-lg-444'>";
	echo "<div class='table-responsive'>";
	echo "<table class='table table-bordered table-hover'>";
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
			
			echo '</tr>';
		}
	}
	echo '</tbody>';
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}
if (isset($_POST["Search"])) {
	SearchTable($_POST["tablename"], $_POST["Customer_id"]);
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

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.php">Restarant Database</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Cashier<b class="caret"></b></a>
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
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
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
                            Dashboard 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
              		 <form name="PurchaseRequisition" method="post" action="">
                            <div class="form-group">
                              	<div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="tablename">
                                    <option>OrderEntry</option>
                              		<option>Payment</option>
                          			<option>CustomerDetails</option>
                                </select>
                                </div>
                                <input class="form-control" placeholder="Customer_id" name="Customer_id">
                                <button name="Search" class="btn btn-default" type="submit">Search</button>
                            </div>
						</form>
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
