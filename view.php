<?php include('server.php');
include('../test/server.php');
if (!isset($_SESSION['username'])) 
  {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../test/login.php');
  }

  if (isset($_GET['logout'])) 
  {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../test/login.php");
  } 
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Survey</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="header">
    <h2>Survey Forms</h2>
  </div>
	<table>
		<thead>
			<tr class="table100-head">
				<th class="column2"></th>
				<th class="column2">Name</th>
				<th class="column2">Contact</th>
				<th class="column2">Update</th>
			</tr>
		</thead>
<?php
	$connection = new MongoClient();
  // Check connection
  $db = $connection->surveys;
  $collection = $db->form;	
  $sql = "SELECT sid,sname,contact FROM `salesperson`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["sid"]. "</td><td>" . $row["sname"] . "</td><td>". $row["contact"]. "</td><td>" . "<a href='editsp.php?edit=$row[sid]'>Edit </a><a href='delsp.php?del=$row[sid]'>Del</a>" ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<br/>
	<div>
		<a class="btn2" href= "addsp.php">Add Salesperson </a>
		<br/>
<br/><a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
	</div>





</html>
