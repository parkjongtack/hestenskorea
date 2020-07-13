@include('ey_header')
<div class="con_main">
    <form action="/ey_admin/{{ request()->segment(2) }}/write_board_action" name="board_write_form" method="post" enctype="multipart/form-data" onsubmit="return submit_check();" >
		{{ csrf_field() }}
		<input type="hidden" name="board_idx" value="{{ request()->board_idx }}" />
		<input type="hidden" name="board_type" value="{{ request()->segment(2) }}" />
		<input type="hidden" name="write_type" value="{{ request()->segment(4) }}" />
        <div class="write_box">
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        카테고리
                    </div>
                    <div class="line_content">
						@if(request()->segment(2) == 'pcslider')
							<input type="text" name="category" value="PC슬라이더" readonly style="border:none;" />
						@elseif(request()->segment(2) == 'ey_newsletter')
							<input type="text" name="category" value="뉴스레터" readonly style="border:none;" />
						@elseif(request()->segment(2) == 'happy_call')
							<input type="text" name="category" value="해피콜상담신청" readonly style="border:none;" />
						@elseif(request()->segment(2) == 'ey_pcpopup')
							<input type="text" name="category" value="PC팝업" readonly style="border:none;" />
						@elseif(request()->segment(2) == 'ey_pcslider')
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
							<input type="text" name="subject" value="{{ $data->subject }}" />
						</div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        기간
                    </div>
                    <div class="line_content">
                        <input type="text" id="start_period" name="start_period" value="{{ $data->start_period }}" /> ~
                        <input type="text" id="end_period" name="end_period" value="{{ $data->end_period }}" />
                    </div>
                </div>
            </div>
			@if(request()->segment(2) != 'pcslider')
            <div class="write_line">
                <div class="all_line">
						<div class="line_title" style="vertical-align:top;">내용</div>
						<div class="line_content">
							<textarea name="contents" cols="60" rows="10"></textarea>
						</div>
                </div>
            </div>
			@endif
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title" style="vertical-align:middle;">링크</div>
						<div class="line_content">
							<input type="text" name="link_value" value="{{ $data->link_value }}" />
                        </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title" style="vertical-align:middle;">우선순위</div>
						<div class="line_content">
							<input type="number" name="priority" value="{{ $data->priority }}" />
                        </div>
                </div>
            </div>
			@if(request()->segment(2) != 'pcslider')
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
			@endif
            <span id="append_target">
                <div class="write_line cate_file">
                    <div class="all_line">
                        <div class="line_title">
                            파일선택
                        </div>
                        <div class="line_content">
                            <input type="file" name="writer_file" />
							<a href="/storage/app/images/{{ $data->attach_file }}" target="_blank">[첨부파일]</a>
							@if(request()->segment(2) != 'pcslider')
                            <span style="cursor: pointer" class="add_file">파일추가 +</span>
							@endif
                        </div>
                    </div>
                </div>
            </span>
			@if(request()->segment(2) != 'pcslider')
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
			@endif
				<div class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							노출여부
						</div>
						<div class="line_content">
							<input type="radio" name="use_status" value="Y" @if($data->use_status == 'Y') checked @endif > 사용
							<input type="radio" name="use_status" value="N" @if($data->use_status == 'N') checked @endif > 중지
						</div>
					</div>
				</div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        작성자
                    </div>
                    <div class="line_content">
                        <input type="text" name="writer" value="{{ session('user_id') }}" readonly style="border:none;">
                    </div>
                </div>
            </div>
            <div class="submit_box" style="text-align:center;margin-top:10px;">
                <input type="submit" value="등록">
                <input type="reset" value="취소">
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

	function submit_check() {

		var form = document.board_write_form;

		@if(request()->segment(2) == 'pcslider')

			if(form.subject.value == "") {
				alert('제목을 입력해주세요.');
				form.subject.focus();
				return false;
			}

			if(form.start_period.value == "") {
				alert('시작기간을 입력해주세요.');
				form.start_period.focus();
				return false;
			}

			if(form.end_period.value == "") {
				alert('마지막기간을 입력해주세요.');
				form.end_period.focus();
				return false;
			}

			if(form.link_value.value == "") {
				alert('링크를 입력해주세요.');
				form.link_value.focus();
				return false;
			}

			if(form.priority.value == "") {
				alert('우선순위을 입력해주세요.');
				form.priority.focus();
				return false;
			}

		@endif

	}

    $(function(){

		 $("#start_period, #end_period").datepicker({
			  showOn: "both", // 버튼과 텍스트 필드 모두 캘린더를 보여준다.
			  changeMonth: true, // 월을 바꿀수 있는 셀렉트 박스를 표시한다.
			  changeYear: true, // 년을 바꿀 수 있는 셀렉트 박스를 표시한다.
			  minDate: '-100y', // 현재날짜로부터 100년이전까지 년을 표시한다.
			  nextText: '다음 달', // next 아이콘의 툴팁.
			  prevText: '이전 달', // prev 아이콘의 툴팁.
			  numberOfMonths: [1,1], // 한번에 얼마나 많은 월을 표시할것인가. [2,3] 일 경우, 2(행) x 3(열) = 6개의 월을 표시한다.
			  stepMonths: 3, // next, prev 버튼을 클릭했을때 얼마나 많은 월을 이동하여 표시하는가. 
			  yearRange: 'c-100:c+10', // 년도 선택 셀렉트박스를 현재 년도에서 이전, 이후로 얼마의 범위를 표시할것인가.
			  showButtonPanel: true, // 캘린더 하단에 버튼 패널을 표시한다. 
			  currentText: '오늘 날짜' , // 오늘 날짜로 이동하는 버튼 패널
			  closeText: '닫기',  // 닫기 버튼 패널
			  dateFormat: "yy-mm-dd", // 텍스트 필드에 입력되는 날짜 형식.
			  showAnim: "slide", //애니메이션을 적용한다.
			  showMonthAfterYear: true , // 월, 년순의 셀렉트 박스를 년,월 순으로 바꿔준다. 
			  dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'], // 요일의 한글 형식.
			  monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] // 월의 한글 형식.
		 });

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