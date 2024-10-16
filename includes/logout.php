<?php 
$data = false;
if(isset($_SESSION['userid']))
{
	$data = false;
	$data['status'] = "Offline Now";
	$data['userid'] = $_SESSION['userid'];
	$query = "update users set status = :status where userid = :userid limit 1";
	$result = $DB->write($query,$data);		
	unset($_SESSION['userid']);
}

$info->logged_in = false;
echo json_encode($info);
