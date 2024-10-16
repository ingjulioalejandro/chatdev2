<?php 

	$myid = $_SESSION['userid'];
	$sql = "select * from upload where 1";
	$myfiles = $DB->read($sql,[]);

	$mydata =
	'
	<style>
	body{


		background-image: url("2089149.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		
		}
		
		.table tr th{
			
			border:#eee 1px solid;
			
			position:relative;
			#font-family:"Times New Roman", Times, serif;
			font-size:12px;
			text-transform:uppercase;
			}
			table tr td{
			
			border:#eee 1px solid;
			color:#000;
			position:relative;
			#font-family:"Times New Roman", Times, serif;
			font-size:12px;
			
			text-transform:uppercase;
			}
			
		#wb_Form1
		{
		   background-color: rgba(255,255,255,0.4);
		   border: 0px #000 solid;
		  
		}
		#photo
		{
		   background-color: rgba(255,255,255,0);
		   color: #fff;
		   font-family:Arial;
		   font-size: 20px;
		}

	</style>
	<div style="text-align: center; anidmation: appear 1s ease">';
	$mydata .= "
	<div>
		<br>Files Sharing App";

	$mydata .= "

	<table cellpadding='0' cellspacing='30' border='0' class='table table-bordered'>
		<tr>
			<td>
				<form enctype='multipart/form-data'  action='' id='wb_Form1' name='form' method='post'>
				<input  style='background-color: rgba(41, 98, 255, 0.5); position: center; font-size:15px'type='file' name='uploadFileName' id='uploadFileName'  required='required' >
			</td>
			<td>
				<input type='button' style='background-color:rgba(51,51,51);center; font-size:15px;color: white;border: 1px' value='Upload File' name='upload' onclick='upload_file(event)'>
				</form>
		</tr></td>
	</table>

	</div>";

	$mydata .= "
	<div style=' margin:4px, 4px;
	height: 350px;
	overflow-x: hidden;
	overflow-y: auto;
	text-align:justify;'>
		<table cellpadding='10' cellspacing='0' border='0' style='border: none; position: center' id='example'>
		<thead>
		<tr>
			<th>ID</th>								
			<th>FILE NAME</th>
			<th>DATE</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>	
	";

	if(is_array($myfiles)){
		foreach ($myfiles as $row) {

		  $mydata .= "
		  <tr>
		 	<td style='font-size:10px; border: solid thin black;color:white'>$row->id</td>
		  	<td style='font-size:10px; border: solid thin black;color:white'>$row->name</td>
			<td style='font-size:10px; border: solid thin black;color:white'>$row->date</td>
			<td style='border: solid thin black;'>
				<a href='download.php?file=$row->name' title='click to download'><span type='button' style='flex:1;cursor:pointer;text-decoration: none;background-color: rgba(41, 98, 255, 0.5);color: white; border: none;border-radius: 5px'>DOWNLOAD</span></a>			
			</td>
			<td style='border: solid thin black;'>
			<a href='delete.php?del=$row->name' title='click to delete'><span type='button' style='flex:1;cursor:pointer;background-color: red;color: white;text-decoration: none; border: none;border-radius: 5px'>DELETE</span></a>			
			</td>			
			";

		  $mydata .= "
		  </tr>";
	  }
	}
	
 	$mydata .= '</table>
	</div>';

	//$result = $result[0];
	$info->message = $mydata;
	$info->data_type = "filessharing";
	echo json_encode($info);

	die;

	$info->message = "Files sharing app not available";
	$info->data_type = "error";
	echo json_encode($info);

?>