<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

include_once("$g4[path]/subhead.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

//print_r2(get_defined_constants());

// ����� ȭ�� ��ܰ� ������ ����ϴ� �������Դϴ�.
// ���, ���� ȭ���� �ٹ̷��� �� ������ �����մϴ�.

$table_width = 1004;
?>

<!-- ��� ��� ���� -->
<table align=center width="931" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign=top rowspan="4">
			<img src="<?=$g4['path']?>/images/s_01.jpg" border=0 width="12" height="344" alt=""></td>
		<td valign=top colspan="4" rowspan="2">
			<img src="/img/inc/logo.png" border="0"></td>
		<td valign=top colspan="2">
			<img src="<?=$g4['path']?>/images/s_03.jpg" border=0 width="658" height="40" alt=""></td>
		<td valign=top rowspan="4">
			<img src="<?=$g4['path']?>/images/s_04.jpg" border=0 width="12" height="344" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="2">
			<img src="<?=$g4['path']?>/images/s_05.jpg" border=0 width="658" height="44" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="6">
			<img src="<?=$g4['path']?>/images/s_06.jpg" border=0 width="907" height="44" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="6">
			<img src="<?=$g4['path']?>/images/s_07.jpg" border=0 width="907" height="216" alt=""></td>
	</tr>
	<tr>
		<td valign=top>
			<img src="<?=$g4['path']?>/images/s_08.jpg" border=0 width="12" height="386" alt=""></td>
		<td valign=top background="<?=$g4['path']?>/images/s_09.jpg" border=0 width="1" height="386">
		</td>
		<td valign=top width="180" height="386">
			
<!--���ʸ޴�1����-->
<table border="0" cellspacing="0" cellpadding=0>
<tr><td valign=top height=18></td></tr>
<tr><td valign=top><a href=/bbs/board.php?bo_table=notice><img src=<?=$g4['path']?>/images/left01.gif name="image2" OnMouseOut="image2.src='<?=$g4['path']?>/images/left01.gif';" OnMouseOver="image2.src='<?=$g4['path']?>/images/left01_on.gif';" border=0></a></td></tr>
<tr><td valign=top><a href=/bbs/board.php?bo_table=press><img src=<?=$g4['path']?>/images/left02.gif name="image3" OnMouseOut="image3.src='<?=$g4['path']?>/images/left02.gif';" OnMouseOver="image3.src='<?=$g4['path']?>/images/left02_on.gif';" border=0></a></td></tr>
</table>
<!--���ʸ޴���-->
		
		</td>
		<td valign=top width="34" height="386" bgcolor=ffffff>
		</td>
		<td valign=top colspan="2" width="691" height="386" bgcolor=ffffff>