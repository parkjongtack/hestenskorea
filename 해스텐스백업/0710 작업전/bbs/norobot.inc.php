<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

/*
**  $norobot_str �� $_SESSION[ss_norobot_key] �� ��ȯ��
*/

// �ڵ���ϱ⸦ ���ƺ����?
$is_norobot = false;
if ($config[cf_use_norobot]) {
    // ������ md5 ���ڿ��� ����
    $tmp_str = substr(md5($g4[server_time]),0,12);
    // ���� �߻���
    list($usec, $sec) = explode(' ', microtime()); 
    $seed =  (float)$sec + ((float)$usec * 100000); 
    srand($seed);
    $keylen = strlen($tmp_str);
    $div = (int)($keylen / 2);
    while (count($arr) < 4) 
    {
        unset($arr);
        for ($i=0; $i<$keylen; $i++) 
        {
            $rnd = rand(1, $keylen);
            $arr[$rnd] = $rnd;
            if ($rnd > $div) break;
        }
    }

    // �迭�� ����� ���ڸ� ���ʴ�� ����
    sort($arr);

    $norobot_key = "";
    $norobot_str = "";
    $m = 0;
    for ($i=0; $i<count($arr); $i++) 
    {
        for ($k=$m; $k<$arr[$i]-1; $k++) 
            $norobot_str .= $tmp_str[$k];
        $norobot_str .= "<font size=3 color=#FF0000><b>{$tmp_str[$k]}</b></font>";
        $norobot_key .= $tmp_str[$k];
        $m = $k + 1;
    }

    if ($m < $keylen) {
        for ($k=$m; $k<$keylen; $k++)
            $norobot_str .= $tmp_str[$k];
    }

    $norobot_str = "<font color=#999999>$norobot_str</font>";

    // �Է�, �亯�̸鼭 ȸ���� �ƴ� ��츸 �ڵ���Ϲ��� ���
    if (($w == "" || $w == "r") && !$member[mb_id]) {
        set_session("ss_norobot_key", $norobot_key);
        $is_norobot = true;
    } 
    else
        set_session("ss_norobot_key", "");
}
?>
<script type='text/javascript'> var md5_norobot_key = '<?=md5($norobot_key)?>'; </script>