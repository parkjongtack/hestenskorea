<? 
include_once("./_common.php"); 
$g4['title'] = "Hastens - H&#228;stens Beds"; 
include_once("$g4[path]/head.sub.php"); 
include_once("$g4[path]/lib/latest.lib.php"); 
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/javascript" src="/script/script.js"></script>
<title>Hastens - H&#228;stens Beds</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- 오른쪽마우스 금지테그2 -->
<div id="wrap">
<div id="contents">
<!-- top메뉴 -->
<? include "inc/top_common.php" ?>
<div class="both">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="418">
            <param name="movie" value="img/swf/main.swf">
            <param name="quality" value="high">
			<embed src="img/swf/main.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="418">
			</embed>
          </object></div>
<!-- //top이미지 -->
<!-- 중간부분전체 -->
<table width="907" border="0" cellpadding="0" cellspacing="0" background="/img/inc/bg2_1.gif">
  <tr>
    <td><div class="left" style="padding:4px 5px 0 6px;"><a href="etc/bedroom.php"><img src="/img/mai/banner_01.gif" border="0"></a></div>
     <div class="left" style="padding:4px 5px 0 0;"><a href="center/dvd.php"><img src="/img/mai/banner_02.gif" border="0"></a></div>
    <div class="left" style="padding:4px 6px 0 0;"><table width="295" height="85" border="0" cellpadding="0" cellspacing="0" background="/img/mai/banner_03.gif">
     <tr>
      <td valign="top"><div class="D11_b6" style="padding:36 20 0 40"><div id="ico_dot01"><?=latest("simple", "notice", 1, 70); //최신글스킨명, 게시판명, 출력할줄수, 제목길이 ?></div></div>
	    <div class="D11_b6" style="padding:8 20 0 40"><div id="ico_dot01"><?=latest("simple", "press", 1, 70); //최신글스킨명, 게시판명, 출력할줄수, 제목길이 ?> </a></div></div></td>
     </tr>
    </table></div>
   </td>
  </tr>
  <tr>
    <td><img src="/img/inc/bg3.gif"></td>
    </tr>
</table>
<!-- //중간부분전체 -->
<!-- bottom -->
<? include "inc/bottom.php" ?>
<!-- //bottom -->
</div>
</div>
<!-- 따라다니는 스크롤바 -->
<? include "inc/right_banner.php" ?>
<!-- //따라다니는 스크롤바 -->
</body>
</html>

<? 
include_once("$g4[path]/tail.sub.php"); 
?>