<?php
$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/javascript" src="/script/script.js"></script>
<title>H&#228;stens Korea</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- 오른쪽마우스 금지테그2 -->
<div id="wrap">
<div id="contents">
<!-- top메뉴 -->
<? include "../inc/top_common.php" ?>
<? include "../menu_top2.php"?>
<div class="both" style="background: url(/img/cen/top_img01.gif) no-repeat; width:907; height:75;" >
<!--<? include "../inc/top_menu.php" ?>-->
</div>
<!-- //top메뉴 -->
<!-- top이미지 -->
<div class="both"><img src="/img/cen/top_img02.jpg"></div>
<!-- //top이미지 -->
<!-- 중간부분전체 -->
<table width="907" border="0" cellpadding="0" cellspacing="0" background="/img/inc/bg2.gif">
  <tr>
    <td width="181" valign="top">
	<!-- left -->
	  <div class="both" style="padding:18 0 0 23;">
       <div><img src="/img/cen/left01_on.gif"></div>
       <div style="padding-top:2"><a href="faq.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left02','','/img/cen/left02_on.gif',1)"><img src="/img/cen/left02.gif" name="left02"></a></div>
       <div style="padding-top:2"><a href="qna.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left03','','/img/cen/left03_on.gif',1)"><img src="/img/cen/left03.gif" name="left03"></a></div>
       <div style="padding-top:2"><a href="contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left04','','/img/cen/left04_on.gif',1)"><img src="/img/cen/left04.gif" name="left04"></a></div>
       <div style="padding-top:2"><a href="dvd.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left05','','/img/cen/left05_on.gif',1)"><img src="/img/cen/left05.gif" name="left05"></a></div>
       <div style="padding-top:2"><a href="http://www.hastens.com/en/Ovriga-Sidor/Footerlinks/ABOUT-HASTENS/Activate-warranty/" target="_blank" onMouseOver="MM_swapImage('left06','','/img/cen/left06_on.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="/img/cen/left06.gif" name="left06"></a></div>
       <div style="height:100;">&nbsp;</div>
       </div>
	   <!-- //left -->
    </td>
    <td width="726" valign="top">
	<div class="both" style="padding:25 0 0 34"><div class="D11_66"> HOME > 고객센터 > 해스텐스 연락처</div></div>
	<div class="both" style="padding:6 0 0 34"><img src="/img/cen/tt_map.gif"></div>
	<div class="both" style="padding:14 14 0 0;text-align:right;"><a href="map.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('tab_map01','','/img/cen/tab_map01_on.gif',1)"><img src="/img/cen/tab_map01.gif" name="tab_map01" border="0" style="margin-right:3;"></a><a href="map2.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('tab_map02','','/img/cen/tab_map02_on.gif',1)"><img src="/img/cen/tab_map02_on.gif" name="tab_map02" border="0"style="margin-right:3;"></a></div>
	<div class="both" id="greyline" style="width:720;"><hr></div>
	<!-- 게시판테이블 -->
	<div class="both" style="padding:10 0 0 54"><img src="/img/cen/map2_2.gif" border="0" usemap="#Map"></div>
	<div class="both" style="height:100;"></div>
	<!-- //게시판테이블 -->
	</td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom"><img src="/img/inc/bg3.gif"></td>
    </tr>
</table>
<!-- //중간부분전체 -->
<!-- bottom -->
<? include "../inc/bottom.php" ?>
<!-- //bottom -->
</div>
</div>
<!-- 따라다니는 스크롤바 -->
<? include "../inc/right_banner.php" ?>
<!-- //따라다니는 스크롤바 -->

<map name="Map">
  <area shape="rect" coords="109,44,294,61" href="mailto:hastens@hastenskorea.com">
  <area shape="rect" coords="109,67,305,82" href="mailto:marketing@hastenskorea.com">
</map>
</body>
</html>
