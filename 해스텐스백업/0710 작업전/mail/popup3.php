<?
$g4_path = "..";        // �̰��� ������ �Ʒ����� 3) �κ��� ���� 
include_once("./_common.php");

// ��ȭ, �޴��� �迭
$phone_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$mobile_array = array("010","011","016","017","018","019");
$product_array = array("�� 3¦��","�� 3¦��","�� 2¦��","�� 2¦��","�ܼ� ����â","H�� ���հ���â","W�� ���հ���â","���â��");


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
<link href="/images/style.css" rel="stylesheet" type="text/css">
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
<table width="700" border="0" cellpadding="0" cellspacing="0">
	<tr>	
		<td height="80"></td>
	</tr>
	<tr>
		<td><img src="/images/104.gif"></tD>
	</tr>
	<tr>
		<td>
		<form name="fumail" method="post" action="./update2.php" enctype="multipart/form-data">

		<TABLE width='100%' border='0'cellpadding='4' cellspacing='1'>
		<col width="20%" style='padding-left:20px; height:30px;' bgcolor="#F4F3F2">
		<col width="80%">
		<tr>
			<td colspan="2" height="10"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �Ƿ��� ����<br><font color="#FFFFFF">��</font> (����, ����)</td>
			<td>(�ѱ�) <input class="box" type='text' name='����' style="width:100;" required itemname="����">&nbsp;&nbsp;&nbsp;(����) <input class="box" type='text' name='��������' style="width:150;" required itemname="��������"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �ֹε�Ϲ�ȣ</td>
			<td><input class="box" type='text' name='�ֹε�Ϲ�ȣ���ڸ�' style="width:60;" required itemname="�ֹε�Ϲ�ȣ ���ڸ�"> - <input class="box" type='text' name='�ֹε�Ϲ�ȣ���ڸ�' style="width:60;" required itemname="�ֹε�Ϲ�ȣ ���ڸ�"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� ���ε�Ϲ�ȣ</td>
			<td><input class="box" type='text' name='���ε�Ϲ�ȣ' style="width:134;" required itemname="���ε�Ϲ�ȣ"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666'>�� �ּ�</td>
			<td>
				<input class="box" type='text' name='zip1' style="width:30;" readonly required itemname="�����ȣ ���ڸ�"> - <input class="box" type='text' name='zip2' style="width:30;" readonly required itemname="�����ȣ���ڸ�">&nbsp;<a href="javascript:;" onclick="win_zip('fumail', 'zip1', 'zip2', 'addr1', 'addr2');"><img width="91" height="20" src="/skin/member/basic/img/post_search_btn.gif" border=0 align=absmiddle></a><br>
				<input class="box" type='text' name='addr1' style="width:400;" readonly required itemname="�ּ�"><br>
				<input class="box" type='text' name='addr2' style="width:400;" required itemname="���ּ�">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� ��ȭ��ȣ</td>
			<td>
				<select class="box" name='��ȭ��ȣ(������ȣ)'>
					<option value=''>����</option>
				<?
				for($a=0;$a<count($phone_array);$a++){
					echo "<option value='$phone_array[$a]'>$phone_array[$a]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='��ȭ��ȣ(����)' size='4'  maxlength='4' required numeric itemname="��ȭ��ȣ(����)"> -
				<input class="box" type='text' name='��ȭ��ȣ(��ȣ)' size='4' maxlength='4' required numeric itemname="��ȭ��ȣ(��ȣ)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �ѽ���ȣ</td>
			<td>
				<select class="box" name='�ѽ���ȣ(������ȣ)'>
					<option value=''>����</option>
				<?
				for($a=0;$a<count($phone_array);$a++){
					echo "<option value='$phone_array[$a]'>$phone_array[$a]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='�ѽ���ȣ(����)' size='4'  maxlength='4' numeric itemname="�ѽ���ȣ(����)"> -
				<input class="box" type='text' name='�ѽ���ȣ(��ȣ)' size='4' maxlength='4' numeric itemname="�ѽ���ȣ(��ȣ)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �޴���ȭ</td>
			<td>
				<select class="box" name='�޴���ȭ(��Ż�)'>
					<option value=''>����</option>
				<?
				for($m=0;$m<count($mobile_array);$m++){
					echo "<option value='$mobile_array[$m]'>$mobile_array[$m]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='�޴���ȭ(����)' size='4' maxlength='4' numeric itemname="�޴���ȭ(����)"> -
				<input class="box" type='text' name='�޴���ȭ(��ȣ)' size='4' maxlength='4' numeric itemname="�޴���ȭ(����)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �̸���</td>
			<td><input class="box" type='text' name='email' style="width:155;" email required itemname="�̸���"> �� : abcd@bacd.com</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �߸�/����� ��Ī<br><font color="#FFFFFF">��</font> (�����δ��<br><font color="#FFFFFF">��</font> ��ǰ�Ǹ�Ī)</td>
			<td><input class="box" type='text' name='�߸����Ǹ�Ī' style="width:100%;" required itemname="�߸�/����� ��Ī"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� �߸�/����ǰ���<br><font color="#FFFFFF">��</font> �Ѽ����� ����<br><font color="#FFFFFF">��</font> (�����δ�� ��ǰ<br><font color="#FFFFFF">��</font> ���� �Ǵ� ����</td>
			<td><TEXTAREA NAME="�߸����ǰ��ܼ����͵���" ROWS="5" class="box" style="width:99%;" required itemname="�߸�/����� ���ܼ����� ����"></TEXTAREA></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� ÷������ #1</td>
			<td><input class="box" type=file style='width:90%;' name='file1'></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">�� ÷������ #2</td>
			<td><input class="box" type=file style='width:90%;' name='file2'></td>
		</tr>
		</table>

		<p align="center">
				<input type=image id="btn_submit" src="/mail/send.gif" border=0>&nbsp;&nbsp;&nbsp;<a href="javascript: document.fumail.reset();"><img src="/mail/cancel.gif" border=0></a>
		</form>
		</td>
	</tr>
	<tr>
		<td><img src="/images/105.gif"></td>
	</tr>
	<tr>
		<td>
		 (1) ������� �ѱ۰� ���� ����, �ֹε�Ϲ�ȣ, �ּ�, ������ȭ��ȣ<br>
		 (2) ����� �����(���θ��� �����)<br>
		 (3) ����ΰ�����(���θ��� ����� ������ڵ��û�� �� �����忡 ����)<br>
		 (4) ��ǥ�� ǥ��(����, ����)�� ����� ��ǰ�� ��Ī <br>
		 </tD>
	</tr>
	<tr>	
		<td height="20"></td>
	</tr>
</table>
<?
include_once("$g4[path]/tail.sub.php");
?>
