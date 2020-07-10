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
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- �����ʸ��콺 �����ױ�2 -->
<div id="wrap">
<div id="contents">
<!-- top�޴� -->
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

    <li><a href="/" onMouseOver='rollover01.src="/img/lnb_01over.gif"' onMouseOut='rollover01.src="/img/lnb_01.gif"'><img src="/img/lnb_01.gif" alt="�޴�1" name="overmenu01" /></a></li> 

    <li><a href="/" onMouseOver='rollover02.src="/img/lnb_02over.gif"' onMouseOut='rollover02.src="/img/lnb_02.gif"'><img src="/img/lnb_02.gif" alt="�޴�2" name="overmenu02" /></a></li>

</ul>-->



	<li class="menu menu1"><a class="menu-title"  href="/collection/vividus.php">�ؽ��ٽ� ħ�� ��ǰ</a>
		<ul class="layer layer1">
			<li class="first-child"><a class="sub-title" href="/collection/vividus.php">������</a></li>
			<li><a class="sub-title" href="/collection/2000TII.php">��Ƽ��Żħ��</a></li>
			<li><a class="sub-title" href="/collection/superiaII.php">������ħ��</a></li>
			<li><a class="sub-title" href="/collection/citationII.php">��������ͺ�ħ��</a></li>
			<!--li><a class="sub-title" href="/collection/acc_01.php">�׼�����</a></li>-->
		</ul>
	</li>
	<li class="menu menu2"><a class="menu-title" href="/collection/acc_main.php"><!--span class="icon icon-10per"></span-->�ؽ��ٽ� ��Ÿ ��ǰ</a>
	<ul class="layer layer2">
			<li class="first-child"><a class="sub-title2" href="/collection/acc_01.php">�׼�����</a></li>
<!--			<li><a class="sub-title" href="/handmade/history.php">�ؽ��ٽ� ����</a></li>-->
		</ul>
	</li>
	<li class="menu menu3"><a class="menu-title" href="/handmade/craftmanship.php">�ؽ��ٽ���ǰ�� Ư¡</a>
		<ul class="layer layer3">
			<li class="first-child"><a class="sub-title3" href="/handmade/craftmanship.php">õ������</a></li>
		<!--	<li><a class="sub-title" href="/handmade/craftmanship.php">��������</a></li>
			<li><a class="sub-title" href="/handmade/spring.php">���������</a></li>
			<li><a class="sub-title" href="/handmade/awards.php">�������� ����</a></li>
			<li><a class="sub-title" href="/handmade/warranty.php">25��ǰ������</a></li> -->
			<li><a class="sub-title" href="/handmade/craftmanship.php">�ؽ��ٽ��� ����</a></li>
			<!--<li><a class="sub-title" href="/natural/down.php">�ٿ�</a></li>-->
		</ul>
	</li>
	<li class="menu menu4"><a class="menu-title" href="/handmade/history.php">�ؽ��ٽ��� ����</a>
		<!--<ul class="layer layer4">
			<li class="first-child"><a class="sub-title4" href="/sleep/about.php">������ ���</a></li>
			<li><a class="sub-title" href="/sleep/10tip.php">������ ���� 10���� ��</a></li>
			<li><a class="sub-title" href="/sleep/bed.php">���� ħ�� ���ù�</a></li> 
		</ul>-->
	</li>
	<li class="menu menu5"><a class="menu-title" href="/center/map.php">�ؽ��ٽ� ����</a>
		<ul class="layer layer5">
			<li class="first-child"><a class="sub-title5" href="/center/map.php">����ȳ�</a></li>
			<li><a class="sub-title" href="/bbs/board.php?bo_table=notice">����&�̺�Ʈ</a></li>
<!--			<li><a class="sub-title" href="http://www.hastens.com/en/STORES/" target="_blank">WORLD STORE</a></li> -->
		</ul>
	</li>
</ul>
</td>
</tr>
</table>
</html>