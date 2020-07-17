<?php

//$file = "http://designwizc.com/sample/tem/1/sample1.php";
//$current = file_get_contents($file);

// POST 방식 함수
function post($url, $fields)
{
    $post_field_string = http_build_query($fields, '', '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
    curl_setopt($ch, CURLOPT_POST, true);
    $response = curl_exec($ch);
    curl_close ($ch);
    return $response;
}
 
// post함수 호출
$current = post('http://designwizc.com/sample/tem/1/sample1.php', array('field1'=>'value1', 'field2'=>'value2'));

echo $current;

?>