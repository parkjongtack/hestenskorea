var md5_norobot_key = '';

$(function() {
    $('#kcaptcha_image').bind('click', function() {
        $.ajax({
            type: 'POST',
            url: g4_path+'/'+g4_bbs+'/kcaptcha_session.php',
            cache: false,
            async: false,
            success: function(text) {
                $('#kcaptcha_image').attr('src', g4_path+'/'+g4_bbs+'/kcaptcha_image.php?t=' + (new Date).getTime());
                md5_norobot_key = text;
            }
        });
    })
    .css('cursor', 'pointer')
    .attr('title', '���ڰ� �� �Ⱥ��̽ô� ��� Ŭ���Ͻø� ���ο� ���ڰ� ���ɴϴ�.')
    .attr('width', '120')
    .attr('height', '60')
    .trigger('click');
});