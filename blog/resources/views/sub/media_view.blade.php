@include('inc/head')
<div id="sub_sec">
<div class="content_inner">
    <div class="media_notice">
        <div class="notice_view">
            <div class="view_title">
                <p>{{ $data->subject }}</p>
                <span>{{ $data->reg_date }}</span>
            </div>
            <!-- 사용하시는 에디터가 어떻게 마크업을 떨구는지 알수없어 임의 코딩했습니다. 수정사항있으면 root 경로에 txt파일로 정리 부탁드립니다.-->
            <div class="view_content">
			{!! $data->contents !!}
                <!-- <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p><img src="/img/view_img_sample.png" alt=""></p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p>
                <p>안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.안녕하세요 ‘Try Everything 2020’행사 공지사항 안내드립니다.</p> -->
            </div>
            <div class="submit_box">
                <a href="/sub/press?tab=1">목록</a>
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

			$("p").last().remove();

		//}, 100);

	})

</script>