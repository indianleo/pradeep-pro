<?php
	if($_SERVER['HTTP_HOST']=="localhost"){
		$host="localhost";
		$user="janshrip_dba";
		$pass="z;LAGq%$L.A~";
		$dbas="janshrip_db";
	} 
	else {
		$host="localhost";
		$user="janshrip_dba";
		$pass="z;LAGq%$L.A~";
		$dbas="janshrip_db";
	}
	$data = $_REQUEST['data'];
	$temp = json_decode($data);
	
	$con = mysqli_connect("localhost","root","","shikhar");
	$res = mysqli_query($con,"insert 
									into 
								users(
									`name`,
									`email`,
									`contact`,
									`job`
								) 
								values(
									'$temp->name',
									'$temp->email',
									'$temp->contact',
									'$temp->job'
								)"
						);

	if($res){
		echo "Registration Succesfull";
	} else {
		echo "Error in Registration !!!";
	}
?>