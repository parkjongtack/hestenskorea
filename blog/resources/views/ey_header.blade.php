@if(!session('user_id'))
	<script type="text/javascript">
		alert('로그인 해주세요.');
		location.href = '/ey_admin/login';
	</script>
@endif
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/css/ey_index.css">
        <script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/ey_index.js"></script>
    </head>
    <body>
        <div id="container">
            <div class="nav_space"></div>
            <div id="nav">
                <div class="logo">
                    <a href="/ey_admin/pcslider">
                        <img src="/img/logo.png" alt="로고" width="100%">
                    </a>
                </div>
                <div class="nav_title">
                    <span>ADMIN</span><a href="/ey_admin/pcslider"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="nav_con">
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>메인페이지 설정</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/ey_admin/pcslider">슬라이드</a></div>
                        <div class="nav_sub"><a href="/ey_admin/popup">팝업</a></div>
                        <!-- <div class="nav_sub"><a href="/ey_moslider">MOBILE 슬라이드</a></div>
                        <div class="nav_sub"><a href="/ey_mopopup">MOBILE 팝업</a></div> -->
                    </div>
                    <div class="na_title nav_img"><i class="fas fa-comments"></i>카테고리</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/ey_admin/beds">beds</a></div>
                        <div class="nav_sub"><a href="/ey_admin/acc">acc</a></div>
						<div class="nav_sub"><a href="/ey_admin/press">press</a></div>
                        <div class="nav_sub"><a href="/ey_admin/media">media</a></div>
                        <div class="nav_sub"><a href="/ey_admin/notice">notice</a></div>
                    </div>
                    <!-- <div class="na_title nav_img"><i class="far fa-chart-bar"></i>통계 현황</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="#">접속 통계</a></div>
                        <div class="nav_sub"><a href="#">유입 경로</a></div>
                    </div> -->
                </div>
            </div>
            <div id="con">
                <div class="header">
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="top_nav">
                        <ul>
                            <!-- <a href="#none">
                                <li>
                                    <i class="fas fa-cog"></i>관리자 설정
                                </li>
                            </a> -->
                            <a href="/">
                                <li>
                                    <i class="fas fa-desktop"></i>홈페이지
                                </li>
                            </a>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-sign-out-alt"></i><a href="/ey_admin/logout">로그아웃</a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="con_title">
                    <h2>
					@if(request()->segment(2) == 'pcslider' || request()->segment(2) == 'popup')
					메인페이지 설정
					@elseif(request()->segment(2) == 'beds' || request()->segment(2) == 'acc' || request()->segment(2) == 'press' || request()->segment(2) == 'media' || request()->segment(2) == 'notice')
					카테고리
					@elseif(request()->segment(2) == 'ey_pcslider')
					PC슬라이더
					@endif
					</h2>
                    <div class="title_nav">
					@if(request()->segment(2) == 'pcslider')
					PC슬라이더
					@elseif(request()->segment(2) == 'beds')
					beds
					@elseif(request()->segment(2) == 'acc')
					acc
					@elseif(request()->segment(2) == 'press')
                    press
                    @elseif(request()->segment(2) == 'notice')
                    notice
					@elseif(request()->segment(2) == 'media')
					media
					@elseif(request()->segment(2) == 'ey_law_data_room')
					볍령정보
					@elseif(request()->segment(2) == 'ey_security_data_room')
					보안서식
					@elseif(request()->segment(2) == 'ey_cso_request_education')
					CSO 양성교육
					@elseif(request()->segment(2) == 'ey_security_request_education')
					산업보안 방문교육
					@elseif(request()->segment(2) == 'ey_pcslider')
					PC슬라이더
					@endif</div>
                </div>