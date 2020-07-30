@include('inc/head')
			<div id="main_sec">
                <div class="swiper-container main_slider">
                    <div class="swiper-wrapper">
						@foreach($data as $data)
                        <div class="swiper-slide"><img class="mo_none" src="/storage/app/images/{{ $data->attach_file }}" alt=""><img class="mo_block" src="/storage/app/images/{{ $data->attach_file2 }}" alt=""></div>
                        @endforeach
						<!-- <div class="swiper-slide"><img class="mo_none" src="/img/main_slider_01.png" alt=""><img class="mo_block" src="/img/m_main_slider_01.png" alt=""><a href="#none" class="slider_more_btn">READ MORE</a></div>
                        <div class="swiper-slide"><img class="mo_none" src="/img/main_slider_01.png" alt=""><img class="mo_block" src="/img/m_main_slider_01.png" alt=""><a href="#none" class="slider_more_btn">READ MORE</a></div> -->
                    </div>
                    <!-- Add Pagination -->
                    <a href="" target="_blank" class="slider_more_btn">READ MORE</a>
                    <div class="swiper-pagination"></div>
                    
                </div>
                <div class="bt_sec">
                    <p class="mo_none hei85p">BE AWAKE FOR THE FIRST TIME IN YOUR LIFE®</p>
                    <p class="mo_block hei85p">BE AWAKE FOR<br>THE FIRST TIME IN YOUR LIFE®</p>
                </div>
                <div class="cate_sec">
                    <ul class="inner">
                        <li><a href="/sub/beds">
                            <img class="mo_none" src="/img/cate_sec_01.png" alt="">
                            <img class="mo_block" src="/img/m_cate_sec_01.png" alt="">
                            <div class="cate_txt">
                                <h2 class="hei85p">BEDS</h2>
                                <p class="hei85p">READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="/sub/acc">
                            <img class="mo_none" src="/img/cate_sec_02.png" alt="">
                            <img class="mo_block" src="/img/m_cate_sec_02.png" alt="">
                            <div class="cate_txt">
                                <h2 class="hei85p">ACCESARIES</h2>
                                <p class="hei85p">READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="/sub/materials">
                            <img class="mo_none" src="/img/cate_sec_03.png" alt="">
                            <img class="mo_block" src="/img/m_cate_sec_03.png" alt="">
                            <div class="cate_txt">
                                <h2 class="hei85p">NATURAL MATERIALS</h2>
                                <p class="hei85p">READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="/sub/heritage01">
                            <img class="mo_none" src="/img/cate_sec_04.png" alt="">
                            <img class="mo_block" src="/img/m_cate_sec_04.png" alt="">
                            <div class="cate_txt">
                                <h2 class="hei85p">HERITAGE</h2>
                                <p class="hei85p">READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li>
                            <iframe frameborder="0" src="https://www.youtube.com/embed/9ZSKtj7xnt8" width="100%" height="100%"></iframe>
                        </li>
                    </ul>
                </div>
                <div class="news_sec">
                    <div class="title_box">
                        <h2 class="hei85p">NEWS</h2>
                        <p><a href="/sub/press?tab=1" style="color: #00154a; font-weight:500;" class="hei85p">READ MORE</a></p>
                    </div>
                </div>
            </div>
@include('inc/footer')
        <script>
            var swiper = new Swiper('.main_slider', {
                direction: 'vertical',
                spaceBetween: 10,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 2500,
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