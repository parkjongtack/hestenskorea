<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
?>

<script language="JavaScript">
// ���ڼ� ����
var char_min = parseInt(<?=$comment_min?>); // �ּ�
var char_max = parseInt(<?=$comment_max?>); // �ִ�
</script>

<? if ($cwin==1) { ?><table width=100% cellpadding=10 align=center><tr><td><?}?>

<!-- �ڸ�Ʈ ����Ʈ -->
<div id="commentContents">
<?
for ($i=0; $i<count($list); $i++) {
    $comment_id = $list[$i][wr_id];
?>
<a name="c_<?=$comment_id?>"></a>
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
    <td><? for ($k=0; $k<strlen($list[$i][wr_comment_reply]); $k++) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></td>
    <td width='100%'>

        <table border=0 cellpadding=0 cellspacing=0 width=100%>
        <tr>
            <td height=1 colspan=3 bgcolor="#dddddd"><td>
        </tr>
        <tr>
            <td height=1 colspan=3></td>
        </tr>
        <tr>
            <td valign=top>
                <div style="height:28px; background:url(<?=$board_skin_path?>/img/co_title_bg.gif); clear:both; line-height:28px;">
                <div style="float:left; margin:2px 0 0 2px;">
                <strong><?=$list[$i][name]?></strong>
                <span style="color:#888888; font-size:11px;"><?=$list[$i][datetime]?></span>
                </div>
                <div style="float:right; margin-top:5px;">
                <? if ($is_ip_view) { echo "&nbsp;<span style=\"color:#B2B2B2; font-size:11px;\">{$list[$i][ip]}</span>"; } ?>
                <? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><img src='$board_skin_path/img/co_btn_reply.gif' border=0 align=absmiddle alt='�亯'></a> "; } ?>
                <? if ($list[$i][is_edit]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><img src='$board_skin_path/img/co_btn_modify.gif' border=0 align=absmiddle alt='����'></a> "; } ?>
                <? if ($list[$i][is_del])  { echo "<a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><img src='$board_skin_path/img/co_btn_delete.gif' border=0 align=absmiddle alt='����'></a> "; } ?>
                &nbsp;
                </div>
                </div>

                <!-- �ڸ�Ʈ ��� -->
                <div style='line-height:20px; padding:7px; word-break:break-all; overflow:hidden; clear:both; '>
                <?
                if (strstr($list[$i][wr_option], "secret")) echo "<span style='color:#ff6600;'>*</span> ";
                $str = $list[$i][content];
                if (strstr($list[$i][wr_option], "secret"))
                    $str = "<span class='small' style='color:#ff6600;'>$str</span>";

                $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
                $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i", "<script>doc_write(flash_movie('$1://$2.$3'));</script>", $str);
                $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);' border='0'>", $str);
                echo $str;
                ?>
                </div>
                <? if ($list[$i][trackback]) { echo "<p>".$list[$i][trackback]."</p>"; } ?>
                <span id='edit_<?=$comment_id?>' style='display:none;'></span><!-- ���� -->
                <span id='reply_<?=$comment_id?>' style='display:none;'></span><!-- �亯 -->
                </div>
                <input type=hidden id='secret_comment_<?=$comment_id?>' value="<?=strstr($list[$i][wr_option],"secret")?>">
                <textarea id='save_comment_<?=$comment_id?>' style='display:none;'><?=get_text($list[$i][content1], 0)?></textarea></td>
            </td>
        </tr>
        <tr>
            <td height=5 colspan=3></td>
        </tr>
        </table>

    </td>
</tr>
</table>
<? } ?>
</div>
<!-- �ڸ�Ʈ ����Ʈ -->

