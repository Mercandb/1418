<?php
	session_start();
	$counter_name = "log.txt";
	// Check if a text file exists. If not create one and initialize it to zero.
	if (!file_exists($counter_name)) {
		$f = fopen($counter_name, "w");
		$json['count'] = 0;
		fwrite($f,json_encode($json, JSON_NUMERIC_CHECK));
		fclose($f);
	}
	// Read the current value of our counter file
	$f = fopen($counter_name,"r");
	$json = json_decode(fread($f, filesize($counter_name)), true);
	fclose($f);
	// Has visitor been counted in this session?
	// If not, increase counter value by one
	if(!isset($_SESSION['hasVisited'])){
		$_SESSION['hasVisited']="yes";
		$json['count'] = $json['count'] + 1;

		$json[$json['count']]['date'] = date("Y-m-d H:i:s");

		$f = fopen($counter_name, "w");
		fwrite($f, json_encode($json));
		fclose($f);
	}
	//echo "You are visitor number $counterVal to this site";
	echo file_get_contents("index.html");
?>