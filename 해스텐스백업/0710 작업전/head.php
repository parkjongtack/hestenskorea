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
<div class="D11_99"><a href="/">홈</a><img src="/img/inc/line.gif"><a href="/bbs/board.php?bo_table=press">보도자료</a><img src="/img/inc/line.gif"><a href="/bbs/board.php?bo_table=notice">공지사항</a><img src="/img/inc/line.gif"><a href="/center/map.php">고객센터</a></div>
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
			
<div align=center id="Layer1" style="background: url(../../img/boa/top_img01.gif) no-repeat; width:907; height:75;">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="75">
            <param name="movie" value="../../img/swf/topmenu.swf">
            <param name="quality" value="high">
			<param name="wmode" value="transparent"> 
            <embed src="../../img/swf/topmenu.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="75">
			</embed>
          </object>
</div>
          
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
<tr><td valign=top width=22></td><td valign=top><a href=/bbs/board.php?bo_table=notice><img src=<?=$g4['path']?>/images/left01.gif name="image2" OnMouseOut="image2.src='<?=$g4['path']?>/images/left01.gif';" OnMouseOver="image2.src='<?=$g4['path']?>/images/left01_on.gif';" border=0></a></td></tr>
<tr><td valign=top width=22></td><td valign=top><a href=/bbs/board.php?bo_table=press><img src=<?=$g4['path']?>/images/left02.gif name="image3" OnMouseOut="image3.src='<?=$g4['path']?>/images/left02.gif';" OnMouseOver="image3.src='<?=$g4['path']?>/images/left02_on.gif';" border=0></a></td></tr>
</table>
<!--왼쪽메뉴끝-->

</td>
		<td valign=top width="34" height="386" bgcolor=ffffff>
		</td>
		<td align=center valign=top colspan="2" width="640" height="386" bgcolor=ffffff>