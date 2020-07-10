<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

if(empty($_POST["성명"])){
	alert("필수값이 넘어오지 않았습니다.\\n\\n다시 확인하십시오.");
}

while(list($key,$val) = each($_POST)){
	if($key == "faction" || $key == "x" || $key == "y") continue;
	//if(empty($val)) continue;	// 텍스트박스/입력박스 사용시에 적용
	$arrkey[] = $key;
	$arrval[] = $val;
}


for ($i=1; $i<=count($_FILES); $i++) 
{ 
    if ($_FILES["file".$i][name])  {
        $file[] = attach_file($_FILES["file".$i][name], $_FILES["file".$i][tmp_name]); 
	}
} 



// 메일발송
// 실제 사용시 제목을 수정하십시오.
//$subject = $_POST["이름"] . " 님이 신청한 내용"; 
$subject = "DVD브로셔신청 메일이 도착하였습니다.";

$admin = get_admin('super');
//$admin[mb_email] = $_POST['email'];

ob_start();
include "./post2.php";
$content = ob_get_contents();
ob_end_clean();



mailer($_POST["성명"], $email, $admin[mb_email], $subject, $content, 1, $file);	// 마지막에 숫자 1을 변경하지 마십시오.

// 메일발송 후 돌아가고자 하는 페이지가 index.php 가 아니라면 아래에서 $g4[path] 를 이동하고자 하는 경로로 수정해 주십시오.
alert("신청완료하였습니다.");
window.close();
?>