/*
** 2010.03.12 : jQuery �� ��ü�Ͽ� ������ ������� �ʽ��ϴ�.
*/

// ȸ�����̵� �˻�
function reg_mb_id_check() {
    var url = member_skin_path + "/ajax_mb_id_check.php";
    var para = "reg_mb_id="+encodeURIComponent($F('reg_mb_id'));
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            // �ּ�â ���� ���� javascript:void(document.fregisterform.mb_id_enabled.value='000');
            // ����� (�����۽� �Է°��� �ٸ��� �˻��� �� mb_id_enabled �� üũ�ϱ� ����)
            asynchronous: false,
            parameters: para, 
            onComplete: return_reg_mb_id_check
        });
}

function return_reg_mb_id_check(req) { 
    var msg = $('msg_mb_id');
    var result = req.responseText;
    switch(result) {
        case '110' : msg.update('������, ����, _ �� �Է��ϼ���.').setStyle({ color: 'red' }); break;
        case '120' : msg.update('�ּ� 3���̻� �Է��ϼ���.').setStyle({ color: 'red' }); break;
        case '130' : msg.update('�̹� ������� ���̵� �Դϴ�.').setStyle({ color: 'red' }); break;
        case '140' : msg.update('������ ����� �� ���� ���̵� �Դϴ�.').setStyle({ color: 'red' }); break;
        case '000' : msg.update('����ϼŵ� ���� ���̵� �Դϴ�.').setStyle({ color: 'blue' }); break;
        default : alert( '�߸��� �����Դϴ�.\n\n' + result ); break;
    }
    $('mb_id_enabled').value = result;
}

// ���� �˻�
function reg_mb_nick_check() {
    var url = member_skin_path + "/ajax_mb_nick_check.php";
    var para = "reg_mb_nick="+encodeURIComponent($F('reg_mb_nick'));
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            // �ּ�â ���� ���� javascript:void(document.fregisterform.mb_id_enabled.value='000');
            // ����� (�����۽� �Է°��� �ٸ��� �˻��� �� mb_id_enabled �� üũ�ϱ� ����)
            asynchronous: false,
            parameters: para, 
            onComplete: return_reg_mb_nick_check
        });
}

function return_reg_mb_nick_check(req) { 
    var msg = $('msg_mb_nick');
    var result = req.responseText;
    switch(result) {
        case '110' : msg.update('������ ������� �ѱ�, ����, ���ڸ� �Է� �����մϴ�.').setStyle({ color: 'red' }); break;
        case '120' : msg.update('�ѱ� 2����, ���� 4���� �̻� �Է� �����մϴ�.').setStyle({ color: 'red' }); break;
        case '130' : msg.update('�̹� �����ϴ� �����Դϴ�.').setStyle({ color: 'red' }); break;
        case '000' : msg.update('����ϼŵ� ���� ���� �Դϴ�.').setStyle({ color: 'blue' }); break;
        default : alert( '�߸��� �����Դϴ�.\n\n' + result ); break;
    }
    $('mb_nick_enabled').value = result;
}


// E-mail �ּ� �˻�
function reg_mb_email_check() {
    var url = member_skin_path + "/ajax_mb_email_check.php";
    var para = "reg_mb_id="+encodeURIComponent($F('reg_mb_id'));
        para += "&reg_mb_email="+encodeURIComponent($F('reg_mb_email'));
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            // �ּ�â ���� ���� javascript:void(document.fregisterform.mb_email_enabled.value='000');
            // ����� (�����۽� �Է°��� �ٸ��� �˻��� �� mb_email_enabled �� üũ�ϱ� ����)
            asynchronous: false,
            parameters: para, 
            onComplete: return_reg_mb_email_check
        });
}

function return_reg_mb_email_check(req) { 
    var msg = $('msg_mb_email');
    var result = req.responseText;
    switch(result) {
        case '110' : msg.update('E-mail �ּҸ� �Է��Ͻʽÿ�.').setStyle({ color: 'red' }); break;
        case '120' : msg.update('E-mail �ּҰ� ���Ŀ� ���� �ʽ��ϴ�.').setStyle({ color: 'red' }); break;
        case '130' : msg.update('�̹� �����ϴ� E-mail �ּ��Դϴ�.').setStyle({ color: 'red' }); break;
        case '000' : msg.update('����ϼŵ� ���� E-mail �ּ��Դϴ�.').setStyle({ color: 'blue' }); break;
        default : alert( '�߸��� �����Դϴ�.\n\n' + result ); break;
    }
    $('mb_email_enabled').value = result;
}

// ���ǿ� ����� ��ū�� ��´�.
function get_token() {
    var url = member_skin_path + "/ajax_get_token.php";
    var para = "reg_mb_id="+encodeURIComponent($F('reg_mb_id'));
        para += "&reg_mb_email="+encodeURIComponent($F('reg_mb_email'));
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            asynchronous: false,
            parameters: para, 
            onComplete: return_get_token
        });
}

function return_get_token(req) {
    var result = req.responseText;
    $('mb_token').value = result;
}