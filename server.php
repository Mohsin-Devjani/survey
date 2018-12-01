<?php 

$cname = "";
$productavail = "";
$positioned = "";
$prominent = "";
$geo = "";
$file_path = "";
$errors = array();
if(isset($_POST['survey']))
	{
		$cname = $_POST['cname'];
		$productavail = $_POST['productavail'];
		$positioned = $_POST['positioned'];
		$prominent = $_POST['prominent'];
		$geo = $_POST['geo'];

		if(empty($cname))
		{
			array_push($errors, "Shop Name is required!");
		}
		if(empty($geo))
		{
			array_push($errors,"Enter your current coordinates");
		}

		if(isset($_FILES['img'])){
			if(empty($_FILES['img']['name'])){
				array_push($errors, "Please Insert an image");
			}
			else {
				$allowed = ['png','jpeg','jpg'];
				$fl_name = $_FILES['img']['name'];
				$fl_extn = strtolower(end(explode('.', $fl_name)));
				$fl_temp = $_FILES['img']['tmp_name'];

				if( in_array($fl_extn, $allowed)) {
					$file_path = 'images/' . substr(md5(time()), 0, 10) . '.' . $fl_extn;
					move_uploaded_file($fl_temp, $file_path);
				}
				else
				{
					array_push($errors, ".png .jpg .jpeg files allowed only");
				}
			}
		}


		
		$time = time();
		$connection = new MongoClient();
		if(!$connection)
		{
			array_push($errors,"Error while connecting to database!");
		}
		$db = $connection->surveys;
		if(!$db)
		{
			array_push($errors,"Error while connecting to database!");
		}
		$collection = $db->form;
		if(!$collection)
		{
			array_push($errors,"Error while connecting to database!");
		}

		$doc = array(
			"Shop Name" => $cname,
			"Geo Loc" => $geo,
			"Product-Available" => $productavail,
			"Positioned" => $positioned,
			"Prominent" => $prominent,
			"Time" => $time,
			"Img" => $file_path
			);
		$collection -> insert($doc);
		
	}

?>