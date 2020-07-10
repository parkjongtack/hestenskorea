<?
$sub_menu = "300100";
include_once("./_common.php");
include_once ("$g4[path]/lib/cheditor4.lib.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

function b_draw($pos, $color='red') {
    return "border-{$pos}-width:1px; border-{$pos}-color:{$color}; border-{$pos}-style:solid; ";
}

$sql = " select count(*) as cnt from $g4[group_table] ";
$row = sql_fetch($sql);
if (!$row[cnt])
    alert("�Խ��Ǳ׷��� �Ѱ� �̻� �����Ǿ�� �մϴ�.", "./boardgroup_form.php");

$html_title = "�Խ���";
if ($w == "") {
    $html_title .= " ����";

    $bo_table_attr = "required alphanumericunderline";

    $board[bo_count_delete] = '1';
    $board[bo_count_modify] = '1';
    $board[bo_read_point] = $config[cf_read_point];
    $board[bo_write_point] = $config[cf_write_point];
    $board[bo_comment_point] = $config[cf_comment_point];
    $board[bo_download_point] = $config[cf_download_point];

    $board[bo_gallery_cols] = '4';
    $board[bo_table_width] = '97';
    $board[bo_page_rows] = $config[cf_page_rows];
    $board[bo_subject_len] = '60';
    $board[bo_new] = '24';
    $board[bo_hot] = '100';
    $board[bo_image_width] = '600';
    $board[bo_upload_count] = '2';
    $board[bo_upload_size] = '1048576';
    $board[bo_reply_order] = '1';
    $board[bo_use_search] = '1';
    $board[bo_skin] = 'basic';
    $board[gr_id] = $gr_id;
    $board[bo_disable_tags] = "script|iframe";
    $board[bo_use_secret] = 0;
} else if ($w == "u") {
    $html_title .= " ����";

    if (!$board[bo_table])
        alert("�������� ���� �Խ��� �Դϴ�.");

    if ($is_admin == "group") {
        if ($member[mb_id] != $group[gr_admin]) 
            alert("�׷��� Ʋ���ϴ�.");
    }

    $bo_table_attr = "readonly style='background-color:#dddddd'";
}

if ($is_admin != "super") {
    $group = get_group($board[gr_id]);
    $is_admin = is_admin($member[mb_id]);
}

$g4[title] = $html_title;
include_once ("./admin.head.php");
?>

<script src="<?=$g4[cheditor4_path]?>/cheditor.js"></script>
<?=cheditor1('bo_content_head', '100%', '200');?>
<?=cheditor1('bo_content_tail', '100%', '200');?>

<form name=fboardform method=post onsubmit="return fboardform_submit(this)" enctype="multipart/form-data">
<input type=hidden name="w"     value="<?=$w?>">
<input type=hidden name="sfl"   value="<?=$sfl?>">
<input type=hidden name="stx"   value="<?=$stx?>">
<input type=hidden name="sst"   value="<?=$sst?>">
<input type=hidden name="sod"   value="<?=$sod?>">
<input type=hidden name="page"  value="<?=$page?>">
<input type=hidden name="token" value="<?=$token?>">
<table width=100% cellpadding=0 cellspacing=0 border=0>
<colgroup width=5% class='left'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=75% class='col2 pad2'>
<tr>
    <td colspan=3 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$html_title?></td>
</tr>
<tr><td colspan=3 class='line1'></td></tr>
<tr class='ht'>
    <td></td>
    <td>TABLE</td>
    <td><input type=text class=ed name=bo_table size=30 maxlength=20 <?=$bo_table_attr?> itemname='TABLE' value='<?=$board[bo_table] ?>'>
        <? 
        if ($w == "") 
            echo "������, ����, _ �� ���� (������� 20�� �̳�)";
        else 
            echo "<a href='$g4[bbs_path]/board.php?bo_table=$board[bo_table]'><img src='$g4[admin_path]/img/icon_view.gif' border=0 align=absmiddle></a>";
        ?>
    </td>
</tr>
<tr class='ht'>
    <td></td>
    <td>�׷�</td>
    <td>
        <?=get_group_select('gr_id', $board[gr_id], "required itemname='�׷�'");?>
        <? if ($w=='u') { ?><a href="javascript:location.href='./board_list.php?sfl=a.gr_id&stx='+document.fboardform.gr_id.value;">���ϱ׷�Խ��Ǹ��</a><?}?></td>
</tr>
<tr class='ht'>
    <td></td>
    <td>�Խ��� ����</td>
    <td>
        <input type=text class=ed name=bo_subject size=60 maxlength=120 required itemname='�Խ��� ����' value='<?=get_text($board[bo_subject])?>'>
    </td>
</tr>
<tr class='ht'>
    <td></td>
    <td>��� �̹���</td>
    <td>
        <input type=file name=bo_image_head class=ed size=60>
        <?
        if ($board[bo_image_head])
            echo "<br><a href='$g4[path]/data/file/{$board['bo_table']}/$board[bo_image_head]' target='_blank'>$board[bo_image_head]</a> <input type=checkbox name='bo_image_head_del' value='$board[bo_image_head]'> ����";
        ?>
    </td>
</tr>
<tr class='ht'>
    <td></td>
    <td>�ϴ� �̹���</td>
    <td>
        <input type=file name=bo_image_tail class=ed size=60>
        <? 
        if ($board[bo_image_tail]) 
            echo "<br><a href='$g4[path]/data/file/{$board['bo_table']}/$board[bo_image_tail]' target='_blank'>$board[bo_image_tail]</a> <input type=checkbox name='bo_image_tail_del' value='$board[bo_image_tail]'> ����";
        ?>
    </td>
</tr>

<? if ($w == "u") { ?>
<tr class='ht'>
    <td></td>
    <td>ī��Ʈ ����</td>
    <td>
        <input type=checkbox name=proc_count value=1> ī��Ʈ�� �����մϴ�.
        (���� ���ۼ� : <?=number_format($board[bo_count_write])?> , ���� �ڸ�Ʈ�� : <?=number_format($board[bo_count_comment])?>)
        <?=help("�Խ��� ��Ͽ��� ���� ��ȣ�� ���� ���� ��쿡 üũ�Ͻʽÿ�.")?>
    </td>
</tr>
<? } ?>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td>
        <input type=checkbox name=chk_admin value=1>
        <?=help("���� �׷쿡 ���� �Խ����� ������ �����ϰ� ������ ��쿡 üũ�մϴ�.");?>
    </td>
    <td>�Խ��� ������</td>
    <td><input type=text class=ed name=bo_admin maxlength=20 value='<?=$board[bo_admin]?>'></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_list_level value=1></td>
    <td>��Ϻ��� ����</td>
    <td>
        <?=get_member_level_select('bo_list_level', 1, 10, $board[bo_list_level]) ?>
        <?=help("���� 1�� ��ȸ��, 2 �̻� ȸ���Դϴ�.\n������ 10 �� ���� �����ϴ�.", 50)?>
    </td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_read_level value=1></td>
    <td>���б� ����</td>
    <td><?=get_member_level_select('bo_read_level', 1, 10, $board[bo_read_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_write_level value=1></td>
    <td>�۾��� ����</td>
    <td><?=get_member_level_select('bo_write_level', 1, 10, $board[bo_write_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_reply_level value=1></td>
    <td>�۴亯 ����</td>
    <td><?=get_member_level_select('bo_reply_level', 1, 10, $board[bo_reply_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_comment_level value=1></td>
    <td>�ڸ�Ʈ���� ����</td>
    <td><?=get_member_level_select('bo_comment_level', 1, 10, $board[bo_comment_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_link_level value=1></td>
    <td>��ũ ����</td>
    <td><?=get_member_level_select('bo_link_level', 1, 10, $board[bo_link_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_upload_level value=1></td>
    <td>���ε� ����</td>
    <td><?=get_member_level_select('bo_upload_level', 1, 10, $board[bo_upload_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_download_level value=1></td>
    <td>�ٿ�ε� ����</td>
    <td><?=get_member_level_select('bo_download_level', 1, 10, $board[bo_download_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_html_level value=1></td>
    <td>HTML ���� ����</td>
    <td><?=get_member_level_select('bo_html_level', 1, 10, $board[bo_html_level]) ?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_trackback_level value=1></td>
    <td>Ʈ���龲�� ����</td>
    <td>
        <?=get_member_level_select('bo_trackback_level', 1, 10, $board[bo_trackback_level]) ?>
        <?=help("Ʈ�����̶�? ���� �����Ͽ� '���� �ۼ��ϴ� ���� �ٸ�������� �˸��� ���' �Դϴ�.\n\n�ڼ��� ������ �˻��������� 'Ʈ����'���� �˻��� �غ��ñ� �ٶ��ϴ�.", 50, -70)?>
    </td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_count_modify value=1></td>
    <td>���� ���� �Ұ�</td>
    <td>�ڸ�Ʈ <input type=text class=ed name=bo_count_modify size=3 required numeric itemname='���� ���� �Ұ� �ڸ�Ʈ��' value='<?=$board[bo_count_modify]?>'>�� �̻� �޸��� �����Ұ�</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_count_delete value=1></td>
    <td>���� ���� �Ұ�</td>
    <td>�ڸ�Ʈ <input type=text class=ed name=bo_count_delete size=3 required numeric itemname='���� ���� �Ұ� �ڸ�Ʈ��' value='<?=$board[bo_count_delete]?>'>�� �̻� �޸��� �����Ұ�</td>
</tr>
<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td></td>
    <td>����Ʈ ����</td>
    <td><input type=checkbox name="chk_point" onclick="set_point(this.form)"> ȯ�漳���� �Էµ� ����Ʈ�� ����</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_read_point value=1></td>
    <td>���б� ����Ʈ</td>
    <td><input type=text class=ed name=bo_read_point size=10 required itemname='���б� ����Ʈ' value='<?=$board[bo_read_point]?>'></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_write_point value=1></td>
    <td>�۾��� ����Ʈ</td>
    <td><input type=text class=ed name=bo_write_point size=10 required itemname='�۾��� ����Ʈ' value='<?=$board[bo_write_point]?>'></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_comment_point value=1></td>
    <td>�ڸ�Ʈ���� ����Ʈ</td>
    <td><input type=text class=ed name=bo_comment_point size=10 required itemname='�亯, �ڸ�Ʈ���� ����Ʈ' value='<?=$board[bo_comment_point]?>'></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_download_point value=1></td>
    <td>�ٿ�ε� ����Ʈ</td>
    <td><input type=text class=ed name=bo_download_point size=10 required itemname='�ٿ�ε� ����Ʈ' value='<?=$board[bo_download_point]?>'></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_category_list value=1></td>
    <td>�з� </td>
    <td><input type=text class=ed name=bo_category_list style='width:80%;' value='<?=get_text($board[bo_category_list])?>'>
        <input type=checkbox name=bo_use_category value='1' <?=$board[bo_use_category]?'checked':'';?>><b>���</b>
        <?=help("�з��� �з� ���̴� | �� �����ϼ���. (��: ����|�亯) ù�ڷ� #�� �Է����� ������. (��: #����|#�亯 [X])", -120)?>
    </td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_sideview value=1></td>
    <td>�۾��� ���̵��</td>
    <td><input type=checkbox name=bo_use_sideview value='1' <?=$board[bo_use_sideview]?'checked':'';?>>��� (�۾��� Ŭ���� ������ ���̾� �޴�)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_file_content value=1></td>
    <td>���� ���� ���</td>
    <td><input type=checkbox name=bo_use_file_content value='1' <?=$board[bo_use_file_content]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_comment value=1></td>
    <td>�ڸ�Ʈ ��â ���</td>
    <td><input type=checkbox name=bo_use_comment value='1' <?=$board[bo_use_comment]?'checked':'';?>>��� (�ڸ�Ʈ�� Ŭ���� ��â���� ����)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_secret value=1></td>
    <td>��б� ���</td>
    <td>
        <select name=bo_use_secret id='bo_use_secret'>
        <option value='0'>������� ����
        <option value='1'>üũ�ڽ�
        <option value='2'>������
        </select>
        &nbsp;<?=help("'üũ�ڽ�'�� ���ۼ��� ��б� üũ�� �����մϴ�.\n\n'������'�� �ۼ��Ǵ� ������ ��б۷� �ۼ��մϴ�. (�����ڴ� üũ�ڽ��� ����մϴ�.)\n\n��Ų�� ���� ������� ���� �� �ֽ��ϴ�.")?>
        <script type='text/javascript'>document.getElementById('bo_use_secret').value='<?=$board[bo_use_secret]?>';</script>
    </td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_dhtml_editor value=1></td>
    <td>DHTML ������ ���</td>
    <td>
        <input type=checkbox name=bo_use_dhtml_editor value='1' <?=$board[bo_use_dhtml_editor]?'checked':'';?>>���
        &nbsp;<?=help("���ۼ��� ������ DHTML ������ ������� ����� ������ �����մϴ�.\n\n��Ų�� ���� ������� ���� �� �ֽ��ϴ�.")?>
    </td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_rss_view value=1></td>
    <td>RSS ���̱� ���</td>
    <td>
        <input type=checkbox name=bo_use_rss_view value='1' <?=$board[bo_use_rss_view]?'checked':'';?>>���
        &nbsp;<?=help("��ȸ�� ���бⰡ �����ϰ� RSS ���̱� ��뿡 üũ�� �Ǿ�߸� RSS ������ �մϴ�.")?>
    </td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_good value=1></td>
    <td>��õ ���</td>
    <td><input type=checkbox name=bo_use_good value='1' <?=$board[bo_use_good]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_nogood value=1></td>
    <td>����õ ���</td>
    <td><input type=checkbox name=bo_use_nogood value='1' <?=$board[bo_use_nogood]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_name value=1></td>
    <td>�̸�(�Ǹ�) ���</td>
    <td><input type=checkbox name=bo_use_name value='1' <?=$board[bo_use_name]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_signature value=1></td>
    <td>�����̱� ���</td>
    <td><input type=checkbox name=bo_use_signature value='1' <?=$board[bo_use_signature]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_ip_view value=1></td>
    <td>IP ���̱� ���</td>
    <td><input type=checkbox name=bo_use_ip_view value='1' <?=$board[bo_use_ip_view]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_trackback value=1></td>
    <td>Ʈ���� ���</td>
    <td><input type=checkbox name=bo_use_trackback value='1' <?=$board[bo_use_trackback]?'checked':'';?>>��� (Ʈ���龲�� ���� ���� �켱��)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_list_content value=1></td>
    <td>��Ͽ��� ���� ���</td>
    <td><input type=checkbox name=bo_use_list_content value='1' <?=$board[bo_use_list_content]?'checked':'';?>>��� (���� �ӵ� ������)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_list_view value=1></td>
    <td>��ü��Ϻ��̱� ���</td>
    <td><input type=checkbox name=bo_use_list_view value='1' <?=$board[bo_use_list_view]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_email value=1></td>
    <td>���Ϲ߼� ���</td>
    <td><input type=checkbox name=bo_use_email value='1' <?=$board[bo_use_email]?'checked':'';?>>���</td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_skin value=1></td>
    <td>��Ų ���丮</td>
    <td><select name=bo_skin required itemname="��Ų ���丮">
        <?
        $arr = get_skin_dir("board");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script type="text/javascript">document.fboardform.bo_skin.value="<?=$board[bo_skin]?>";</script>
    </td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_gallery_cols value=1></td>
    <td>���� �̹�����</td>
    <td><input type=text class=ed name=bo_gallery_cols size=10 required itemname='���� �̹�����' value='<?=$board[bo_gallery_cols]?>'>
        <?=help("������ ������ �Խ��� ��Ͽ��� �̹����� ���ٿ� ���徿 �����ٰ������� �����ϴ� ��")?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_table_width value=1></td>
    <td>�Խ��� ���̺� ��</td>
    <td><input type=text class=ed name=bo_table_width size=10 required itemname='�Խ��� ���̺� ��' value='<?=$board[bo_table_width]?>'> 100 ���ϴ� %</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_page_rows value=1></td>
    <td>�������� ��� ��</td>
    <td><input type=text class=ed name=bo_page_rows size=10 required itemname='�������� ��� ��' value='<?=$board[bo_page_rows]?>'></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_subject_len value=1></td>
    <td>���� ����</td>
    <td><input type=text class=ed name=bo_subject_len size=10 required itemname='���� ����' value='<?=$board[bo_subject_len]?>'> ��Ͽ����� ���� ���ڼ�. �߸��� ���� �� �� ǥ��</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_new value=1></td>
    <td>new �̹���</td>
    <td><input type=text class=ed name=bo_new size=10 required itemname='new �̹���' value='<?=$board[bo_new]?>'> �� �Է��� new �̹����� ����ϴ� �ð�</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_hot value=1></td>
    <td>hot �̹���</td>
    <td><input type=text class=ed name=bo_hot size=10 required itemname='hot �̹���' value='<?=$board[bo_hot]?>'> ��ȸ���� ������ �̻��̸� hot �̹��� ���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_image_width value=1></td>
    <td>�̹��� �� ũ��</td>
    <td><input type=text class=ed name=bo_image_width size=10 required itemname='�̹��� �� ũ��' value='<?=$board[bo_image_width]?>'> �ȼ� (�Խ��ǿ��� ��µǴ� �̹����� �� ũ��)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_reply_order value=1></td>
    <td>�亯 �ޱ�</td>
    <td>
        <select name=bo_reply_order>
        <option value='1'>���߿� �� �亯 �Ʒ��� �ޱ� (�⺻)
        <option value='0'>���߿� �� �亯 ���� �ޱ�
        </select>
        <script type='text/javascript'> document.fboardform.bo_reply_order.value = '<?=$board[bo_reply_order]?>'; </script>
    </td>
</tr>

<?/*?>
<tr class='ht'>
    <td><input type=checkbox name=chk_disable_tags value=1></td>
    <td>������ �±�</td>
    <td><input type=text class=ed name=bo_disable_tags style='width:80%;' value='<?=get_text($board[bo_disable_tags])?>'>
        <?=help("�±׿� �±� ���̴� | �� �����ϼ���. (��: <b>script</b>|<b>iframe</b>)\n\nHTML ���� ������ �±׸� �Է��ϴ°� �Դϴ�.", -50)?></td>
</tr>
<?*/?>

<tr class='ht'>
    <td><input type=checkbox name=chk_sort_field value=1></td>
    <td>����Ʈ ���� �ʵ�</td>
    <td>
        <select name=bo_sort_field>
        <option value=''>wr_num, wr_reply : �⺻
        <option value='wr_datetime asc'>wr_datetime asc : ��¥ ������ ����
        <option value='wr_datetime desc'>wr_datetime desc : ��¥ �ֱٰ� ����
        <option value='wr_hit asc, wr_num, wr_reply'>wr_hit asc : ��ȸ�� ������ ����
        <option value='wr_hit desc, wr_num, wr_reply'>wr_hit desc : ��ȸ�� ������ ����
        <option value='wr_last asc'>wr_last asc : �ֱٱ� ������ ����
        <option value='wr_last desc'>wr_last desc : �ֱٱ� �ֱٰ� ����
        <option value='wr_comment asc, wr_num, wr_reply'>wr_comment asc : �ڸ�Ʈ�� ������ ����
        <option value='wr_comment desc, wr_num, wr_reply'>wr_comment asc : �ڸ�Ʈ�� ������ ����
        <option value='wr_good asc, wr_num, wr_reply'>wr_good asc : ��õ�� ������ ����
        <option value='wr_good desc, wr_num, wr_reply'>wr_good asc : ��õ�� ������ ����
        <option value='wr_nogood asc, wr_num, wr_reply'>wr_nogood asc : ����õ�� ������ ����
        <option value='wr_nogood desc, wr_num, wr_reply'>wr_nogood asc : ����õ�� ������ ����
        <option value='wr_subject asc, wr_num, wr_reply'>wr_subject : ���� ��������
        <option value='wr_subject desc, wr_num, wr_reply'>wr_subject : ���� ��������
        <option value='wr_name asc, wr_num, wr_reply'>wr_name : �۾��� ��������
        <option value='wr_name desc, wr_num, wr_reply'>wr_name : �۾��� ��������
        <option value='ca_name asc, wr_num, wr_reply'>ca_name : �з��� ��������
        <option value='ca_name desc, wr_num, wr_reply'>ca_name : �з��� ��������
        </select>
        <script type='text/javascript'> document.fboardform.bo_sort_field.value = '<?=$board[bo_sort_field]?>'; </script>
        <?=help("����Ʈ���� �⺻���� ���Ŀ� ����� �ʵ带 �����մϴ�.\n\n'�⺻'���� ������� �����ô� ��� �ӵ��� ������ �� �ֽ��ϴ�.", -50)?>
    </td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_write_min value=1></td>
    <td>�ּ� �ۼ� ����</td>
    <td><input type=text class=ed name=bo_write_min size=5 numeric value='<?=$board[bo_write_min]?>'>
        (�� �Է½� �ּ� ���ڼ��� ����. 0�� �Է��ϸ� �˻����� ����)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_write_max value=1></td>
    <td>�ִ� �ۼ� ����</td>
    <td><input type=text class=ed name=bo_write_max size=5 numeric value='<?=$board[bo_write_max]?>'>
        (�� �Է½� �ִ� ���ڼ��� ����. 0�� �Է��ϸ� �˻����� ����)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_comment_min value=1></td>
    <td>�ּ� �ڸ�Ʈ�� ����</td>
    <td><input type=text class=ed name=bo_comment_min size=5 numeric value='<?=$board[bo_comment_min]?>'>
        (�ڸ�Ʈ �Է½� �ּ� ���ڼ�, �ִ� ���ڼ��� ����. 0�� �Է��ϸ� �˻����� ����)</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_comment_max value=1></td>
    <td>�ִ� �ڸ�Ʈ�� ����</td>
    <td><input type=text class=ed name=bo_comment_max size=5 numeric value='<?=$board[bo_comment_max]?>'>
        (�ڸ�Ʈ �Է½� �ּ� ���ڼ�, �ִ� ���ڼ��� ����. 0�� �Է��ϸ� �˻����� ����)</td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_upload_count value=1></td>
    <td>���� ���ε� ����</td>
    <td><input type=text class=ed name=bo_upload_count size=10 required itemname='���� ���ε� ����' value='<?=$board[bo_upload_count]?>'> �Խù� �ѰǴ� ���ε� �� �� �ִ� ������ �ִ� ���� (0 �̸� ���� ����)</td>
</tr>
<?
$upload_max_filesize = ini_get("upload_max_filesize");
if (!preg_match("/([m|M])$/", $upload_max_filesize)) {
    $upload_max_filesize = (int)($upload_max_filesize / 1048576);
}
?>
<tr class='ht'>
    <td><input type=checkbox name=chk_upload_size value=1></td>
    <td>���� ���ε� �뷮</td>
    <td>���ε� ���� �Ѱ��� <input type=text class=ed name=bo_upload_size size=10 required itemname='���� ���ε� �뷮' value='<?=$board[bo_upload_size]?>'> bytes ���� (�ִ� <?=ini_get("upload_max_filesize")?> ����) <?=help("1 MB = 1,024,768 bytes")?></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_include_head value=1></td>
    <td>��� ���� ���</td>
    <td><input type=text class=ed name=bo_include_head style='width:80%;' value='<?=$board[bo_include_head]?>'></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_include_tail value=1></td>
    <td>�ϴ� ���� ���</td>
    <td><input type=text class=ed name=bo_include_tail style='width:80%;' value='<?=$board[bo_include_tail]?>'></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_content_head value=1></td>
    <td>��� ����</td>
    <!-- <td><textarea class=ed name=bo_content_head rows=5 style='width:80%;'><?=$board[bo_content_head] ?></textarea></td> -->
    <td style='padding-top:7px; padding-bottom:7px;'><?=cheditor2('bo_content_head', $board[bo_content_head]);?></td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_content_tail value=1></td>
    <td>�ϴ� ����</td>
    <!-- <td><textarea class=ed name=bo_content_tail rows=5 style='width:80%;'><?=$board[bo_content_tail] ?></textarea></td> -->
    <td style='padding-top:7px; padding-bottom:7px;'><?=cheditor2('bo_content_tail', $board[bo_content_tail]);?></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_insert_content value=1></td>
    <td>�۾��� �⺻ ����</td>
    <td><textarea class=ed name=bo_insert_content rows=5 style='width:80%;'><?=$board[bo_insert_content] ?></textarea></td>
</tr>

<tr><td colspan=3 class='line2'></td></tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_use_search value=1></td>
    <td>��ü �˻� ���</td>
    <td><input type=checkbox name=bo_use_search value='1' <?=$board[bo_use_search]?'checked':'';?>>���</td>
</tr>
<tr class='ht'>
    <td><input type=checkbox name=chk_order_search value=1></td>
    <td>��ü �˻� ����</td>
    <td><input type=text class=ed name=bo_order_search size=5 value='<?=$board[bo_order_search]?>'> ���ڰ� ���� �Խ��� ���� �˻�</td>
</tr>
<tr><td colspan=3 class='line2'></td></tr>

<? for ($i=1; $i<=10; $i++) { ?>
<tr class='ht'>
    <td><input type=checkbox name=chk_<?=$i?> value=1></td>
    <td><input type=text class=ed name='bo_<?=$i?>_subj' value='<?=get_text($board["bo_{$i}_subj"])?>' title='�����ʵ� <?=$i?> ����' style='text-align:right;font-weight:bold;'></td>
    <td><input type=text class=ed style='width:80%;' name='bo_<?=$i?>' value='<?=get_text($board["bo_$i"])?>' title='�����ʵ� <?=$i?> ������'></td>
</tr>
<? } ?>

<tr><td colspan=3 class='line1'></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  Ȯ  ��  '>&nbsp;
    <input type=button class=btn1 value='  ��  ��  ' onclick="document.location.href='./board_list.php?<?=$qstr?>';">&nbsp;
    <? if ($w == 'u') { ?><input type=button class=btn1 value='  ��  ��  ' onclick="board_copy('<?=$bo_table?>');"><?}?>
</form>

<script type="text/javascript">
function board_copy(bo_table) {
    window.open("./board_copy.php?bo_table="+bo_table, "BoardCopy", "left=10,top=10,width=500,height=200");
}

function set_point(f) {
    if (f.chk_point.checked) {
        f.bo_read_point.value     = "<?=$config[cf_read_point]?>";
        f.bo_write_point.value    = "<?=$config[cf_write_point]?>";
        f.bo_comment_point.value  = "<?=$config[cf_comment_point]?>";
        f.bo_download_point.value = "<?=$config[cf_download_point]?>";
    } else {
        f.bo_read_point.value     = f.bo_read_point.defaultValue;
        f.bo_write_point.value    = f.bo_write_point.defaultValue;
        f.bo_comment_point.value  = f.bo_comment_point.defaultValue;
        f.bo_download_point.value = f.bo_download_point.defaultValue;
    }
}

function fboardform_submit(f) {
    var tmp_title;
    var tmp_image;

    tmp_title = "���";
    tmp_image = f.bo_image_head;
    if (tmp_image.value) {
        if (!tmp_image.value.toLowerCase().match(/.(gif|jpg|png)$/i)) {
            alert(tmp_title + "�̹����� gif, jpg, png ������ �ƴմϴ�.");
            return false;
        }
    }

    tmp_title = "�ϴ�";
    tmp_image = f.bo_image_tail;
    if (tmp_image.value) {
        if (!tmp_image.value.toLowerCase().match(/.(gif|jpg|png)$/i)) {
            alert(tmp_title + "�̹����� gif, jpg, png ������ �ƴմϴ�.");
            return false;
        }
    }

    if (parseInt(f.bo_count_modify.value) < 1) {
        alert("���� ���� �Ұ� �ڸ�Ʈ���� 1 �̻� �Է��ϼž� �մϴ�.");
        f.bo_count_modify.focus();
        return false;
    }

    if (parseInt(f.bo_count_delete.value) < 1) {
        alert("���� ���� �Ұ� �ڸ�Ʈ���� 1 �̻� �Է��ϼž� �մϴ�.");
        f.bo_count_delete.focus();
        return false;
    }

    <?=cheditor3('bo_content_head')."\n";?>
    <?=cheditor3('bo_content_tail')."\n";?>

    f.action = "./board_form_update.php";
    return true;
}
</script>

<?
include_once ("./admin.tail.php");
?>
