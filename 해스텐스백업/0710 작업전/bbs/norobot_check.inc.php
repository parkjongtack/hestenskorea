<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

//  norobot.inc.php �� ����� �� ���

// �ڵ���Ϲ��� �˻�
if ($config[cf_use_norobot]) {
    /*
    // �켱 �� URL �� ���� �°����� �˻�
    $parse = parse_url($_SERVER[HTTP_REFERER]);
    // 3.35
    // ��Ʈ��ȣ�� ������ ����� ó�� (mumu�Բ��� �˷��ּ̽��ϴ�)
    $parse2 = explode(":", $_SERVER[HTTP_HOST]);
    if ($parse[host] != $parse2[0]) {
    //if ($parse[host] != $_SERVER[HTTP_HOST]) {
        alert("�ùٸ� ������ �ƴѰ� �����ϴ�.", "./");
    }
    */

    $key = $_SESSION[ss_norobot_key];
    if (($w=='' || $w=='c') && !$member[mb_id]) {
        if ($key) {
            if ($key != $_POST[wr_key]) {
                alert("�������� ����� �ƴѰ� �����ϴ�.");
            }
        } else {
            alert("�������� ������ �ƴѰ� �����ϴ�.");
        }
    }
}
?>
