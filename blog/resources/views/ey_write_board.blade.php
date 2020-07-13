@include('ey_header')
<div class="con_main">
    <form action="/{{ request()->segment(1) }}/ey_board_write_action" name="board_write_form" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
		<input type="hidden" name="write_type" value="{{ request()->segment(3) }}" />
        <div class="write_box">
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        카테고리
                    </div>
                    <div class="line_content">
						@if(request()->segment(1) == 'ey_notice')
							<input type="text" name="category" value="공지사항" readonly style="border:none;" />
						@elseif(request()->segment(1) == 'ey_newsletter')
							<input type="text" name="category" value="뉴스레터" readonly style="border:none;" />
						@elseif(request()->segment(1) == 'happy_call')
							<input type="text" name="category" value="해피콜상담신청" readonly style="border:none;" />
						@elseif(request()->segment(1) == 'ey_pcpopup')
							<input type="text" name="category" value="PC팝업" readonly style="border:none;" />
						@elseif(request()->segment(1) == 'ey_pcslider')
							<input type="radio" name="category" value="main" checked> 메인
							<input type="radio" name="category" value="sub"> 서브
						@endif
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
						<div class="line_title">
							제목
						</div>
						<div class="line_content">
							<input type="text" name="subject" />
						</div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        기간
                    </div>
                    <div class="line_content">
                        <input type="text" id="start_period" name="start_period" /> ~
                        <input type="text" id="end_period" name="end_period" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
						<div class="line_title" style="vertical-align:top;">내용</div>
						<div class="line_content">
							<textarea name="contents" cols="60" rows="10"></textarea>
						</div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title" style="vertical-align:middle;">우선순위</div>
						<div class="line_content">
							<input type="number" name="priority" />
                        </div>
                </div>
            </div>
            <div class="write_line cate_file">
                <div class="all_line">
                    <div class="line_title">
                        팝업위치
                    </div>
                    <div class="line_content">
                        <input type="radio" name="pop_position" value="lefttop" />좌측상단
                        <input type="radio" name="pop_position" value="righttop" />우측상단
                        <input type="radio" name="pop_position" value="leftbot" />좌측하단
                        <input type="radio" name="pop_position" value="rightbot" />우측하단
                    </div>
                </div>
            </div>
            <div class="write_line cate_file">
                <div class="all_line">
                    <div class="line_title">
                        팝업크기
                    </div>
                    <div class="line_content">
                        가로 : <input type="number" name="i_width" />
                        세로 : <input type="number" name="i_height" />
                    </div>
                </div>
            </div>
            <div class="write_line cate_file">
                <div class="all_line">
                    <div class="line_title">
                        팝업여백
                    </div>
                    <div class="line_content">
                        가로 : <input type="number" name="m_width" />
                        세로 : <input type="number" name="m_height" />
                    </div>
                </div>
            </div>
            <span id="append_target">
                <div class="write_line cate_file">
                    <div class="all_line">
                        <div class="line_title">
                            파일선택
                        </div>
                        <div class="line_content">
                            <input type="file" name="writer_file" />
                            <span style="cursor: pointer" class="add_file">파일추가 +</span>
                        </div>
                    </div>
                </div>
            </span>
            <span id="append_target_sub">
                <div class="write_line cate_file">
                    <div class="all_line">
                        <div class="line_title">
                            서브파일선택
                        </div>
                        <div class="line_content">
                            <input type="file" name="writer_file" />
                            <span style="cursor: pointer" class="add_file_sub">파일추가 +</span>
                        </div>
                    </div>
                </div>
            </span>
				<div class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							노출여부
						</div>
						<div class="line_content">
							<input type="radio" name="use_status" value="Y" checked> 사용
							<input type="radio" name="use_status" value="N"> 중지
						</div>
					</div>
				</div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        작성자
                    </div>
                    <div class="line_content">
                        <input type="text" name="writer" value="admin" readonly style="border:none;">
                    </div>
                </div>
            </div>
            <div class="submit_box" style="text-align:center;margin-top:10px;">
                <input type="button" value="등록" onclick="javascript:write_action();">
                <input type="reset" value="취소">
            </div>
        </div>
    </form>
</div>
<script>
    $(function(){
        var append_item = '<div class="write_line cate_file"><div class="all_line"><div class="line_title"></div><div class="line_content">&nbsp;<input type="file" name="writer_file" /></div></div></div>'
        $('.add_file').click(function(){
            $(append_item).appendTo("#append_target")
        });
        $('.add_file_sub').click(function(){
            $(append_item).appendTo("#append_target_sub")
        });
    })
</script>
@include('ey_footer')