<?
$g4_path = "..";        // 이곳의 설정은 아래쪽의 3) 부분을 참고 
include_once("./_common.php");

// 전화, 휴대폰 배열
$phone_array  = array("02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064");//,"0502","0505","0506");
$mobile_array = array("010","011","016","017","018","019");
$product_array = array("정 3짝문","비 3짝문","정 2짝문","비 2짝문","단순 고정창","H형 복합고정창","W형 복합고정창","방범창살");


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
			<td style='font:bold;color:#666666' height="32">· 의뢰인 성명<br><font color="#FFFFFF">·</font> (개인, 법인)</td>
			<td>(한글) <input class="box" type='text' name='성명' style="width:100;" required itemname="성명">&nbsp;&nbsp;&nbsp;(영문) <input class="box" type='text' name='영문성명' style="width:150;" required itemname="영문성명"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 주민등록번호</td>
			<td><input class="box" type='text' name='주민등록번호앞자리' style="width:60;" required itemname="주민등록번호 앞자리"> - <input class="box" type='text' name='주민등록번호뒷자리' style="width:60;" required itemname="주민등록번호 뒷자리"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 법인등록번호</td>
			<td><input class="box" type='text' name='법인등록번호' style="width:134;" required itemname="법인등록번호"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666'>· 주소</td>
			<td>
				<input class="box" type='text' name='zip1' style="width:30;" readonly required itemname="우편번호 앞자리"> - <input class="box" type='text' name='zip2' style="width:30;" readonly required itemname="우편번호뒷자리">&nbsp;<a href="javascript:;" onclick="win_zip('fumail', 'zip1', 'zip2', 'addr1', 'addr2');"><img width="91" height="20" src="/skin/member/basic/img/post_search_btn.gif" border=0 align=absmiddle></a><br>
				<input class="box" type='text' name='addr1' style="width:400;" readonly required itemname="주소"><br>
				<input class="box" type='text' name='addr2' style="width:400;" required itemname="상세주소">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 전화번호</td>
			<td>
				<select class="box" name='전화번호(지역번호)'>
					<option value=''>선택</option>
				<?
				for($a=0;$a<count($phone_array);$a++){
					echo "<option value='$phone_array[$a]'>$phone_array[$a]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='전화번호(국번)' size='4'  maxlength='4' required numeric itemname="전화번호(국번)"> -
				<input class="box" type='text' name='전화번호(번호)' size='4' maxlength='4' required numeric itemname="전화번호(번호)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 팩스번호</td>
			<td>
				<select class="box" name='팩스번호(지역번호)'>
					<option value=''>선택</option>
				<?
				for($a=0;$a<count($phone_array);$a++){
					echo "<option value='$phone_array[$a]'>$phone_array[$a]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='팩스번호(국번)' size='4'  maxlength='4' numeric itemname="팩스번호(국번)"> -
				<input class="box" type='text' name='팩스번호(번호)' size='4' maxlength='4' numeric itemname="팩스번호(번호)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 휴대전화</td>
			<td>
				<select class="box" name='휴대전화(통신사)'>
					<option value=''>선택</option>
				<?
				for($m=0;$m<count($mobile_array);$m++){
					echo "<option value='$mobile_array[$m]'>$mobile_array[$m]</option>";
				}
				?>
				</select>
				<input class="box" type='text' name='휴대전화(국번)' size='4' maxlength='4' numeric itemname="휴대전화(국번)"> -
				<input class="box" type='text' name='휴대전화(번호)' size='4' maxlength='4' numeric itemname="휴대전화(국번)">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 이메일</td>
			<td><input class="box" type='text' name='email' style="width:155;" email required itemname="이메일"> 예 : abcd@bacd.com</td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 발명/고안의 명칭<br><font color="#FFFFFF">·</font> (디자인대상<br><font color="#FFFFFF">·</font> 물품의명칭)</td>
			<td><input class="box" type='text' name='발명고안의명칭' style="width:100%;" required itemname="발명/고안의 명칭"></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 발명/고안의간단<br><font color="#FFFFFF">·</font> 한설명서와 도면<br><font color="#FFFFFF">·</font> (디자인대상 물품<br><font color="#FFFFFF">·</font> 사진 또는 도면</td>
			<td><TEXTAREA NAME="발명고안의간단설명서와도면" ROWS="5" class="box" style="width:99%;" required itemname="발명/고안의 간단설명서와 도면"></TEXTAREA></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 첨부파일 #1</td>
			<td><input class="box" type=file style='width:90%;' name='file1'></td>
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
		</tr>
		<tr>
			<td style='font:bold;color:#666666' height="32">· 첨부파일 #2</td>
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
		 (1) 출원인의 한글과 영문 성명, 주민등록번호, 주소, 연락전화번호<br>
		 (2) 사업자 등록증(법인명의 출원시)<br>
		 (3) 사용인감증명(법인명의 출원시 출원인코드신청서 및 위임장에 날인)<br>
		 (4) 상표의 표장(문자, 도형)과 사용할 상품의 명칭 <br>
		 </tD>
	</tr>
	<tr>	
		<td height="20"></td>
	</tr>
</table>
<?
include_once("$g4[path]/tail.sub.php");
?>
