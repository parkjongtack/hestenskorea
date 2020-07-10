<? 
include_once("./_common.php"); 
$g4['title'] = "H&#228;stens Korea"; 
include_once("$g4[path]/head.sub.php"); 
include_once("$g4[path]/lib/latest.lib.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/javascript" src="/script/script.js"></script>
<title>H&#228;stens Korea</title>
<style type="text/css">
* {margin:0; padding:0; font-size:12px;}
ul, li {list-style:none;}

#gnb {position:relative; height:55px; }
#gnb li {float:left; margin-right:10px;}
#gnb li a.menu-title {float:left; padding:5px 51px 2px; color:#ffffff; font:bold;}
#gnb li a.sub-title {float:left; padding:0px 10px 2px; color:#ffffff;}
#gnb li a.sub-title2 {float:left; padding:0px 10px 2px 200px; color:#ffffff;}
#gnb li a.sub-title3 {float:left; padding:0px 10px 2px 365px; color:#ffffff;}
#gnb li a.sub-title4 {float:left; padding:0px 10px 2px 410px; color:#ffffff;}
#gnb li a.sub-title5 {float:left; padding:0px 10px 2px 460px; color:#ffffff;}
#gnb li.current {}
#gnb li ul {position:absolute; left:40px; padding:30px 0px 0px 0px; width:900px}
/*#gnb li ul {position:absolute; top:30px; left:0; padding:10px 10px; border:1px solid black; background:#fafafa;}*/
#gnb li ul li {float:left; margin-right:5px; color:#ffffff;}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
(function($){
	
	$.fn.gnbMenu = function( options ){
		var options = $.extend({}, $.fn.gnbMenu.defaults, options);
		
		var $wrap = $(this);
		var $titles = $wrap.find( options.titles );
		var $layers = $wrap.find( options.layers );
		var $oldActive;
		var $initActive = "";
		var resetTimer;
		
		if( options.isRemember ){
			$wrap.bind("mouseenter", onWrapEnter );
			$wrap.bind("mouseleave", onWrapLeave );
		}
		$titles.bind("mouseover", onTitlesOver);
		
		init();
		
		function init(){
			$layers.hide();
			$initActive = $wrap.find("li.current").find("a.menu-title").trigger("mouseover");
		}
		
		function resetAll(){
			$oldActive.parent().removeClass("current");
			$oldActive.next(options.layers).css("display", "none");
		}
		
		// titles
		function onTitlesOver(){
			var $this = $(this);
			
			if( $oldActive && $oldActive != $this ){
				$oldActive.parent().removeClass("current");
				$oldActive.next(options.layers).css("display", "none");
			}
			$this.parent().addClass("current");
			$this.next(options.layers).css("display", "block");
			
			$oldActive = $this;
		}
		
		// wrap
		function onWrapLeave(){
			resetTimer = setTimeout(function(){
				( $initActive.length ) ? $initActive.trigger("mouseover") : resetAll();
			}, 300);
		}
		function onWrapEnter(){
			clearTimeout( resetTimer );
		}
		
		return this;
	};
	$.fn.gnbMenu.defaults = {
		titles : "a.menu-title",
		layers : ".layer",
		isRemember : true
	}
	
	$(document).ready(function(e) {
		$("#gnb").gnbMenu();
	});
	
})(jQuery);
</script>

<!--ÆE¾÷A￠¼O½º½AAU-->
<script language="JavaScript">
<!--

function getCookie(name) {
var from_idx = document.cookie.indexOf(name+'=');
if (from_idx != -1) { 
from_idx += name.length + 1
to_idx = document.cookie.indexOf(';', from_idx) 
if (to_idx == -1) {
to_idx = document.cookie.length
}
return unescape(document.cookie.substring(from_idx, to_idx))
}
}

var Today = new Date();

 

var CloseDate = new Date("june 30, 2017");//³?A￥A|¾iºIºÐ CØ´c³?AI Ao³ª¸e ÆE¾÷AI ¶ßAo ¾EA½ 
//¾Æ·¡ ³?A￥A|¾i¸| ½±°O A¶A¤CI±aA§CØ A·°¡CN ºIºÐAI ¼O½º¿I´A ≫o°u¾øA½

//January {1¿u}
//February {2¿u}
//March {3¿u}
//April {4¿u}
//May {5¿u}
//June {6¿u}
//July {7¿u}
//August {8¿u}
//September {9¿u}
//October {10¿u}
//November {11¿u}
//December {12¿u} 

//if (Today < CloseDate)
//{
// var blnCookie = getCookie("popup170626");

 //if ( !blnCookie ) {
  //win = window.open('/popup/popup141128.php','popup131031','scrollbars=no,width=400,height=711,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup141223.php','popup131031','scrollbars=no,width=501,height=711,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup150513.php','popup131031','scrollbars=no,width=400,height=634,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup160701.php','popup160701','scrollbars=no,width=500,height=500,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup170626.php','popup170626','scrollbars=no,width=600,height=425,resizable=no,status=no,left=0,top=0');
  //win.focus();

 }
}

//-->
</script>

<!--2017-06-26 새로 추가 - 팝업 시작-->
<script Language="JavaScript">

window.onload = function(){

  if ( notice_getCookie('oviuspopup') != 'done' ){
   
    document.getElementById("popuplayer-1").style.display="inline";
  
  }

  if ( notice_getCookie('oviuspopup2') != 'done' ){
   
    document.getElementById("popuplayer-2").style.display="inline";
  
  }
  
}

