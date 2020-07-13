@include('ey_header')
{{-- PC슬라이더 --}}
<div class="con_main">
    <form action="">
        <table>
            <colgroup>
                <col width="100">
                <col width="100">
                <col width="350">
                <col width="250">
                <col width="150">
                <col width="70">
                <col width="180">
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
					@if(request()->segment(1) == 'ey_pcpopup')
                    <th>제목</th>
					@else
                    <th>카테고리</th>
					@endif
                    <th>이미지</th>
					@if(request()->segment(1) == 'ey_pcpopup')
                    <th>팝업크기/여백</th>
					@else
                    <th>기간</th>
					@endif
                    <th>등록일</th>
                    <th>사용여부</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
				@foreach($data as $data)
                <tr>
                    <td>{{ $number-- }}</td>
                    <td>{{ $data->subject }}</td>
                    <td><a href="#none"><img src="/storage/app/images/{{ $data->attach_file }}" alt="" width="100%"></a></td>
                    <td>{{ $data->start_period }} ~ {{ $data->end_period }}</td>
                    <td>{{ $data->reg_date }}</td>
                    <td>
						@if($data->use_status == 'Y')
							사용
						@else
							중지
						@endif
                    </td>
                    <td class="delete_box"><a href="javascript:control('{{ $data->idx }}');">삭제</a><a href="/ey_admin/{{ request()->segment(2) }}/write_board_form/modify/?board_idx={{ $data->idx }}" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
				@endforeach
                <!-- <tr>
                    <td>1</td>
                    <td>서브</td>
                    <td><a href="#none"><img src="img/sub_banner1.png" alt="" width="100%"></a></td>
                    <td>2020-04-10 ~ 2020-05-10</td>
                    <td>2020-04-10</td>
                    <td>사용</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_gallery" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>메인</td>
                    <td><a href="#none"><img src="img/main_slide_01.png" alt="" width="100%"></a></td>
                    <td>2020-04-10 ~ 2020-05-10</td>
                    <td>2020-04-10</td>
                    <td>사용</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_gallery" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>메인</td>
                    <td><a href="#none"><img src="img/main_slide_01.png" alt="" width="100%"></a></td>
                    <td>2020-04-10 ~ 2020-05-10</td>
                    <td>2020-04-10</td>
                    <td>사용</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_gallery" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr> -->
            </tbody>
        </table>
        <div class="paging">
            <!-- <ul>
                <li class="page page_start move_page"><a href="#none"></a></li>
                <li class="page page_prev move_page"><a href="#none"></a></li>
                <li class="page current">1</li>
                <li class="page"><a href="#none">2</a></li>
                <li class="page"><a href="#none">3</a></li>
                <li class="page"><a href="#none">4</a></li>
                <li class="page page_next move_page"><a href="#none"></a></li>
                <li class="page page_end move_page"><a href="#none"></a></li>
            </ul> -->
			{!! $paging_view !!}
		</div>
        <div class="create" style="padding-bottom:10px;">
			<a href="/ey_admin/{{ request()->segment(2) }}/write_board_form">등록</a>
            <!-- <a href="/ey_write_gallery">등록</a> -->
        </div>
    </form>
</div>
<script type="text/javascript">

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_admin/{{ request()->segment(2) }}/control',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("삭제되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					return false;
				}
			});
		}
	}

</script>
@include('ey_footer')