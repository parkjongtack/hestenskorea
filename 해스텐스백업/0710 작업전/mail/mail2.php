<?
$g4_path = "..";        // �̰��� ������ �Ʒ����� 3) �κ��� ���� 
include_once("./_common.php");

// ��ȭ, �޴��� �迭
$phone_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$pax_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$mobile_array = array("010","011","016","017","018","019");


$g4[title] = "";
include_once("$g4[path]/head.sub.php");
?>
<!-- �ѱ� �ʵ������ ���� ������
<SCRIPT LANGUAGE="JavaScript">
<!--
function fo_move(len,fld1,fld2){
	
	if(fld1.value.length == len){
		fld2.focus();
	}
}
</SCRIPT>
//-->
<link href="/img/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.box {border:1px solid #B9B9B9;}
#Visual {
	position:absolute;
	width:1000px;
	height:544px;
	z-index:-1;
	left: 0px;
	top: 118px;
</style>
<script language="JavaScript">
<!--

/* �輱�� - �������߿� �����ڽ��� üũ�ڽ��� �ʼ��������� �� ��� �� �ּ�ó���� �����Ͽ� ����Ͻʽÿ�.

function checkform(){
	//var f = document.form;
	var getobj = document.getElementsByTagName("input");
	var chkfld = false;
	for(var i=0; i<getobj.length; i++){
		//if((getobj[i].type == "checkbox" || getobj[i].type == "radio") && getobj[i].checked == true){
		if(getobj[i].type == "radio" && getobj[i].checked == true){
			chkfld = true;
			break;
		}
	}
	if(chkfld == false){
		alert("�����ڽ� �ʼ�");
		return false;
	}
	return true;
} 
//-->
*/
</script>
<table width="640" border="0" cellpadding="0" cellspacing="0">

	<tr>
		<td>
		<form name="fumail" method="post" action="./update2.php" enctype="multipart/form-data">

		<TABLE width='100%' border='0'cellpadding='4' cellspacing='1'>
		<col width="20%" style='padding-left:20px; height:30px;'>
		<col width="80%">
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		<tr>
			<td height="28" class="D12_43">�̸�</td>
			<td><input class="input_search" type='text' name='����' style="width:100;" required itemname="����"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		
		<tr>
			<td class="D12_43">�ּ�</td>
			<td>
				<input class="input_search" type='text' name='zip1' style="width:30;" readonly itemname="�����ȣ ���ڸ�"> - <input class="input_search" type='text' name='zip2' style="width:30;" readonly itemname="�����ȣ���ڸ�">&nbsp;<a href="javascript:;" onclick="win_zip('fumail', 'zip1', 'zip2', 'addr1', 'addr2');"><img width="91" height="20" src="img/btn_zip.gif" border=0 align=absmiddle></a><br>
				<input class="input_search" type='text' name='addr1' style="width:400;" readonly itemname="�ּ�"><br>
				<input class="input_search" type='text' name='addr2' style="width:400;" itemname="���ּ�">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
				<tr>
			<td height="28" class="D12_43">��ȭ��ȣ</td>
			<td><input class="input_search" type='text' name='��ȭ��ȣ' style="width:100;" required itemname="��ȭ��ȣ"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		<tr>
			<td height="28" class="D12_43">E-mail</td>
			<td><input class="input_search" type='text' name='email' style="width:170;" email required itemname="�̸���"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		</table>

		<p align="center">
				<input type=image id="btn_submit" src="img/send.gif" border=0>&nbsp;&nbsp;&nbsp;<a href="javascript: document.fumail.reset();"><img src="img/cancel.gif" border=0></a>
		</form>
		</td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
</table>
<?
include_once("$g4[path]/tail.sub.php");
?>
