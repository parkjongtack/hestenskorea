<?
include_once("_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("_head.php");
?>

<table width="907" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<div class="D11_99" style="padding:14 0 40 0;"><a href="http://www.hastens.com/en/" target="_blank">Head Hastens</a><img src="/img/inc/line.gif"><a href="/center/map.php">Contact</a><img src="/img/inc/line.gif"><a href="http://www.hastens.com/en/Ovriga-Sidor/Footerlinks/ABOUT-HASTENS/Activate-warranty/" target="_blank">Activate warranty</a><img src="/img/inc/line.gif"><a href="/center/dvd.php">Order DVD</a><img src="/img/inc/line.gif">

    <? if (!$member['mb_id']) { ?> 
<!-- 로그인 이전--> 
    <a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>">Admin</a> 
    <? } else { ?> 
<!--로그인 이후--> 
    <a href="<?=$g4['bbs_path']?>/logout.php">Logout</a> 
    <? } ?>
    
	</div>
	</td>
    <td width="290">
	<div style="padding:14 0 40 0;"><span class="D11_99" style="padding-right:4;">Hastens Worldwide</span>
	  <select name="name" onChange="goURL(this.value)">
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