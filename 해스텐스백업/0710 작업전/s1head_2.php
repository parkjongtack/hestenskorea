<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/subhead.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

//print_r2(get_defined_constants());

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.

$table_width = 1004;
?>


<!-- 상단 배경 시작 -->
<table align=center width="931" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign=top rowspan="4">
			<img src="<?=$g4['path']?>/images/s_01.gif" border=0 width="12" height="343" alt=""></td>
		<td valign=top colspan="4" rowspan="2">
			<a href="/"><img src="/img/inc/logo.png" border="0"></a></td>
		<td valign=bottom align=right colspan="2" width="658">
<div class="right" style="padding:25 10 0 0;">
<div class="D11_99">
<a href="http://blog.naver.com/hastenskorea" target="_blank"><img src="/images/util01.gif" border="0"></a>&nbsp;&nbsp;<a href="http://twitter.com/hastensglobal" target="_blank"><img src="/images/util02.gif"border="0"></a>&nbsp;&nbsp;<a href="http://www.facebook.com/hastensglobal" target="_blank"><img src="/images/util03.gif"border="0"></a>&nbsp;&nbsp;<a href="mailto:info@hastensseoul.com" target="_blank"><img src="/images/util04.gif"border="0"></a>
</div>
</div>

		</td>
		<td valign=top rowspan="4">
			<img src="<?=$g4['path']?>/images/s_04.gif" border=0 width="12" height="343" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="2">
			<img src="<?=$g4['path']?>/images/s_04.gif" border=0 width="658" height="43" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="6" width="907" height="44" align=center>
		<? include "../menu_top2.php" ?>

<div align=center id="Layer1" style="background: url(../../img/boa/top_img01.gif) no-repeat; width:907; height:75;">
	

          
		</td>
	</tr>
	<tr>
		<td valign=top colspan="6">
			<img src="../../img/boa/top_img02.jpg" border=0  alt=""></td>
	</tr>
	<tr>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/s_04.gif" border=0 width="12" height="386" alt=""></td>
		<td valign=top background="<?=$g4['path']?>/images/s_09.jpg" border=0 width="1" height="386">
		</td>
		<td valign=top width="180" height="386" bgcolor=000000>

<!--왼쪽메뉴1시작-->
<table border="0" cellspacing="0" cellpadding=0>
<tr><td valign=top width=22></td><td valign=top height=18></td></tr>
<tr><td valign=top width=22></td><td valign=top>
<a href="/center/map.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('map','','/img/cen/left011_on.gif',1)"><img src="/img/cen/left011.gif" border="0" name="map"></a></div>
       <div style="padding-top:2"><a href="http://www.hastenskorea.com/bbs/board.php?bo_table=notice" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('notice','','/img/cen/left012_on.gif',1)"><img src="/img/cen/left012.gif" border="0" name="notice"></a></div>
	   <div style="padding-top:2 paddig-right:3"><a href="http://hastenskorea.com/bbs/board.php?bo_table=press" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('bodo','','/img/cen/bodo_on.gif',1)"><img src="/img/cen/bodo.gif" border="0" name="bodo"></a></div>
</td></tr>
</table>
<!--왼쪽메뉴끝-->

</td>
		<td valign=top width="34" height="386" bgcolor=ffffff>
		</td>
		<td valign=top colspan="2" width="640" height="386" bgcolor=ffffff>


<!--왼쪽메뉴1시작-->
<table border="0" cellspacing="0" cellpadding=0>
<tr><td valign=top height=25></td></tr>
<tr><td valign=top><div class="D11_66"> HOME > 해스텐스 뉴스&이벤트 </div></td></tr>
<tr><td valign=top height=10></td></tr>
</table>
<!--왼쪽메뉴끝-->