function notice_getCookie( name )
{
	var nameOfCookie = name + "=";
	var x = 0;
	while ( x <= document.cookie.length )
	{
	var y = (x+nameOfCookie.length);
		if ( document.cookie.substring( x, y ) == nameOfCookie ) {
			if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
			endOfCookie = document.cookie.length;
		return unescape( document.cookie.substring( y, endOfCookie ) );
		}
		x = document.cookie.indexOf( " ", x ) + 1;
		if ( x == 0 )
			break;
	}

	return "";
}

function setCookie( name, value, expiredays )
{
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"		
}

</script>

<script Language="JavaScript">

function set_popup1()
{
	if(document.frm1.checkpop.checked){
	  //하루 창 띄우지 않기 세팅.
	  setCookie( "oviuspopup", "done" , 1);
	}
  document.getElementById("popuplayer-1").style.display="none";
}

function set_close1()
{
  document.getElementById("popuplayer-1").style.display="none";
}




function set_popup2()
{
	if(document.frm2.checkpop.checked){
	  //하루 창 띄우지 않기 세팅.
	  setCookie( "oviuspopup2", "done" , 1);
	}
  document.getElementById("popuplayer-2").style.display="none";
}

function set_close2()
{
  document.getElementById("popuplayer-2").style.display="none";
}

</script>
<!-- //script end -->

<div id="popuplayer-1" style="border:1px solid #000000;display:none;position:absolute;top:0px;left:0px;z-index:999;">
    <div>
		<a href="http://www.hastenskorea.com/bbs/board.php?bo_table=notice&wr_id=79" target="_blank"><img src="/popup/image/popup170626.jpg" /></a>
	</div>
    <form name="frm1">
    <table style="width:600px; background-color:#222222;">
      <tr style="background-color:#222222;">
	    <td style="width:4%; line-height:20px; padding: 4px 0px 0px 2px;"> <input type="Checkbox" name="checkpop" value="" onclick="set_popup1();"></td>
	    <td style="width:84; color:#ffffff; font-size:10pt; padding:4px 0 0 0;">오늘 하루 이 창을 열지 않음.</td>
	    <td style="width:12%;"><a href="javascript:set_close1();"><span style="color:#ffffff; font-size:10pt;">닫기&nbsp;&nbsp;</span></a></td>
      </tr>
    </table>
    </form>
</div>


<!--ÆE¾÷¼O½º³¡ -->
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- ¿A¸￥AE¸¶¿i½º ±YAoA×±×2 -->
<div id="wrap">
<div id="contents">
<!-- top¸Þ´º -->
<? include "menu_top1.php" ?>
<br>
<!--/div-->
<div>
<table>
<tr>
<td style="padding-top:90px"><img src="img/main_170331.jpg" width="907" height="330" usemap="#msp150820">
	<map name="msp150820">
	<area shape="rect" coords="17,159,342,279" href="http://www.hastenskorea.com/bbs/board.php?bo_table=notice&wr_id=85&page=0&sca=&sfl=&stx=&sst=&sod=&spt=0&page=0" target="" alt="" />
    <area shape="rect" coords="713,266,794,321" href="http://hastenskorea.com/center/map.php" target="" alt="" />
    <area shape="rect" coords="805,266,887,321" href="http://hastenskorea.com/center/map.php#Map2" target="" alt="" />

</map>
</td>
</tr>
</table>
<!--<a href="http://hastenskorea.com/collection/superiaII.php"> <img src="img/main0905.jpg" width="895" height="555"> </a>-->
<!--	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="469">
            <param name="movie" value="img/swf/main04.swf">
            <param name="quality" value="high">
			<param name="wmode" value="transparent"> 
			<embed src="img/swf/main04.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="469">
			</embed>
          </object>-->
</div>

<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="418">
            <param name="movie" value="img/swf/main.swf">
            <param name="quality" value="high">
			<param name="wmode" value="transparent"> 
			<embed src="img/swf/main.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="418">
			</embed>
          </object> --></div>
<!-- //topAI¹IAo -->
<!-- Aß°￡ºIºÐAuA¼ -->
<!--<table width="907" border="0" cellpadding="0" cellspacing="0" background="/img/inc/bg2_1.gif">
  <tr>
    <td><div class="left" style="padding:4px 5px 0 6px;"><a href="etc/bedroom.php"><img src="/img/mai/banner01.gif" border="0"></a></div>
     <div class="left" style="padding:4px 5px 0 0;"><a href="center/dvd.php"><img src="/img/mai/banner02.gif" border="0"></a></div>
    <div class="left" style="padding:4px 6px 0 0;"><table width="295" height="85" border="0" cellpadding="0" cellspacing="0" background="/img/mai/banner03.gif">
     <tr>
      <td valign="top"><div class="D11_b6" style="padding:36 20 0 40"><div id="ico_dot01"><?=latest("simple", "notice", 1, 70); //AO½A±U½ºA²¸i, °O½AÆC¸i, Aa·ACOAU¼o, A|¸n±æAI ?></div></div>
	    <div class="D11_b6" style="padding:8 20 0 40"><div id="ico_dot01"><?=latest("simple", "press", 1, 70); //AO½A±U½ºA²¸i, °O½AÆC¸i, Aa·ACOAU¼o, A|¸n±æAI ?></div></div></td>
     </tr>
    </table> --></div>
   </td>
  </tr>
  <tr>
    <!-- <td><img src="/img/inc/bg3.gif"></td> -->
    </tr>
</table>
<!-- //Aß°￡ºIºÐAuA¼ -->
<!-- bottom -->
<? include "inc/bottom.php" ?>
<!-- //bottom -->
</div>
</div>
<!-- μu¶o´U´I´A ½ºAⓒ·N¹U -->
<? include "inc/right_banner.php" ?>
<!-- //μu¶o´U´I´A ½ºAⓒ·N¹U -->

</div>
</body>
</html>

<? 
include_once("$g4[path]/tail.sub.php"); 
?>