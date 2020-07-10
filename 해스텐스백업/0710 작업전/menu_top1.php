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
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
</script>-->
</head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<body oncontextmenu = "return false" ondragstart = "return false" onselectstart = "return false"><!-- 오른쪽마우스 금지테그2 -->
<div id="wrap">
<div id="contents">
<!-- top메뉴 -->
<? include "inc/top_common.php" ?>

  <script type="text/javascript">
  	function imgOver(obj){
		imgOut();
		if (document.getElementById("menu_"+obj).childNodes[0].src.indexOf("_ov") == -1){
			document.getElementById("menu_"+obj).childNodes[0].src = document.getElementById("menu_"+obj).childNodes[0].src.replace(".png", "_ov.png");
			document.getElementById("sub_"+obj).style.display = "block";
		}
	}

	function imgOut(){
		var subCount = document.getElementById("menu").getElementsByTagName("a");
		for (var i=0 ; i < subCount.length ; i++ ){
			document.getElementById("sub_"+i).style.display = "none"; 
			document.getElementById("menu_"+i).childNodes[0].src = document.getElementById("menu_"+i).childNodes[0].src.replace("_ov.png", ".png");
		}
	}

	
	function prevElement() {}
	function leave(evt, element, type){
		evt = evt ? evt : window.event;
		var el = evt.toElement ? evt.toElement : evt.relatedTarget;
		if(this.prevElement)
		if(this.check(el)){
			imgOut();
			this.prevElement = element;
		}
	}
	function check(element, type){
		var node = element;
		while(node){
			if(node == this.prevElement){
				return false;
			}
			if(node == document.body){
				break;
			}
			node = node.parentNode;
		}
		return true;
	}
  </script>



<script language="JavaScript">
<!--
function reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.pgW=innerWidth; document.pgH=innerHeight; onresize=reloadPage; }}
  else if (innerWidth!=document.pgW || innerHeight!=document.pgH) location.reload();
}
reloadPage(true);
//

function findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function showHideLayers() { //v3.0
  var i,p,v,obj,args=showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>

<!--<div class="both"  width="990" height="100" border="0" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td style="padding:20 10 0 0">
	<ul id="gnb">

  <li class="menu menu1"><a class="multi-title"  href="/collection/vividus.php" onMouseOver='rollover01.src="/images/menu1_ov.png"' onMouseOut='rollover01.src="/images/menu1.png"'><img src="/images/menu1.png" border="0" alt="메뉴01" name="rollover01"  /></a>

  		
</li> 
  <li class="menu menu2"><a class="multi-title" href="/collection/acc_06.php" onMouseOver='rollover02.src="/images/menu2_ov.png"' onMouseOut='rollover02.src="/images/menu2.png"'><img src="/images/menu2.png" border="0" alt="메뉴02" name="rollover02"  /></a>
		
		
  </li>
    <li class="menu menu3"><a class="multi-title" href="/handmade/craftmanship.php" onMouseOver='rollover03.src="/images/menu3_ov.png"' onMouseOut='rollover03.src="/images/menu3.png"'><img src="/images/menu3.png" border="0" alt="메뉴03" name="rollover03"  /></a>

  </li>
    <li class="menu menu4"><a class="multi-title" href="/center/map.php" onMouseOver='rollover04.src="/images/menu4_ov.png"' onMouseOut='rollover04.src="/images/menu4.png"'><img src="/images/menu4.png"border="0" alt="메뉴04" name="rollover04"  /></a>

  </li>

		</ul>
	</li>
</ul>
</td>
</tr>
</table>
</div>-->
<div class="both"  width="990" height="100" border="0" style="z-index:100;position:absolute;top:90px;left:50%;width:990px;margin-left:-420px;">
<table cellspacing="0" cellpadding="0" border=0>
	<div onmouseout="leave(event, this)">
		<div id="menu">
			<a href="/collection/vividus.php" id="menu_0" onmouseover="imgOver(0)"><img src="/images/menu1.png"></a>
			<a href="/collection/acc_06.php" id="menu_1" onmouseover="imgOver(1)"><img src="/images/menu2.png"></a>
			<a href="/handmade/craftmanship.php" id="menu_2" onmouseover="imgOver(2)"><img src="/images/menu3.png"></a>
			<a href="/center/map.php" id="menu_3" onmouseover="imgOver(3)"><img src="/images/menu4.png"></a>
		</div>
		<div id="sub_0" style="padding-left:0px; display:none ">
			<a href="/collection/vividus.php"id="sub1_1"><img src="/images/menu1_1.png"></a>
			<a href="/collection/2000TII.php"id="sub1_2"><img src="/images/menu1_2.png"></a>
			<a href="/collection/citationII.php"id="sub1_3"><img src="/images/menu1_3.png"></a>
			<a href="/collection/superiaII.php"id="sub1_4"><img src="/images/menu1_4.png"></a>
			<a href="/collection/topmattress.php"id="sub1_5"><img src="/images/menu1_5.png"></a>
		</div>
		<div id="sub_1" style="padding-left:200px; display:none">
			<a href="/collection/acc_05.php"id="sub2_1"><img src="/images/menu2_1.png"></a>
			<a href="/collection/acc_04.php"id="sub2_2"><img src="/images/menu2_2.png"></a>
			<a href="/collection/acc_07.php"id="sub2_3"><img src="/images/menu2_3.png"></a>
			<a href="/collection/acc_06.php"id="sub2_4"><img src="/images/menu2_4.png"></a>
		</div>
		<div id="sub_2" style="padding-left:400px; display:none">
			<a href="/natural/horsehair.php"id="sub3_1"><img src="/images/menu3_1.png"></a>
			<a href="/handmade/craftmanship.php"id="sub3_2"><img src="/images/menu3_2.png"></a>
			<a href="/handmade/history.php"id="sub3_3"><img src="/images/menu3_3.png"></a>
		</div>
		<div id="sub_3" style="padding-left:650px; display:none">
			<a href="/center/map.php"id="sub4_1"><img src="/images/menu4_1.png"></a>
			<a href="/bbs/board.php?bo_table=notice"id="sub4_2"><img src="/images/menu4_2.png"></a>

		</div>
	</div>
</table>
</div>
</body>
</html>
</html>