<? if ($is_comment_write) { ?>
<!-- �ڸ�Ʈ �Է� -->
<div id=comment_write style="display:none;">
<table width=100% border=0 cellpadding=1 cellspacing=0 bgcolor="#dddddd"><tr><td>
<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style="margin:0px;">
<input type=hidden name=w           id=w value='c'>
<input type=hidden name=bo_table    value='<?=$bo_table?>'>
<input type=hidden name=wr_id       value='<?=$wr_id?>'>
<input type=hidden name=comment_id  id='comment_id' value=''>
<input type=hidden name=sca         value='<?=$sca?>' >
<input type=hidden name=sfl         value='<?=$sfl?>' >
<input type=hidden name=stx         value='<?=$stx?>'>
<input type=hidden name=spt         value='<?=$spt?>'>
<input type=hidden name=page        value='<?=$page?>'>
<input type=hidden name=cwin        value='<?=$cwin?>'>
<input type=hidden name=is_good     value=''>

<table width=100% cellpadding=3 height=156 cellspacing=0 bgcolor="#ffffff" style="border:1px solid #fff; background:url(<?=$board_skin_path?>/img/co_bg.gif) x-repeat;">
<tr>
    <td colspan="2" style="padding:5px 0 0 5px;">
        <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 8);"><img src="<?=$board_skin_path?>/img/co_btn_up.gif" border='0'></span>
        <span style="cursor: pointer;" onclick="textarea_original('wr_content', 8);"><img src="<?=$board_skin_path?>/img/co_btn_init.gif" border='0'></span>
        <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 8);"><img src="<?=$board_skin_path?>/img/co_btn_down.gif" border='0'></span>
        <? if ($is_guest) { ?>
            �̸� <INPUT type=text maxLength=20 size=10 name="wr_name" itemname="�̸�" required class=ed>
            �н����� <INPUT type=password maxLength=20 size=10 name="wr_password" itemname="�н�����" required class=ed>
            <? if ($is_guest) { ?>
            <img id='kcaptcha_image' border='0' width=120 height=60 onclick="imageClick();" style="cursor:pointer;" title="���ڰ� �߾Ⱥ��̴� ��� Ŭ���Ͻø� ���ο� ���ڰ� ���ɴϴ�.">
            <input title="������ ���ڸ� �Է��ϼ���." type="input" name="wr_key" size="10" itemname="�ڵ���Ϲ���" required class=ed>
            <?}?>
        <? } ?>
        <input type=checkbox id="wr_secret" name="wr_secret" value="secret">��б�
        <? if ($comment_min || $comment_max) { ?><span id=char_count></span>����<?}?>
    </td>
</tr>
<tr>
    <td width=95%>
        <textarea id="wr_content" name="wr_content" rows=8 itemname="����" required
        <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?> style='width:100%; word-break:break-all;' class=tx></textarea>
        <? if ($comment_min || $comment_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
    </td>
    <td width=85 align=center>
        <div><input type="image" src="<?=$board_skin_path?>/img/co_btn_write.gif" border=0 accesskey='s'></div>
    </td>
</tr>
</table>
</form>
</td></tr></table>
</div>

<script type="text/javascript"> var md5_norobot_key = ''; </script>
<script type="text/javascript" src="<?="$g4[path]/js/prototype.js"?>"></script>
<script type="text/javascript">
function imageClick() {
    var url = "<?=$g4[bbs_path]?>/kcaptcha_session.php";
    var para = "";
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            asynchronous: true,
            parameters: para, 
            onComplete: imageClickResult
        });
}

function imageClickResult(req) { 
    var result = req.responseText;
    var img = document.createElement("IMG");
    img.setAttribute("src", "<?=$g4[bbs_path]?>/kcaptcha_image.php?t=" + (new Date).getTime());
    document.getElementById('kcaptcha_image').src = img.getAttribute('src');

    md5_norobot_key = result;
}


var save_before = '';
var save_html = document.getElementById('comment_write').innerHTML;

function good_and_write()
{
    var f = document.fviewcomment;
    if (fviewcomment_submit(f)) {
        f.is_good.value = 1;
        f.submit();
    } else {
        f.is_good.value = 0;
    }
}

function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����

    f.is_good.value = 0;

    var s;
    if (s = word_filter_check(document.getElementById('wr_content').value))
    {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        document.getElementById('wr_content').focus();
        return false;
    }

    // ���� ���� ���ֱ�
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("�ڸ�Ʈ�� "+char_min+"���� �̻� ���ž� �մϴ�.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("�ڸ�Ʈ�� "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("�ڸ�Ʈ�� �Է��Ͽ� �ֽʽÿ�.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('�̸��� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('�н����尡 �Էµ��� �ʾҽ��ϴ�.');
            f.wr_password.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined')
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key)
        {
            alert('�ڵ���Ϲ����� ���ڰ� ������� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_key.select();
            f.wr_key.focus();
            return false;
        }
    }

    return true;
}

function comment_box(comment_id, work)
{
    var el_id;
    // �ڸ�Ʈ ���̵� �Ѿ���� �亯, ����
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'comment_write';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // �ڸ�Ʈ ����
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
            if (document.getElementById('secret_comment_'+comment_id).value)
                document.getElementById('wr_secret').checked = true;
            else
                document.getElementById('wr_secret').checked = false;
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        save_before = el_id;
    }

    if (work == 'c') {
        <? if (!$is_member) { ?>imageClick();<? } ?>
    }
}

function comment_delete(url)
{
    if (confirm("�� �ڸ�Ʈ�� �����Ͻðڽ��ϱ�?")) location.href = url;
}

comment_box('', 'c'); // �ڸ�Ʈ �Է����� ���̵��� ó���ϱ����ؼ� �߰� (root��)
</script>
<? } ?>

<? if($cwin==1) { ?></td><tr></table><p align=center><a href="javascript:window.close();"><img src="<?=$board_skin_path?>/img/btn_close.gif" border="0"></a><br><br><?}?>
