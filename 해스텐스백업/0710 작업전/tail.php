<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// ����� ȭ�� ������ �ϴ��� ����ϴ� �������Դϴ�.
// ����, �ϴ� ȭ���� �ٹ̷��� �� ������ �����մϴ�.
?>

</td>
		<td valign=top background="<?=$g4['path']?>/images/s_13.jpg" border=0 width="52" height="386">
		</td>
		<td valign=top width="12" height="386">


<!--������ ����� ����-->
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
//�����̴� ���̾�

//����Լ�
function ResetRemocon(){
 
  var DivMovingLayerYFrom, DivMovingLayerYTo, OffsetY, ResetTime;

  ResetTime = 100;

  if (DivMovingLayerRule == 'center'){
    //�ػ� ����, ��� ���� x��ŭ ������ ���� ��ġ

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
    //�ػ󵵿� ����, ���� ���� x��ŭ ������ ���� ��ġ

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

//ȯ�漳��
var ContentsWidth = 800;//�����̴� ���̾ ������ ������ �ʺ�, ��� ���Ŀ��� �ش�, ��ü ���̺��� ����ū �ʺ�
var DivMovingLayerX = 463;//���̾ ��ġ�� ����Ʈ ��
var DivMovingLayerY = 143;//��� ��ġ�� ž ��
var DivMovingLayerRule = 'center';//center -->��� ������ �������� x��ŭ, left --> ����Ʈ ������ �������� x��ŭ

//���̾� ���̱�
SetRemocon();
</script>
<!--������ ����� ��-->


		
		</td>
	</tr>
	<tr>
		<td valign=top colspan="8" background="<?=$g4['path']?>/images/s_15.gif" border=0 width="931" height="79">

<table width="907" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<!--div class="D11_99" style="padding:18 0 5 12;"><a href="http://www.hastens.com/en/" target="_blank">Head H&#228;stens</a><img src="/img/inc/line.gif"><a href="/center/map.php">Contact</a><img src="/img/inc/line.gif"><a href="http://www.hastens.com/en/Ovriga-Sidor/Footerlinks/Activate-warranty/" target="_blank">Activate warranty</a><img src="/img/inc/line.gif"><a href="/center/dvd.php">Order DVD</a><img src="/img/inc/line.gif"-->
		 
		 <? if (!$member['mb_id']) { ?> 
<!-- �α��� ����--> 
    <a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>">Admin</a> 
    <? } else { ?> 
<!--�α��� ����--> 
    <a href="<?=$g4['bbs_path']?>/logout.php">Logout</a> 
    <? } ?>
                
</div>
	<div class="D11_55" style="padding:0 0 29 12;">Copyright��2011 H&#228;stens. All rights reserved.</div></td>
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
	<option value="http://www.hastens.com/ru/|_blank">����cc�ܬڬ�</option>
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

<!-- ī�Ƕ���Ʈ �� -->

<?
include_once("$g4[path]/tail.sub.php");
?>