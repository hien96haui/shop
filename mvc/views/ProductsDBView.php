<?php
	header('Content-Type: application/json');
	$r=[];
	foreach ($data as $key => $value) {
		$r = $value;
	}	
	echo json_encode($r);
?>