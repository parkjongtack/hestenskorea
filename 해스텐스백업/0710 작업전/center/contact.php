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
<div class="both" style="background: url(/img/cen/top_img01_3.gif) no-repeat; width:907; height:75;" >
<? include "../inc/top_menu.php" ?>
</div>
<!-- //top메뉴 -->
<!-- top이미지 -->
<div class="both"><img src="/img/cen/top_img02_3.jpg"></div>
<!-- //top이미지 -->
<!-- 중간부분전체 -->
<table width="907" cellpadding="0" cellspacing="0" background="/img/inc/bg2.gif">
  <tr>
    <td width="181" valign="top">
	<!-- left -->
	  <div class="both" style="padding:18 0 0 23;">
       <div><a href="map.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left01','','/img/cen/left01_on.gif',1)"><img src="/img/cen/left01.gif" name="left01"></a></div>
       <div style="padding-top:2"><a href="faq.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left02','','/img/cen/left02_on.gif',1)"><img src="/img/cen/left02.gif" name="left02"></a></div>
       <div style="padding-top:2"><a href="qna.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left03','','/img/cen/left03_on.gif',1)"><img src="/img/cen/left03.gif" name="left03"></a></div>
       <div style="padding-top:2"><img src="/img/cen/left04_on.gif" name="left04"></div>
       <div style="padding-top:2"><a href="dvd.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('left05','','/img/cen/left05_on.gif',1)"><img src="/img/cen/left05.gif" name="left05"></a></div>
       <div style="padding-top:2"><a href="http://www.hastens.com/en/Ovriga-Sidor/Footerlinks/ABOUT-HASTENS/Activate-warranty/" target="_blank" onMouseOver="MM_swapImage('left06','','/img/cen/left06_on.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="/img/cen/left06.gif" name="left06"></a></div>
       <div style="height:100;">&nbsp;</div>
       </div>
	   <!-- //left -->
    </td>
    <td width="726" valign="top">
	<div class="both" style="padding:25 0 0 34"><div class="D11_66"> HOME > 고객센터 > 1:1 문의하기</div></div>
	<div class="both" style="padding:6 0 0 34"><img src="/img/cen/tt_contact.gif" width="138" height="24"></div>
	<!-- 게시판테이블 -->

	<div class="both" style="padding:20 0 0 34">
	  <table width="640" border="0" cellspacing="0" cellpadding="0" class="D12_43">
        <tr>
          <td colspan="2"><img src="/img/cen/contact_img01.gif"></td>
        </tr>

        <tr>
          <td colspan="2">
          	<iframe frameborder=0 width='640' height=400 name='sub_frame' src="/mail/mail.php" align='center'></iframe> 
          </td>
        </tr>
      </table>

	</div>
	<div class="both" style="height:60;"></div>
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
</body>
</html>
