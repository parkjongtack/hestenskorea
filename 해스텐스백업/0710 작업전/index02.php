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
<? include "inc/top_common.php" ?>
<div class="both"  width="907" height="100" border="0" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td style="padding:30 10 0 0">
	<ul id="gnb">
	<li class="menu menu1"><a class="menu-title" href="/collection/vividus.php">해스텐스침대</a>
		<ul class="layer layer1">
			<li class="first-child"><a class="sub-title" href="/collection/vividus.php">비비더스</a></li>
			<li><a class="sub-title" href="/collection/2000TII.php">컨티넨털 침대</a></li>
			<li><a class="sub-title" href="/collection/superiaII.php">프레임 침대</a></li>
			<li><a class="sub-title" href="/collection/citationII.php">어드저스터블 침대</a></li>
			<li><a class="sub-title" href="/collection/acc_01.php">액세서리</a></li>
		</ul>
	</li>
	<li class="menu menu2"><a class="menu-title" href="/handmade/craftmanship.php"><span class="icon icon-10per">수제침대</span></a>
		<ul class="layer layer2">
			<li class="first-child"><a class="sub-title2" href="/handmade/craftmanship.php">해스텐스 명장</a></li>
			<li><a class="sub-title" href="/handmade/history.php">해스텐스 역사</a></li>
		</ul>
	</li>
	<li class="menu menu3"><a class="menu-title" href="/natural/horsehair.php">천연소재</a>
		<ul class="layer layer3">
			<li class="first-child"><a class="sub-title3" href="/natural/horsehair.php">호올스헤어</a></li>
			<li><a class="sub-title" href="/natural/cotton.php">순면</a></li>
			<li><a class="sub-title" href="/natural/wool.php">양모</a></li>
			<li><a class="sub-title" href="/natural/flax.php">천연 아마</a></li>
			<li><a class="sub-title" href="/natural/pine.php">소나무</a></li>
			<li><a class="sub-title" href="/natural/steel.php">스틸</a></li>
			<li><a class="sub-title" href="/natural/down.php">다운</a></li>
		</ul>
	</li>
	<li class="menu menu4"><a class="menu-title" href="/sleep/about.php">명품수면</a>
		<ul class="layer layer4">
			<li class="first-child"><a class="sub-title4" href="/sleep/about.php">수면의 비밀</a></li>
			<li><a class="sub-title" href="/sleep/10tip.php">숙면을 위한 10가지 팁</a></li>
			<li><a class="sub-title" href="/sleep/bed.php">좋은 침대 선택법</a></li>
		</ul>
	</li>
	<li class="menu menu5"><a class="menu-title" href="/stores/cheongdam.php">해스텐스 코리아</a>
		<ul class="layer layer5">
			<li class="first-child"><a class="sub-title5" href="/stores/cheongdam.php">청담플래그십스토어</a></li>
			<li><a class="sub-title" href="/center/map2.php">해스텐스코리아</a></li>
			<li><a class="sub-title" href="http://www.hastens.com/en/STORES/" target="_blank">WORLD STORE</a></li>
		</ul>
	</li>
</ul>
</td>
</tr>
</table>
<!--/div-->
<div>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="374">
            <param name="movie" value="img/swf/main03.swf">
            <param name="quality" value="high">
			<param name="wmode" value="transparent"> 
			<embed src="img/swf/main03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="374">
			</embed>
          </object>
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
<!-- <? include "inc/right_banner.php" ?> -->
<!-- //따라다니는 스크롤바 -->

</div>
</body>
</html>

<? 
include_once("$g4[path]/tail.sub.php"); 
?>