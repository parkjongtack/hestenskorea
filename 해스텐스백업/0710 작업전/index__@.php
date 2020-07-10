<? 
include_once("./_common.php"); 
$g4['title'] = "H&#228;stens Korea"; 
include_once("$g4[path]/head.sub.php"); 
include_once("$g4[path]/lib/latest.lib.php"); 
?>

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
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- 오른쪽마우스 금지테그2 -->
<div id="wrap">
<div id="contents">
<!-- top메뉴 -->
<? include "menu_top1.php" ?>
<br>
<!--/div-->
<div>
<a href="http://hastenskorea.com/collection/superiaII.php"> <img src="img/main812.jpg" width="907" height="575"> </a>
	<!--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="469">
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
<!-- //top이미지 -->
<!-- 중간부분전체 -->
<!--<table width="907" border="0" cellpadding="0" cellspacing="0" background="/img/inc/bg2_1.gif">
  <tr>
    <td><div class="left" style="padding:4px 5px 0 6px;"><a href="etc/bedroom.php"><img src="/img/mai/banner01.gif" border="0"></a></div>
     <div class="left" style="padding:4px 5px 0 0;"><a href="center/dvd.php"><img src="/img/mai/banner02.gif" border="0"></a></div>
    <div class="left" style="padding:4px 6px 0 0;"><table width="295" height="85" border="0" cellpadding="0" cellspacing="0" background="/img/mai/banner03.gif">
     <tr>
      <td valign="top"><div class="D11_b6" style="padding:36 20 0 40"><div id="ico_dot01"><?=latest("simple", "notice", 1, 70); //최신글스킨명, 게시판명, 출력할줄수, 제목길이 ?></div></div>
	    <div class="D11_b6" style="padding:8 20 0 40"><div id="ico_dot01"><?=latest("simple", "press", 1, 70); //최신글스킨명, 게시판명, 출력할줄수, 제목길이 ?></div></div></td>
     </tr>
    </table> --></div>
   </td>
  </tr>
  <tr>
    <!-- <td><img src="/img/inc/bg3.gif"></td> -->
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

</div>
</body>
</html>

<? 
include_once("$g4[path]/tail.sub.php"); 
?>