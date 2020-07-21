@include('inc/head')
			<div id="sub_sec">
                <div class="beds">
					@foreach($data as $data)
						<div class="beds_detail inner" style="margin-bottom: 10px;">
							<img class="mo_none" src="/storage/app/images/{{ $data->attach_file }}" alt="">
							<img class="mo_block" src="/storage/app/images/{{ $data->attach_file2 }}" alt="">
							<div class="besd_explain">
								<p class="hastens_name hei85p">HÄSTENS</p>
								<p class="beds_title hei85p_kr">{{ $data->subject }}</p>
								<p class="beds_txt hei85p_kr">{{ $data
								->contents }}</p>
								<a class="beds_more hei85p_kr" href="/sub/beds/sub?board_idx={{ $data->idx }}">SHOW ME THE BED</a>
							</div>
						</div>
					@endforeach
                    {{-- <div class="beds_bot">
                        <img src="../img/sub/beds_bot.png" alt="">
                    </div> --}}
					<!-- {!! $paging_view !!} -->
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

			function page(page){		
				var f = document.search_form;
				f.page.value = page;
				f.submit();
			}
        </script>
    </body>
</html>