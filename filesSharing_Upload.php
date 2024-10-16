<?php 
	session_start();
	$info = (object)[];

	require_once("classes/autoload.php");
	$DB = new Database();

	$Error = "";
	//good to go
	$folder = "uploads/";

	if(!file_exists($folder)){

		mkdir($folder,0777,true);
	}
	$nameGet = $_FILES['file']['name'];
	$destination = $folder . $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $destination);

	$arr['name'] = $nameGet;
	$arr['date'] = date("Y-m-d H:i:s");
	$query = "insert into upload (name,date) values (:name,:date)";
	$result = $DB->write($query,$arr);

	if($result)
	{
		$info->message = "Your file was uploaded";
		$info->data_type = "filesSharing";
		echo json_encode($info);
	}else
	{
		$info->message = "Your file was NOT uploaded due to an error";
		$info->data_type = "filesSharing";
		echo json_encode($info);
	}
?>