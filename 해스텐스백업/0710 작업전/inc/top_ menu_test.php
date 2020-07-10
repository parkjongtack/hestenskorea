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



<div class="both"  width="907" height="100" border="0" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td style="padding:30 10 0 0">
	<ul id="gnb">
	<li class="menu menu1"><a class="menu-title" href="/collection/vividus.php">�ؽ��ٽ�ħ��</a>
		<ul class="layer layer1">
			<li class="first-child"><a class="sub-title" href="/collection/vividus.php">������</a></li>
			<li><a class="sub-title" href="/collection/2000TII.php">��Ƽ���� ħ��</a></li>
			<li><a class="sub-title" href="/collection/superiaII.php">������ ħ��</a></li>
			<li><a class="sub-title" href="/collection/citationII.php">��������ͺ� ħ��</a></li>
			<li><a class="sub-title" href="/collection/acc_01.php">�׼�����</a></li>
		</ul>
	</li>
	<li class="menu menu2"><a class="menu-title" href="/handmade/craftmanship.php"><span class="icon icon-10per">����ħ��</span></a>
		<ul class="layer layer2">
			<li class="first-child"><a class="sub-title2" href="/handmade/craftmanship.php">�ؽ��ٽ� ����</a></li>
			<li><a class="sub-title" href="/handmade/history.php">�ؽ��ٽ� ����</a></li>
		</ul>
	</li>
	<li class="menu menu3"><a class="menu-title" href="/natural/horsehair.php">õ������</a>
		<ul class="layer layer3">
			<li class="first-child"><a class="sub-title3" href="/natural/horsehair.php">ȣ�ý����</a></li>
			<li><a class="sub-title" href="/natural/cotton.php">����</a></li>
			<li><a class="sub-title" href="/natural/wool.php">���</a></li>
			<li><a class="sub-title" href="/natural/flax.php">õ�� �Ƹ�</a></li>
			<li><a class="sub-title" href="/natural/pine.php">�ҳ���</a></li>
			<li><a class="sub-title" href="/natural/steel.php">��ƿ</a></li>
			<li><a class="sub-title" href="/natural/down.php">�ٿ�</a></li>
		</ul>
	</li>
	<li class="menu menu4"><a class="menu-title" href="/sleep/about.php">��ǰ����</a>
		<ul class="layer layer4">
			<li class="first-child"><a class="sub-title4" href="/sleep/about.php">������ ���</a></li>
			<li><a class="sub-title" href="/sleep/10tip.php">������ ���� 10���� ��</a></li>
			<li><a class="sub-title" href="/sleep/bed.php">���� ħ�� ���ù�</a></li>
		</ul>
	</li>
	<li class="menu menu5"><a class="menu-title" href="/stores/cheongdam.php">�ؽ��ٽ� �ڸ���</a>
		<ul class="layer layer5">
			<li class="first-child"><a class="sub-title5" href="/stores/cheongdam.php">û���÷��׽ʽ����</a></li>
			<li><a class="sub-title" href="/center/map2.php">�ؽ��ٽ��ڸ���</a></li>
			<li><a class="sub-title" href="http://www.hastens.com/en/STORES/" target="_blank">WORLD STORE</a></li>
		</ul>
	</li>
</ul>
</td>
</tr>
</table>
</div>
<div>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="907" height="374">
            <param name="movie" value="img/swf/main03.swf">
            <param name="quality" value="high">
			<param name="wmode" value="transparent"> 
			<embed src="img/swf/main03.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="907" height="374">
			</embed>
          </object>
</div>