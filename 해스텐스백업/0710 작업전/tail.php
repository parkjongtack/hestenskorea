<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

</td>
		<td valign=top background="<?=$g4['path']?>/images/s_13.jpg" border=0 width="52" height="386">
		</td>
		<td valign=top width="12" height="386">


<!--오른쪽 퀵배너 시작-->
<!--div id=DivMovingLayer style='position:absolute;left:0px;top:0px; z-index:8;display:none;'>

<table width="120" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="/etc/bedroom.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('quick_bedroom','','/img/inc/quick_bedroom_on.gif',0)"><img src="/img/inc/quick_bedroom.gif" name="quick_bedroom" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.hastens.com/HastensFlash/BedChooser/BedChooser.aspx?id=661&epslanguage=EN" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('quick_bedchoose','','/img/inc/quick_bedchoose_on.gif',0)"><img src="/img/inc/quick_bedchoose.gif" name="quick_bedchoose" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="/center/dvd.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('quick_dvd','','/img/inc/quick_dvd_on.gif',0)"><img src="/img/inc/quick_dvd.gif" name="quick_dvd" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="/center/faq.php"><img src="/img/inc/quick_faq.gif" border="0"></a></td>
  </tr>
  <tr>
    <td><a href="/center/qna.php"><img src="/img/inc/quick_qna.gif" border="0"></a></td>
  </tr>
  <tr>
    <td><a href="/center/contact.php"><img src="/img/inc/quick_contact.gif" border="0"></a></td>
  </tr>
  <tr>
    <td><div style="padding:12 0 0 22"><a href="#"><img src="/img/inc/quick_top.gif" border="0"></a></div></td>
  </tr></table>

</div-->

<script language='javascript'>
//움직이는 레이어

//사용함수
function ResetRemocon(){
 
  var DivMovingLayerYFrom, DivMovingLayerYTo, OffsetY, ResetTime;

  ResetTime = 100;

  if (DivMovingLayerRule == 'center'){
    //해상도 기준, 가운데 에서 x만큼 떨어진 곳에 위치

    if (navigator.userAgent.toLowerCase().indexOf("gecko") > -1) {

      if (document.body.clientWidth < ContentsWidth + 10) {

        DivMovingLayer.style.left = parseInt (ContentsWidth / 2, 10) + DivMovingLayerX + 10 + "px";
      }
      else {

        DivMovingLayer.style.left = (DivMovingLayerX + (document.body.clientWidth / 2)) + "px";
      }
    }
    else{

      if (document.body.clientWidth < ContentsWidth) {

        DivMovingLayer.style.left = parseInt (ContentsWidth / 2, 10) + DivMovingLayerX + "px";
      }
      else {

        DivMovingLayer.style.left = (DivMovingLayerX + (document.body.clientWidth / 2)) + "px";
      }
    }
  }
  else if (DivMovingLayerRule == 'left'){
    //해상도와 무관, 왼쪽 에서 x만큼 떨어진 곳에 위치

    DivMovingLayer.style.left = (DivMovingLayerX) + "px";
  }

  DivMovingLayerYFrom = parseInt (DivMovingLayer.style.top, 10);
  DivMovingLayerYTo = DivMovingLayerY + document.body.scrollTop + 1;

  if ( DivMovingLayerYFrom != DivMovingLayerYTo ) {

    OffsetY = Math.ceil( Math.abs( DivMovingLayerYTo - DivMovingLayerYFrom ) / 20 );

    if ( DivMovingLayerYTo < DivMovingLayerYFrom )
      OffsetY = -OffsetY;

    DivMovingLayer.style.top = (DivMovingLayerYFrom + OffsetY) + "px";

    ResetTime = 10;
  }

  setTimeout ("ResetRemocon()", ResetTime);
}

function SetRemocon() {

  DivMovingLayer.style.display = "block";

  DivMovingLayer.style.top = (DivMovingLayerY + document.body.scrollTop + 1) + "px";

  ResetRemocon();
  return true;
}

function NoneRemocon() {

  DivMovingLayer.style.display = "none";
}



if (typeof document.body == "undefined")
  document.body = document.getElementsByTagName("BODY")[0];

var DivMovingLayer = document.getElementById("DivMovingLayer");

//환경설정
var ContentsWidth = 800;//움직이는 레이어를 제외한 콘텐츠 너비, 가운데 정렬에만 해당, 전체 테이블중 제일큰 너비
var DivMovingLayerX = 463;//레이어가 위치할 레프트 값
var DivMovingLayerY = 143;//레어가 위치할 탑 값
var DivMovingLayerRule = 'center';//center -->가운데 정렬을 기준으로 x만큼, left --> 레프트 정렬을 기준으로 x만큼

