@if(!session('user_id'))
	<script type="text/javascript">
		alert('로그인 해주세요.');
		location.href = '/ey_login';
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
                    <a href="#none">
                        <img src="/img/logo.png" alt="로고" width="100%">
                    </a>
                </div>
                <div class="nav_title">
                    <span>ADMIN</span><a href="#none"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="nav_con">
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>메인페이지 설정</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/ey_pcslider">PC 슬라이드</a></div>
                        <div class="nav_sub"><a href="/ey_pcpopup">PC 팝업</a></div>
                        <div class="nav_sub"><a href="/ey_moslider">MOBILE 슬라이드</a></div>
                        <div class="nav_sub"><a href="/ey_mopopup">MOBILE 팝업</a></div>
                    </div>
                    <div class="na_title nav_img"><i class="fas fa-comments"></i>커뮤니티</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/ey_faq">FAQ</a></div>
                        <div class="nav_sub"><a href="/ey_notice">공지사항</a></div>
						<div class="nav_sub"><a href="/ey_newsletter">뉴스레터</a></div>
                        <!-- <div class="nav_sub"><a href="/ey_free">자유게시판</a></div> -->
                        <div class="nav_sub"><a href="/happy_call/happy_call_list">상담게시판</a></div>
                        <!-- <div class="nav_sub"><a href="/ey_education">교육게시판</a></div> -->
						<div class="nav_sub"><a href="/ey_data_room">자료실</a></div>
						<div class="nav_sub"><a href="/ey_law_data_room">법령정보</a></div>
						<div class="nav_sub"><a href="/ey_security_data_room">보안서식</a></div>
						<div class="nav_sub"><a href="/ey_cso_request_education">CSO 양성교육</a></div>
						<div class="nav_sub"><a href="/ey_security_request_education">산업보안방문교육</a></div>
                    </div>
                    <div class="na_title nav_img"><i class="far fa-chart-bar"></i>통계 현황</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="#">접속 통계</a></div>
                        <div class="nav_sub"><a href="#">유입 경로</a></div>
                    </div>
                </div>
            </div>
            <div id="con">
                <div class="header">
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="top_nav">
                        <ul>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-cog"></i>관리자 설정
                                </li>
                            </a>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-desktop"></i>홈페이지
                                </li>
                            </a>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-sign-out-alt"></i><a href="/ey_logout_action">로그아웃</a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="con_title">
                    <h2>
					@if(request()->segment(1) == 'ey_faq')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_notice')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_newsletter')
					커뮤니티
					@elseif(request()->segment(1) == 'happy_call')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_data_room')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_law_data_room')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_security_data_room')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_cso_request_education')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_security_request_education')
					커뮤니티
					@elseif(request()->segment(1) == 'ey_pcslider')
					PC슬라이더
					@endif
					</h2>
                    <div class="title_nav">@if(request()->segment(1) == 'ey_faq')
					FAQ
					@elseif(request()->segment(1) == 'ey_notice')
					공지사항
					@elseif(request()->segment(1) == 'ey_newsletter')
					뉴스레터
					@elseif(request()->segment(1) == 'happy_call')
					상담게시판
					@elseif(request()->segment(1) == 'ey_data_room')
					자료실
					@elseif(request()->segment(1) == 'ey_law_data_room')
					볍령정보
					@elseif(request()->segment(1) == 'ey_security_data_room')
					보안서식
					@elseif(request()->segment(1) == 'ey_cso_request_education')
					CSO 양성교육
					@elseif(request()->segment(1) == 'ey_security_request_education')
					산업보안 방문교육
					@elseif(request()->segment(1) == 'ey_pcslider')
					PC슬라이더
					@endif</div>
                </div>