@include('inc/head')
			<div id="sub_sec">
                <div class="news">
                    <div class="news_tabs">
                        <a href="/sub/notice?tab=3" class="tans03 hei85p @if($_SERVER['REQUEST_URI'] == '/sub/notice?tab=3') on @endif">NOTICE</a><a href="/sub/press?tab=1" class="tans01 hei85p @if($_SERVER['REQUEST_URI'] == '/sub/press?tab=1') on @endif">PRESS</a><a href="/sub/media?tab=2" class="tans02 hei85p @if($_SERVER['REQUEST_URI'] == '/sub/media?tab=2') on @endif">MEDIA</a>
                    </div>
                    <div class="news_content inner">
                        <ul class="news_tabs_03 news_tabs_ notice">
                            <li>
                                <div class="notice_num">번호</div>
                                <div class="notice_title">제목</div>
                                <div class="notice_name">작성자</div>
                                <div class="notice_date">등록일</div>
                            </li>
                            @foreach($data as $data)
                            <li>
                                <div class="notice_num">{{ $number-- }}</div>
                            <div class="notice_title"><a href="/sub/media_view?tab=3&board_idx={{ $data->idx }}">{{$data->subject}}</a></div>
                                <div class="notice_name">관리자</div>
                                <div class="notice_date">{{ $data->reg_date }}</div>
                            </li>
                            @endforeach
                            {{-- <li>
                                <div class="notice_num">2</div>
                                <div class="notice_title"><a href="#none">안녕하세요. 산업보안 정보 도서관 게시판입니다.</a></div>
                                <div class="notice_name">관리자</div>
                                <div class="notice_date">20-06-30</div>
                            </li>
                            <li>
                                <div class="notice_num">1</div>
                                <div class="notice_title"><a href="#none">안녕하세요. 산업보안 정보 도서관 게시판입니다.</a></div>
                                <div class="notice_name">관리자</div>
                                <div class="notice_date">20-06-30</div>
                            </li> --}}
                        </ul>
                        <div class="pag_write news_tabs_01">
							{!! $paging_view !!}
                        </div>

                        <ul class="news_tabs_01 news_tabs_">
							@foreach($data as $data)
                            <li class="half" style="cursor:pointer;" onclick="javascript:location.href='/sub/media_view?board_idx={{ $data->idx }}';">
								<div class="youtube_img">
									<img src="/storage/app/images/{{ $data->attach_file }}" alt="">
								</div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">{{ $data->subject }}</p>                                    
                                </div>
                            </li>
							@endforeach
                        </ul>
                        <div class="pag_write news_tabs_01">
							{!! $paging_view !!}
                        </div>

                        <ul class="news_tabs_02 news_tabs_">
							@foreach($data2 as $data2)							
                            <li class="half" style="cursor: pointer" onclick="javascript:window.open('about:blank').location.href = '{{ $data2->link_value }}';">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/{{ $data2->link_key }}/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">{{ $data2->subject }}</p>
                                    
                                </div>
                            </li>
							@endforeach
                        </ul>
                        <div class="pag_write news_tabs_02">
                            <!-- <ul>
                                <li><a href="#none"><</a></li>
                                <li class="on"><a href="#none">1</a></li>
                                <li><a href="#none">2</a></li>
                                <li><a href="#none">3</a></li>
                                <li><a href="#none">4</a></li>
                                <li><a href="#none">5</a></li>
                                <li><a href="#none">6</a></li>
                                <li><a href="#none">></a></li>
                            </ul> -->
							{!! $paging_view !!}
                        </div>
                    </div>
                </div>
            </div>
			<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();">
				<input type="hidden" name="page" />
				<!-- <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required> -->
				<button></button>
			</form>
@include('inc/footer')
    </body>
</html>