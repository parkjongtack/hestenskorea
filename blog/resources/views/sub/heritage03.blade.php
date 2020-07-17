@include('inc/head')
			<div id="sub_sec">
                <div class="heritage03_sub_01">
                    <div class="h_sub_bot1">
                        <div style="position: relative; top: 50%; transform: translateY(-50%);">
                            <h1 class="hei85p mo_none">
                                <span data-aos="fade-up" data-aos-delay="0">URVEYOR TO THE</span><br><span data-aos="fade-up" data-aos-delay="500">SWEDISH ROYAL COURT</span><br><span data-aos="fade-up" data-aos-delay="1000">SINCE 1952</span>
                            </h1>
                        </div>
                        <div style="position: relative; top: 50%; transform: translateY(-50%);">
                            <h1 class="hei85p mo_block">
                                <span data-aos="fade-up" data-aos-delay="0"> URVEYOR TO THE</span><br><span data-aos="fade-up" data-aos-delay="500">SWEDISH ROYAL</span><br><span data-aos="fade-up" data-aos-delay="1000">COURT SINCE 1952</span>
                            </h1>
                        </div>
                    </div>
                    <div class="h_sub_bot2">
                        <div class="h_sub_bot_img">
                            <img src="../img/sub/sub_logo.png" alt="">
                        </div>
                        <div class="h_sub_bot_text">
                            <p class="mo_none">
                                1952년 해스텐스는 말총, 양모, 면 등 천연소재를 이용해 수작업으로 침대를 생산하여<br>
                                전 세계에서 우수한 품질을 인정받아 창립 100주년을 기념하였습니다. <br><br>
                                스웨덴 국왕이었던 구스타프 아돌프 6세(King Gustav VI Adolf)는<br>
                                해스텐스 본사에 직접 방문해, 해스텐스 전 제작과정을 본 후,<br>
                                해스텐스 침대의 품질에 대한 극찬을 아끼지 않았습니다.<br>
                                이후 해스텐스는 "ROYAL PURVEYOR"라는 칭호를 수여받아 70년이 지난<br>
                                현재까지도 스웨덴 왕실의 유일한 침대 공급 업체의 영예를 누리고 있습니다.
                            </p>
                            <p class="mo_block">
                                1952년 해스텐스는 말총, 양모, 면 등<br>
                                천연소재를 이용해 수작업으로 침대를 생산하여<br>
                                전 세계에서 우수한 품질을 인정받아<br>
                                창립 100주년을 기념하였습니다. <br>
                                                            <br>
                                스웨덴 국왕이었던 구스타프 아돌프 6세<br>
                                (King Gustav VI Adolf)는 해스텐스 본사에<br>
                                직접 방문해, 해스텐스 전 제작과정을 본 후, 해스텐스<br>
                                침대의 품질에 대한 극찬을 아끼지 않았습니다.<br>
                                이후 해스텐스는 "ROYAL PURVEYOR"라는<br>
                                칭호를 수여받아 70년이 지난 현재까지도<br>
                                스웨덴 왕실의 유일한 침대 공급 업체의<br>
                                영예를 누리고 있습니다.
                            </p>
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