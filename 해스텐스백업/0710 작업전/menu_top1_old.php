<html>
<style type="text/css">
* {margin:0; padding:0; font-size:12px;}
ul, li {list-style:none;}

#gnb {position:relative; height:55px; }
#gnb li {float:left; margin-right:10px;}
#gnb li a.menu-title {float:left; padding:5px 22px 2px; color:#ffffff; font:bold; font-size:14px;}
#gnb li a.sub-title {float:left; padding: 0px 10px 2px;  color:#ffffff;}
#gnb li a.sub-title2 {float:left; padding:0px 10px 2px 200px; color:#ffffff;}
#gnb li a.sub-title3 {float:left; padding:0px 10px 2px 370px; color:#ffffff;}
#gnb li a.sub-title4 {float:left; padding:0px 10px 2px 430px; color:#ffffff;}
#gnb li a.sub-title5 {float:left; padding:0px 10px 2px 690px; color:#ffffff;}
#gnb li.current {}
#gnb li ul {position:absolute; left:12px; padding:30px 0px 0px 0px; width:900px}
/*#gnb li ul {position:absolute; top:30px; left:0; padding:10px 10px; border:1px solid black; background:#fafafa;}*/
#gnb li ul li {float:left; margin-right:5px; color:#ffffff;}
A:link {text-decoration:none}
A:visited {text-decoration:none}
A:hover {text-decoration:none}
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
<script language="javascript"> 
<!-- 
function OpenWindow(url,intWidth,intHeight) { 
window.open(url, "_blank", "width="+intWidth+",height="+intHeight+",resizable=1,scrollbars=1") ;
}
//-->
</script> 
<div class="both"  width="990" height="100" border="0" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td style="padding:20 10 0 0">
	<ul id="gnb">
<!--
<ul id="lnb">

    <li><a href="/" onMouseOver='rollover01.src="/img/lnb_01over.gif"' onMouseOut='rollover01.src="/img/lnb_01.gif"'><img src="/img/lnb_01.gif" alt="메뉴1" name="overmenu01" /></a></li> 

    <li><a href="/" onMouseOver='rollover02.src="/img/lnb_02over.gif"' onMouseOut='rollover02.src="/img/lnb_02.gif"'><img src="/img/lnb_02.gif" alt="메뉴2" name="overmenu02" /></a></li>

</ul>-->



	<li class="menu menu1"><a class="menu-title"  href="/collection/vividus.php">해스텐스 침대 제품</a>
		<ul class="layer layer1">
			<li class="first-child"><a class="sub-title" href="/collection/vividus.php">비비더스</a></li>
			<li><a class="sub-title" href="/collection/2000TII.php">컨티넨탈침대</a></li>
			<li><a class="sub-title" href="/collection/superiaII.php">프레임침대</a></li>
			<li><a class="sub-title" href="/collection/citationII.php">어드저스터블침대</a></li>
			<!--li><a class="sub-title" href="/collection/acc_01.php">액세서리</a></li>-->
		</ul>
	</li>
	<li class="menu menu2"><a class="menu-title" href="/collection/acc_main.php"><!--span class="icon icon-10per"></span-->해스텐스 기타 제품</a>
	<ul class="layer layer2">
			<li class="first-child"><a class="sub-title2" href="/collection/acc_01.php">액세서리</a></li>
<!--			<li><a class="sub-title" href="/handmade/history.php">해스텐스 역사</a></li>-->
		</ul>
	</li>
	<li class="menu menu3"><a class="menu-title" href="/handmade/craftmanship.php">해스텐스제품의 특징</a>
		<ul class="layer layer3">
			<li class="first-child"><a class="sub-title3" href="/handmade/craftmanship.php">천연소재</a></li>
		<!--	<li><a class="sub-title" href="/handmade/craftmanship.php">장인정신</a></li>
			<li><a class="sub-title" href="/handmade/spring.php">스프링기술</a></li>
			<li><a class="sub-title" href="/handmade/awards.php">인증서와 수상</a></li>
			<li><a class="sub-title" href="/handmade/warranty.php">25년품질보증</a></li> -->
			<li><a class="sub-title" href="/handmade/craftmanship.php">해스텐스의 명장</a></li>
			<!--<li><a class="sub-title" href="/natural/down.php">다운</a></li>-->
		</ul>
	</li>
	<li class="menu menu4"><a class="menu-title" href="/handmade/history.php">해스텐스의 역사</a>
		<!--<ul class="layer layer4">
			<li class="first-child"><a class="sub-title4" href="/sleep/about.php">수면의 비밀</a></li>
			<li><a class="sub-title" href="/sleep/10tip.php">숙면을 위한 10가지 팁</a></li>
			<li><a class="sub-title" href="/sleep/bed.php">좋은 침대 선택법</a></li> 
		</ul>-->
	</li>
	<li class="menu menu5"><a class="menu-title" href="/center/map.php">해스텐스 서울</a>
		<ul class="layer layer5">
			<li class="first-child"><a class="sub-title5" href="/center/map.php">매장안내</a></li>
			<li><a class="sub-title" href="/bbs/board.php?bo_table=notice">뉴스&이벤트</a></li>
<!--			<li><a class="sub-title" href="http://www.hastens.com/en/STORES/" target="_blank">WORLD STORE</a></li> -->
		</ul>
	</li>
</ul>
</td>
</tr>
</table>
</html>