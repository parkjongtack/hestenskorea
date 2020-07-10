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
<!--�˾�â�ҽ�����-->
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

 

var CloseDate = new Date("January 31, 2017");//��¥����κ� �ش糯�� ������ �˾��� ���� ���� 
//�Ʒ� ��¥��� ���� �����ϱ����� ÷���� �κ��� �ҽ��ʹ� �������

//January {1��}
//February {2��}
//March {3��}
//April {4��}
//May {5��}
//June {6��}
//July {7��}
//August {8��}
//September {9��}
//October {10��}
//November {11��}
//December {12��} 

if (Today < CloseDate)
{
 var blnCookie = getCookie("popup160701");

 if ( !blnCookie ) {
  //win = window.open('/popup/popup141128.php','popup131031','scrollbars=no,width=400,height=711,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup141223.php','popup131031','scrollbars=no,width=501,height=711,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup150513.php','popup131031','scrollbars=no,width=400,height=634,resizable=no,status=no,left=0,top=0');  
  //win = window.open('/popup/popup160701.php','popup160701','scrollbars=no,width=500,height=500,resizable=no,status=no,left=0,top=0');  
  win = window.open('/popup/popup161209.php','popup160701','scrollbars=no,width=500,height=400,resizable=no,status=no,left=0,top=0');
  win.focus();

 }
}

//-->
</script>




<!--�˾��ҽ��� -->
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- �����ʸ��콺 �����ױ�2 -->
<div id="wrap">
<div id="contents">
<!-- top�޴� -->
<? include "menu_top1.php" ?>
<br>
<!--/div-->
<div>
<table>
<tr>
<td style="padding-top:90px"><img src="img/main_160429.jpg" width="907" usemap="#msp150820">
	<map name="msp150820">
	<area shape="rect" coords="4,186,383,324" href="http://www.hastenskorea.com/bbs/board.php?bo_table=notice&wr_id=77&page=0&sca=&sfl=&stx=&sst=&sod=&spt=0&page=0" target="" alt="" />
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
<!-- //top�̹��� -->
<!-- �߰��κ���ü -->
<!--<table width="907" border="0" cellpadding="0" cellspacing="0" background="/img/inc/bg2_1.gif">
  <tr>
    <td><div class="left" style="padding:4px 5px 0 6px;"><a href="etc/bedroom.php"><img src="/img/mai/banner01.gif" border="0"></a></div>
     <div class="left" style="padding:4px 5px 0 0;"><a href="center/dvd.php"><img src="/img/mai/banner02.gif" border="0"></a></div>
    <div class="left" style="padding:4px 6px 0 0;"><table width="295" height="85" border="0" cellpadding="0" cellspacing="0" background="/img/mai/banner03.gif">
     <tr>
      <td valign="top"><div class="D11_b6" style="padding:36 20 0 40"><div id="ico_dot01"><?=latest("simple", "notice", 1, 70); //�ֽű۽�Ų��, �Խ��Ǹ�, ������ټ�, ������� ?></div></div>
	    <div class="D11_b6" style="padding:8 20 0 40"><div id="ico_dot01"><?=latest("simple", "press", 1, 70); //�ֽű۽�Ų��, �Խ��Ǹ�, ������ټ�, ������� ?></div></div></td>
     </tr>
    </table> --></div>
   </td>
  </tr>
  <tr>
    <!-- <td><img src="/img/inc/bg3.gif"></td> -->
    </tr>
</table>
<!-- //�߰��κ���ü -->
<!-- bottom -->
<? include "inc/bottom.php" ?>
<!-- //bottom -->
</div>
</div>
<!-- ����ٴϴ� ��ũ�ѹ� -->
<? include "inc/right_banner.php" ?>
<!-- //����ٴϴ� ��ũ�ѹ� -->

</div>
</body>
</html>

<? 
include_once("$g4[path]/tail.sub.php"); 
?>