<?php
	error_reporting(E_ALL);
	//echo $_POST['contents'];
	//echo $_SERVER['DOCUMENT_ROOT'];
	//exit;

	$contents = stripslashes($_POST['contents']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('d.m.Y');
	$time = date('H:i:s A');

	$file = $_SERVER['DOCUMENT_ROOT']."/sample/editor/html/popular/logs.html";

	$current = file_get_contents($file);
	$current = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">'.$contents;
	file_put_contents($file, $current);

	$contents = stripslashes($_POST['css_vw_area']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('d.m.Y');
	$time = date('H:i:s A');

	$file = $_SERVER['DOCUMENT_ROOT']."/sample/editor/html/popular/index_vw.css";

	$current = file_get_contents($file).$contents;
	//$current = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">'.$contents;
	file_put_contents($file, $current);

	$contents = stripslashes($_POST['css_px_area']);
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('d.m.Y');
	$time = date('H:i:s A');

	$file = $_SERVER['DOCUMENT_ROOT']."/sample/editor/html/popular/index_px.css";

	$current = file_get_contents($file).$contents;
	//$current = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">'.$contents;
	file_put_contents($file, $current);

?>