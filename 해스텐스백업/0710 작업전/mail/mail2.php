<?
$g4_path = "..";        // 이곳의 설정은 아래쪽의 3) 부분을 참고 
include_once("./_common.php");

// 전화, 휴대폰 배열
$phone_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$pax_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$mobile_array = array("010","011","016","017","018","019");


$g4[title] = "";
include_once("$g4[path]/head.sub.php");
?>
<!-- 한글 필드명으로 인해 사용안함
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

/* 김선용 - 폼내용중에 라디오박스나 체크박스를 필수선택으로 할 경우 이 주석처리를 변경하여 사용하십시오.

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
		alert("라디오박스 필수");
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
			<td height="28" class="D12_43">이름</td>
			<td><input class="input_search" type='text' name='성명' style="width:100;" required itemname="성명"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		
		<tr>
			<td class="D12_43">주소</td>
			<td>
				<input class="input_search" type='text' name='zip1' style="width:30;" readonly itemname="우편번호 앞자리"> - <input class="input_search" type='text' name='zip2' style="width:30;" readonly itemname="우편번호뒷자리">&nbsp;<a href="javascript:;" onclick="win_zip('fumail', 'zip1', 'zip2', 'addr1', 'addr2');"><img width="91" height="20" src="img/btn_zip.gif" border=0 align=absmiddle></a><br>
				<input class="input_search" type='text' name='addr1' style="width:400;" readonly itemname="주소"><br>
				<input class="input_search" type='text' name='addr2' style="width:400;" itemname="상세주소">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
				<tr>
			<td height="28" class="D12_43">전화번호</td>
			<td><input class="input_search" type='text' name='전화번호' style="width:100;" required itemname="전화번호"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#c9d0e5"></td>
		</tr>
		<tr>
			<td height="28" class="D12_43">E-mail</td>
			<td><input class="input_search" type='text' name='email' style="width:170;" email required itemname="이메일"></td>
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
