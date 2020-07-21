@include('inc/head')
<div id="sub_sec">
<div class="content_inner">
    <div class="media_notice">
        {{--PRESS--}}
        <div class="notice_view">
            <div class="view_title">
                <p>{{ $data->subject }}</p>
                <span>{{ $data->reg_date }} | 조회 111</span>
            </div>
            <div class="view_name">
                <p>작성자 : 관리자</p>
            </div>
            <div class="view_content">
				{!! $data->contents !!}
            </div>
            <div class="submit_box">
				@if($board_prev->idx)
					<a href="/sub/media_view?tab={{ $_GET['tab'] }}&board_idx={{ $board_prev->idx }}">이전글</a>
				@endif
				@if($board_next->idx)
					<a href="/sub/media_view?tab={{ $_GET['tab'] }}&board_idx={{ $board_next->idx }}">다음글</a>
				@endif
                <a href="/sub/press?tab={{ $_GET['tab'] }}">목록</a>
            </div>
        </div>
    </div>
</div>
@include('inc/footer')
        <script>
             $(document).ready(function(){
               console.log("a")
            });
            var swiper = new Swiper('.main_slider', {
                direction: 'vertical',
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 1800,
                    disableOnInteraction :false,
                },
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
            });
        </script>
    </body>
</html>
<script type="text/javascript">

	$(function () {
		
		//var removeData = setInterval(function(){

			//$("p").last().remove();

		//}, 100);

	})

</script>