//레이어 보이기
SetRemocon();
</script>
<!--오른쪽 퀵배너 끝-->


		
		</td>
	</tr>
	<tr>
		<td valign=top colspan="8" background="<?=$g4['path']?>/images/s_15.gif" border=0 width="931" height="79">

<table width="907" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<!--div class="D11_99" style="padding:18 0 5 12;"><a href="http://www.hastens.com/en/" target="_blank">Head H&#228;stens</a><img src="/img/inc/line.gif"><a href="/center/map.php">Contact</a><img src="/img/inc/line.gif"><a href="http://www.hastens.com/en/Ovriga-Sidor/Footerlinks/Activate-warranty/" target="_blank">Activate warranty</a><img src="/img/inc/line.gif"><a href="/center/dvd.php">Order DVD</a><img src="/img/inc/line.gif"-->
		 
		 <? if (!$member['mb_id']) { ?> 
<!-- 로그인 이전--> 
    <a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>">Admin</a> 
    <? } else { ?> 
<!--로그인 이후--> 
    <a href="<?=$g4['bbs_path']?>/logout.php">Logout</a> 
    <? } ?>
                
</div>
	<div class="D11_55" style="padding:0 0 29 12;">Copyrightⓒ2011 H&#228;stens. All rights reserved.</div></td>
    <td width="290">
	<div style="padding:18 0 34 0;"><span class="D11_99" style="padding-right:4;">H&#228;stens Worldwide</span>
	  <select name="name" onChange="goURL(this.value)" style="font-size:11px;font-family:Dotum;margin:0; background-color: #000; color: #ccc; border: 1px solid #999;">
	<option value="http://www.hastens.com/cs-cz/|_blank">Cesky</option>
	<option value="http://www.hastens.com/dk/|_blank">Dansk</option>
	<option value="http://www.hastens.com/de/|_blank">Deutsch</option>
	<option value="http://www.hastens.com/de-at/|_blank">Deutsch (AT)</option>
	<option value="http://www.hastens.com/de-ch/|_blank">Deutsch (CH)</option>
	<option value="http://www.hastens.com/en-ca/|_blank">English (CA) </option>
	<option value="http://www.hastens.com/en-gb/|_blank">English (GB)</option>
	<option value="http://www.hastens.com/en-in/|_blank">English (IN)</option>
	<option value="http://www.hastens.com/en/|_blank">English (International)</option>
	<option value="http://www.hastens.com/en-us/|_blank">English (US)</option>
	<option value="http://www.hastens.com/es/|_blank">Espa&ntilde;ol</option>
	<option value="http://www.hastens.com/fr/|_blank">Fran&ccedil;ais</option>
	<option value="http://www.hastens.com/fr-be/|_blank">Fran&ccedil;ais (BE)</option>
	<option value="http://www.hastens.com/fr-ch/|_blank">Fran&ccedil;ais (CH)</option>
	<option value="http://www.hastens.com/hu/|_blank">Hungarian</option>
	<option value="http://www.hastens.com/it/|_blank">Italiano</option>
	<option value="http://www.hastens.com/it-ch/|_blank">Italiano (CH)</option>
	<option selected="selected" value="hastenskorea.com|_self">Korea</option>
	<option value="http://www.hastens.com/nl-be/|_blank">Nederlands (BE)</option>
	<option value="http://www.hastens.com/nl/|_blank">Nederlands (NL)</option>
	<option value="http://www.hastens.com/no/|_blank">Norsk</option>
	<option value="http://www.hastens.com/pl/|_blank">Polska</option>
	<option value="http://www.hastens.com/fi/|_blank">Suomi</option>
	<option value="http://www.hastens.com/sv/|_blank">Svenska</option>
	<option value="http://www.hastens.com/sv-fi/|_blank">Svenska (FI)</option>
	<option value="http://www.hastens.com/ru/|_blank">Руccкий</option>
    </select>
	  </div></td>
  </tr>
</table>

</div>

</td>
	</tr>
	<tr>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="12" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="1" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="180" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="34" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="34" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="606" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="52" height="1" alt=""></td>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/spacer.gif" width="12" height="1" alt=""></td>
	</tr>
</table>

<!-- 카피라이트 끝 -->

<?
include_once("$g4[path]/tail.sub.php");
?>