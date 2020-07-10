<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$img_width = 100;
$img_height = 70;
$img_quality = 95;

if (!$img_width) alert("게시판 설정 : 여분 필드 1 에 목록에서 보여질 이미지의 폭을 설정하십시오. (픽셀 단위)");
if (!$img_height) alert("게시판 설정 : 여분 필드 2 에 목록에서 보여질 이미지의 높이를 설정하십시오. (픽셀 단위)");
if (!$img_quality) alert("게시판 설정 : 여분 필드 3 에 목록에서 보여질 이미지의 질(quality)을 비율로 설정하십시오. (100 이하)");
if (!function_exists("imagecopyresampled")) alert("GD 2.0.1 이상 버전이 설치되어 있어야 사용할 수 있는 갤러리 게시판 입니다.");

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';

@mkdir($thumb_path, 0707);
@chmod($thumb_path, 0707);

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>

<style>
.board_top { clear:both; }

.board_list { clear:both; width:100%; table-layout:fixed; margin:-14px 0 0 0; }
.board_list th { font-weight:bold; font-size:12px; } 
.board_list th { white-space:nowrap; height:34px; overflow:hidden; text-align:center; } 

.board_list tr.bg0 { background-color:#ffffff; } 
.board_list tr.bg1 { background-color:#ffffff; } 

.board_list td { padding:.5em; }
.board_list td.num { color:#999999; text-align:center; }
.board_list td.checkbox { text-align:center; }
.board_list td.subject { overflow:hidden;font-family: "Dotum"; color:#536097; font-size: 12px;letter-spacing:-1px ;line-height : 1.2;font-weight:bold;}
.board_list td.subject a:link {color:#536097; text-decoration: none;font-weight:bold;}
.board_list td.subject a:visited {color: #536097; text-decoration: none;font-weight:bold;}
.board_list td.subject a:hover {color: #000; text-decoration: none;font-weight:bold;}
.board_list td.subject a:active {color: #536097; text-decoration: none;font-weight:bold;}


.board_list td.name { padding:0 0 0 10px; }
.board_list td.datetime { font:normal 11px; text-align:center; }
.board_list td.hit { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.good { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.nogood { font:normal 11px tahoma; color:#BABABA; text-align:center; }

.board_list .notice { font-weight:normal; }
.board_list .current { font:bold 11px tahoma; color:#E15916; }
.board_list .comment { font-family:Tahoma; font-size:10px; color:#EE5A00; }

.board_button { clear:both; margin:0px 0 0 0; }

.board_page { clear:both; text-align:center; margin:3px 0 0 0; }
.board_page a:link {color:#434343; text-decoration: none;}
.board_page a:visited {color: #434343; text-decoration: none;}
.board_page a:hover {color: #000; text-decoration: none;font-weight:bold;letter-spacing:-1px }
.board_page a:active {color: #434343; text-decoration: none;}

.board_search { text-align:center; margin:0px 0 0 0; }
.board_search .stx { height:20px; width:180px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
    <div class="board_top">
        <div style="float:left;">
            <form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
            <option value=''>전체</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
        </div>
    </div>
    <div style="padding: 35 0 0 0;">

    <!-- 검색 -->
    <div style="float:right;" class="board_search">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
        <select name="sfl">
            <option value="wr_subject">제목</option>
            <option value="wr_content">내용</option>
        </select>
        <input name="stx" class="stx" maxlength="15" itemname="검색어" required value='<?=stripslashes($stx)?>'>
        <input type="image" src="<?=$board_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">
        </form>
    </div>
    
    
<!-- 제목 -->
<form name="fboardlist" method="post" style="margin:0;">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>

<table width=100% border=0 cellpadding=0 cellspacing=0 style="font-weight:bold; color:#505050;" class="board_list">
<tr height=34 align=center>
    <td background='<?=$board_skin_path?>/img/title_bg2.gif' style="padding:0px 0 5 0px;" class="D12B_FF">제목</td>
    <?/**/?><td background='<?=$board_skin_path?>/img/title_bg2.gif' width=80 style="padding:0px 0 5 0px;" class="D12B_FF"><?=subject_sort_link('wr_datetime', $qstr2, 1)?>작성일</a></td>
    <!--<td width=40>날짜</td>
    <td width=50>조회</td>-->
    <?/*?><td width=40 title='마지막 코멘트 쓴 시간'><?=subject_sort_link('wr_last', $qstr2, 1)?>최근</a></td><?*/?>
    <? if ($is_good) { ?><td width=40><?=subject_sort_link('wr_good', $qstr2, 1)?>추천</a></td><?}?>
    <? if ($is_nogood) { ?><td width=40><?=subject_sort_link('wr_nogood', $qstr2, 1)?>비추천</a></td><?}?>
</tr>
</table>

<table width=100% border=0 cellpadding=0 cellspacing=0>

<!-- 목록 -->
<? 
for ($i=0; $i<count($list); $i++) 
{ 
    $img = "<img src='$board_skin_path/img/noimage.gif' border=0 title='이미지 없음'>";
    $thumb = $thumb_path.'/'.$list[$i][wr_id];
    // 썸네일 이미지가 존재하지 않는다면
    if (!file_exists($thumb)) {
        $file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file];
        // 업로드된 파일이 이미지라면
        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file)) {
            $size = getimagesize($file);
            if ($size[2] == 1)
                $src = imagecreatefromgif($file);
            else if ($size[2] == 2)
                $src = imagecreatefromjpeg($file);
            else if ($size[2] == 3)
                $src = imagecreatefrompng($file);
            else
                break;

            $rate = $img_width / $size[0];
            $height = (int)($size[1] * $rate);

            // 계산된 썸네일 이미지의 높이가 설정된 이미지의 높이보다 작다면
            if ($height < $img_height)
                // 계산된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $height);
            else
                // 설정된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $img_height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $img_width, $height, $size[0], $size[1]);
            imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $img_quality);
            chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
        }
    }

    if (file_exists($thumb))
        $img = "<img src='$thumb' border=0>";
		else
        if(preg_match("/\.(swf|wma|asf)$/i","$file") && file_exists($file))
       { $img = "<script>doc_write(flash_movie('$file', 'flash$i', '$img_width', '$img_height', 'transparent'));</script>"; }


        
?>
<tr align=center>

    <td align=left style='word-break:break-all; padding-top:5px; padding-bottom:5px;'>
     <table width="100%" class="board_list">
     	<tr>
     		<td width="114" style="padding: 15 0 0 0;">
			<? 
			echo "<a href='{$list[$i][href]}'>";
			echo $img;
			echo "</a>";
			?>
     		</td>
     		<td valign=top>
			<table>
				<tr>
					<td class="subject" style="padding: 15 0 0 0;">
     			<? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        if ($is_category && $list[$i][ca_name]) { 
            echo "<span class=small>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</span> ";
        }
        $style = "";
        if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
            echo "<a href='{$list[$i][href]}'><span style='padding:0 0 0 5;'>{$list[$i][subject]}</span></a>";
        if ($list[$i][comment_cnt]) 
            echo "<a href=\"{$list[$i][comment_href]}\"><span class='D12_99'>{$list[$i][comment_cnt]}</span></a>";
        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
        echo " " . $list[$i][icon_new];
        // echo " " . $list[$i][icon_file];
        echo " " . $list[$i][icon_link];
        // echo " " . $list[$i][icon_hot];
        echo " " . $list[$i][icon_secret];
        echo $nobr_end;

        if ($list[$i]['wr_datetime'] >= date("Y-m-d H:i:s", $g4['server_time'] - (86300 * 30))) { 
				echo " " . $list[$i][icon_hot]; 
				} 
						
        ?>
		</td>
		</tr><tr>
		<td class=small>
        <font color=#AAAAAA><span class="D12_99"><?=cut_str(strip_tags($list[$i][wr_content]),150,"…")?></span></font>
		</td></tr></table>
     		</td>
     		<td width=10></td>
     	</tr>
    </table>
        </td>
    </td>
    <td width=80><span class="D12_43"><?=$list[$i][datetime]?></span></td>
    <?/*?><td width=40><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][last2]?></span></td><?*/?>
    <? if ($is_good) { ?><td align="center" width=40><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][wr_good]?></span></td><? } ?>
    <? if ($is_nogood) { ?><td align="center" width=40><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][wr_nogood]?></span></td><? } ?>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#c9d0e5></td></tr>
<?}?>
<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
</table>
</form>

<div style="clear:both; margin-top:7px; height:31px;">
    <div style="float:left;">
    <? if ($list_href) { ?>
    <a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" align=absmiddle border='0'></a>
    <? } ?>
    <? if ($is_checkbox) { ?>
    <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" border='0' align=absmiddle></a>
    <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" border='0' align=absmiddle></a>
    <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" border='0' align=absmiddle></a>
    <? } ?>
    </div>

    <div style="float:right;">
    <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border="0"></a><? } ?>
    </div>
</div>


<!-- 페이지 -->
<div class="board_page">

    <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/page_search_prev.gif' border=0 align=absmiddle title='이전검색'></a>"; } ?>
    <?
    // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
    //echo $write_pages;
    $write_pages = str_replace("처음", "<img src='$board_skin_path/img/page_begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
    $write_pages = str_replace("이전", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
    $write_pages = str_replace("다음", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
    $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/page_end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
    $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><span style=\"color:#B3B3B3; font-size:12px;\">$1</span></b>", $write_pages);
    $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><span style=\"color:#4D6185; font-size:12px;\">$1</span></b>", $write_pages);
    ?>
    <?=$write_pages?>
    <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/page_search_next.gif' border=0 align=absmiddle title='다음검색'></a>"; } ?>

</div>

</td></tr></table>
<div style="padding: 35 0 0 0;">

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
