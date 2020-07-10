@include('inc/head')
			<div id="main_sec">
                <div class="swiper-container main_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img class="mo_none" src="/img/main_slider_01.png" alt=""><img class="mo_block" src="/img/m_main_slider_01.png" alt=""></div>
                        <div class="swiper-slide"><img class="mo_none" src="/img/main_slider_01.png" alt=""><img class="mo_block" src="/img/m_main_slider_01.png" alt=""></div>
                        <div class="swiper-slide"><img class="mo_none" src="/img/main_slider_01.png" alt=""><img class="mo_block" src="/img/m_main_slider_01.png" alt=""></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <a href="#none" class="slider_more_btn">READ MORE</a>
                </div>
                <div class="bt_sec">
                    <p>BE AWAKE FOR THE FIRST TIME IN YOUR LIFE®</p>
                </div>
                <div class="cate_sec">
                    <ul class="inner">
                        <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]?>/main/sub/beds.html">
                            <img src="/img/cate_sec_01.png" alt="">
                            <div class="cate_txt">
                                <h2>BEDS</h2>
                                <p>READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="#none">
                            <img src="/img/cate_sec_02.png" alt="">
                            <div class="cate_txt">
                                <h2>ACCESARIES</h2>
                                <p>READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]?>/main/sub/materials.html">
                            <img src="/img/cate_sec_03.png" alt="">
                            <div class="cate_txt">
                                <h2>NATURAL MATERIALS</h2>
                                <p>READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li><a href="<?php $_SERVER["DOCUMENT_ROOT"]?>/main/sub/heritage01.html">
                            <img src="/img/cate_sec_04.png" alt="">
                            <div class="cate_txt">
                                <h2>HERITAGE</h2>
                                <p>READ MORE</p>
                            </div>
                            <div class="cate_bg_none"></div>
                        </a></li>
                        <li>
                            <iframe src="" frameborder="0"></iframe>
                        </li>
                    </ul>
                </div>
                <div class="news_sec">
                    <div class="title_box">
                        <h2>HERITAGE</h2>
                        <p>READ MORE</p>
                    </div>
                </div>
            </div>
@include('inc/footer')
        <script>
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