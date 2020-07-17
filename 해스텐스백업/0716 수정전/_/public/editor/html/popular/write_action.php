<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */

if($_POST['data_register'] = "Y") {

	//$_POST['editor_contents'] = preg_replace('/http%3A/gi',":",$_POST['editor_contents']);

	$str = "insert into test set text_data = '".$_POST['editor_contents']."'";
	//echo $str;
	$result = mysqli_query($db,$str);		

}

echo "<script>location.href='full.html';</script>";

?>