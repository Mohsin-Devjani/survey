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
  // if(isset($_GET['viewsurvey']))
  // {
  //   header("location: view.php");
  // }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Survey</title>
  <script src="jquery-2.1.4.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  
  <div class="header">
    <h1>PAINT PLANT</h1>
  </div>
    <table>
    <thead>
      <tr class="table100-head">
        <th> <a class="btn1" href= "../test/index.php">HOME </div></th>
        <th> <a class="btn1" href= "../test/user.php">USERS </div></th>
        <th> <a class="btn1" href= "../test/product.php">PRODUCTS </div></th>
        <th> <a class="btn1" href= "../test/salesperson.php">SALESPERSON </div></th>
        <th> <a class="btn1" href= "../test/ctable.php">CUSTOMERS </div></th>
        <th> <a class="btn1" href= "../survey/index.php">SURVEYS </div></th>
      </tr>
    </thead>
  </table>

    
</head>
<body>
  <div class="header">
  	<h2>Survey Form</h2>
  </div>

	
  <form method="post" action="index.php" enctype="multipart/form-data">
<!-- 
  <div class="input-group">
      <button type="submit" class="btn" name="viewsurvey">Manage</button>
    </div> -->
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Shop Name</label>
  	  <input type="text" name="cname" value="<?php echo $cname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Geo Location</label>
  	  <input type="text" name="geo" value="<?php echo $geo; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Are My Products Available?</label>
  	</div>
  	<div id="wrapper">
<input type="radio" name="productavail" checked>Yes</input>
<input type="radio" name="productavail">No</input>
  	</div>
  	<div class="input-group">
  	  <label>Are My Products Positioned in Front?</label>
  	  </div>
  	<div id="wrapper">
<input type="radio" name="positioned" checked>Yes</input>
<input type="radio" name="positioned">No</input>
  	</div>
  	<div class="input-group">
  	  <label>Are Competitors products more prominent?</label>
  	  </div>
  	<div id="wrapper">
<input type="radio" name="prominent">Yes</input>
<input type="radio" name="prominent" checked>No</input>
  	</div>
  	<div class="imput-group">
  	<label>Upload Image</label>
  	</div>
 	<div id="wrapper">
 		<input type="file" name="img" id="">
 	</div>
	<div class="input-group">
  	  <button type="submit" class="btn" name="survey">Submit</button>

<br/><a class="btn2" href="index.php?logout='1'" style="color: red;">Logout</a>
  	</div>
  </form>

</body>
</html>