		<style>
		.poplayer{position:fixed;z-index:9999;}
		.poplayer img{display:block;}
		.poplayer a{float:right;text-align:right;padding:10px 5px;color:#000;}
		.poplayer .close_box{background-color:#dfdfdf;height:41px;}
		</style>
		<?php

			error_reporting(0);

			/*
			$db_host = "promalldb3.godomall.com"; 
			$db_user = "kim1988"; 
			$db_passwd = "kilool8681";
			$db_name = "every091_godomall_com"; 
			$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

			if (mysqli_connect_errno($conn)) {
			//echo "데이터베이스 연결 실패: " . mysqli_connect_error();
			} else {
			//echo "성공~!!!";
			}
			*/

			$host_local = "localhost";
			$host_name = "hastensseoul";
			$host_pass = "rhksfleogod04";
			$host_db = "dbhastensseoul";

			$db = new mysqli($host_local,$host_name,$host_pass,$host_db);
			$db->set_charset("utf8");
			function mq($sql)
			{
				global $db;
				return $db->query($sql);
			}

			$sql = "SELECT * FROM board WHERE use_status='Y' order by priority asc";
			$result = mysqli_query($db, $sql);
			$i = 1;
			while($img = mysqli_fetch_array($result)){
				$img_length = 1;
				$imgsrc = '/storage/app/images/'.$img['attach_file'];
				if($img['pop_position'] == 'lefttop'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='top:".$img['m_height']."px;left:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1'.$img['idx'].'" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'leftbot'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='bottom:".$img['m_height']."px;left:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1'.$img['idx'].'" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'righttop'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='top:".$img['m_height']."px;right:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1'.$img['idx'].'" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'rightbot'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='bottom:".$img['m_height']."px;right:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1'.$img['idx'].'" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}
		?>
				<script type="text/javascript">

					$(function(){
						var cookiedata = document.cookie;
						function setCookie(name, value, expirehours) {
							var todayDate = new Date();
							todayDate.setHours(todayDate.getHours() + expirehours);
							document.cookie = name + "=" + escape(value) + ";path=/;expires=" + todayDate.toGMTString() + ";"
						}
						
						if (cookiedata.indexOf("ncookie<?=$img['idx']?>=done") < 0) {
							$('.poplayer<?=$img["idx"]?>').show();
						} else {
							$('.poplayer<?=$img["idx"]?>').hide();
						}
						function Pop_close() {
							var par = $(this).parents('div.poplayer<?=$img["idx"]?>');
							$(par).hide();
						}
						$('.close1<?=$img["idx"]?>').click(function(){
							var par = $(this).parents('div.poplayer<?=$img["idx"]?>');
							$(par).hide();
						});
						function todaycloseWin<?=$img['idx']?>() {
								setCookie("ncookie<?=$img['idx']?>", "done", 24);
								$('.poplayer<?=$img["idx"]?>').hide();
						}
						$('.24h<?=$img["idx"]?>').click(function(){
							todaycloseWin<?=$img['idx']?>();
						});
						// 팝업모바일
						var popbox = $('.poplayer');
						var popimg = $('.poplayer img');
					
						if($(document).width()<769){
							$(popimg).css({width:'100%',height:'auto'});
							$(popbox).css({width:'calc(100% - 20px)',top:'60px',left:'10px'});
						}
					});

				</script>

		<?php
				$i++;
			}
		?>
<body>
    <div id="container">
        <div id="header">
            <div class="inner">
                <div class="logo">
                    <a href="/"><img src="/img/logo.png" alt="로고"></a>
                </div>
                <ul class="nav_list">
                    <a href="/sub/beds"><li>Beds</li></a>
                    <a href="/sub/acc"><li>Acc</li></a>
                    <a href="/sub/materials"><li>Material</li></a>
                    <a href="/sub/heritage01"><li>Heritage</li></a>
                    <a href="/sub/press?tab=1"><li>News</li></a>
                    <a href="/sub/contact_us"><li>Contact</li></a>
                </ul>
                <div class="hamburger" id="hamburger-1">
                    <div class="ham_line_box">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
			<div class="sub_nav Acc">
                <ul class="">
                    <a href="/sub/acc/pillows"><li>Pillows</li></a>
					<a href="/sub/acc/downqults"><li>Down quilts</li></a>
					<a href="/sub/acc/bedlinen"><li>Bed linen</li></a>
					<a href="/sub/acc/headborards"><li>Headboards and covers</li></a>
					<a href="/sub/acc/skirts"><li>Bed skirts</li></a>
					<a href="/sub/acc/legs"><li>Bed legs</li></a>
					<a href="/sub/acc/covers"><li>Mattress covers</li></a>
					<a href="/sub/acc/personal"><li>Personal Accessories</li></a>
					<a href="/sub/acc/collection"><li>children's collection</li></a>
                </ul>
            </div>
            <div class="sub_nav Material">
                <ul class="">
                    <a href="/sub/materials"><li>Material</li></a>
                </ul>
            </div>
            <div class="sub_nav Heritage">
                <ul class="">
                    <a href="/sub/heritage01"><li>Spirit of Excellence</li></a>
                    <a href="/sub/heritage02"><li>Blue Check</li></a>
                    <a href="/sub/heritage03"><li>Royal Court</li></a>
                </ul>
            </div>
            <div class="sub_nav News">
                <ul class="">
                    <a href="/sub/press?tab=1"><li>PRESS</li></a>
                    <a href="/sub/media?tab=2"><li>MEDIA</li></a>
                </ul>
            </div>
            <!-- <div class="sub_nav Contact">
                <ul class="">
                    <a href="#none"><li>매장정보</li></a>
                    <a href="#none"><li>오시는 길</li></a>
                </ul>
            </div> -->
            
        </div>
        <ul id="ham_nav">
            <li class="ham_list list_hamburger">
                <div class="hamburger" id="hamburger-1">
                    <div class="ham_line_box">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
            </li>
            <li class="ham_list"><a href="/sub/beds">Beds</a></li>
			<li class="ham_list">Acc</li>
			<ul class="ham_list_sub hamAcc">
				<a href="/sub/acc/pillows"><li>Pillows</li></a>
				<a href="/sub/acc/downqults"><li>Down quilts</li></a>
				<a href="/sub/acc/bedlinen"><li>Bed linen</li></a>
				<a href="/sub/acc/headborards"><li>Headboards and covers</li></a>
				<a href="/sub/acc/skirts"><li>Bed skirts</li></a>
				<a href="/sub/acc/legs"><li>Bed legs</li></a>
				<a href="/sub/acc/covers"><li>Mattress covers</li></a>
				<a href="/sub/acc/personal"><li>Personal Accessories</li></a>
				<a href="/sub/acc/collection"><li>children's collection</li></a>
			</ul>
            <li class="ham_list"><a href="/sub/materials">Material</a></li>
            <li class="ham_list">Heritage</li>
            <ul class="ham_list_sub hamHeritage">
                <a href="/sub/heritage01"><li>Spirit of Excellence</li></a>
                <a href="/sub/heritage02"><li>Blue Check</li></a>
                <a href="/sub/heritage03"><li>Royal Court</li></a>
            </ul>
            <li class="ham_list"><a href="/sub/news?tab=1">News</a></li>
            {{-- <ul class="ham_list_sub hamNews">
                <a href="#none"><li>PRESS</li></a>
                <a href="#none"><li>MEDIA</li></a>
            </ul> --}}
            <li class="ham_list"><a href="/sub/contact_us">Contact</a></li>
        </ul>