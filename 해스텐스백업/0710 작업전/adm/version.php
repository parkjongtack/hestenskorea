<? 
//
// ������(korone)�� , ���Ծƺ�(eagletalon)�Բ��� ����� �ּ̽��ϴ�.
//

$sub_menu = "100400"; 
include_once("./_common.php"); 

auth_check($auth[$sub_menu], "r");

$g4[title] = "����Ȯ��"; 

include_once("./admin.head.php"); 
include_once("$g4[path]/lib/mailer.lib.php"); 

echo "������� : <b>";
$args = "head -1 ".$g4[path]."/HISTORY"; 
system($args); 
echo "</b>";
?> 

<table width=100% border="0" align="left" cellpadding="0" cellspacing="0"> 
<tr> 
    <td> 
        <textarea name="textarea" style='width:100%; line-height:150%; padding:10px;' rows="25" class=tx readonly><?=implode("", file("$g4[path]/HISTORY"));?></textarea> 
    </td> 
</tr> 
</table> 

<? 
include_once("./admin.tail.php"); 
?> 
