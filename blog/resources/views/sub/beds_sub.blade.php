@include('inc/head')
			<div id="sub_sec">
                <div class="beds_sub inner">
					<div class="beds_bot">
                        <img class="mo_none" src="/img/sub/beds_sub_bot.png" alt="">
                        <img class="mo_block" src="/img/sub/m_beds_sub_bot.png" alt="">
                    </div>
                    <div class="swiper-container beds_sub_slide">
                        <div class="swiper-wrapper">
							@foreach($data as $data)
                            <div class="beds_detail swiper-slide">
                                <img class="mo_none" src="/storage/app/images/{{ $data->real_file_name }}" alt="">
                                <img class="mo_block" src="/storage/app/images/{{ $data->real_file_name2 }}" alt="">
                                <div class="besd_explain">
                                    <div class="besd_explain_title">
                                        <p class="beds_txt hei85p_kr">{{ $data->sub_subject }}</p>
                                        <p class="beds_txt hei85p_kr">{{ $data->sub_subject2 }}</p>
                                    </div>
                                    <div class="besd_explain_detail">
                                        COLOR : <b>{{ $data->sub_subject3 }}</b>
                                    </div>
                                </div>
                            </div>
							@endforeach
                            </div>
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
                        </div>
					</div>
                </div>
            </div>
@include('inc/footer')
						<script>
                            $(document).ready(function(){
                                var pagi_list = $('.swiper-pagination-bullet');
								var w_width = $(document).width();
								if(w_width > 769){
									var i = 0;
	                                @foreach($data2 as $data2)
										$(pagi_list).eq(i).css({background:"url('/storage/app/images/{{ $data2->real_file_name }}') no-repeat center"});
										i = i + 1;
									@endforeach
									//for(var i=0; i<pagi_list.length; i++){
	                                //    $(pagi_list).eq(i).css({background:"url('/img/sub/beds_sub_img01_"+(i+1)+".png') no-repeat center"});
	                                //    //console.log($(pagi_list).eq(i))
	                                //}
								}else{

									var i = 0;
	                                @foreach($data3 as $data3)
										$(pagi_list).eq(i).css({background:"url('/storage/app/images/{{ $data3->real_file_name2 }}') no-repeat center"});
										i = i + 1;
									@endforeach

									//for(var i=0; i<pagi_list.length; i++){
	                                //    $(pagi_list).eq(i).css({background:"url('/img/sub/beds_sub_img01_"+(i+1)+".png') no-repeat center"});
	                                //    //console.log($(pagi_list).eq(i))
	                                //}
								}
                            });
                        </script>
        <script>
            var swiper = new Swiper('.swiper-container', {
              slidesPerView: 1,
              spaceBetween: 0,
              loop: true,
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            });
          </script>
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