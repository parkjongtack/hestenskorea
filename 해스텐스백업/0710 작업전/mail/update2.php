<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

if(empty($_POST["����"])){
	alert("�ʼ����� �Ѿ���� �ʾҽ��ϴ�.\\n\\n�ٽ� Ȯ���Ͻʽÿ�.");
}

while(list($key,$val) = each($_POST)){
	if($key == "faction" || $key == "x" || $key == "y") continue;
	//if(empty($val)) continue;	// �ؽ�Ʈ�ڽ�/�Է¹ڽ� ���ÿ� ����
	$arrkey[] = $key;
	$arrval[] = $val;
}


for ($i=1; $i<=count($_FILES); $i++) 
{ 
    if ($_FILES["file".$i][name])  {
        $file[] = attach_file($_FILES["file".$i][name], $_FILES["file".$i][tmp_name]); 
	}
} 



// ���Ϲ߼�
// ���� ���� ������ �����Ͻʽÿ�.
//$subject = $_POST["�̸�"] . " ���� ��û�� ����"; 
$subject = "DVD��μŽ�û ������ �����Ͽ����ϴ�.";

$admin = get_admin('super');
//$admin[mb_email] = $_POST['email'];

ob_start();
include "./post2.php";
$content = ob_get_contents();
ob_end_clean();



mailer($_POST["����"], $email, $admin[mb_email], $subject, $content, 1, $file);	// �������� ���� 1�� �������� ���ʽÿ�.

// ���Ϲ߼� �� ���ư����� �ϴ� �������� index.php �� �ƴ϶�� �Ʒ����� $g4[path] �� �̵��ϰ��� �ϴ� ��η� ������ �ֽʽÿ�.
alert("��û�Ϸ��Ͽ����ϴ�.");
window.close();
?>