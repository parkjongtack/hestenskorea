@include('inc/head')
			<div id="sub_sec">
                <div class="heritage01_sub_01">
                    <!-- <div class="back_path">
                        <div class="path_01 path_child">
                            <img class="aaa" src="../img/sub/path1.png" alt="">
                            <img src="../img/sub/path1.png" alt="">
                        </div>
                        <div class="path_02 path_child">
                            <img src="../img/sub/path1.png" alt="">
                            <img src="../img/sub/path1.png" alt="">
                        </div>
                        <div class="path_03 path_child">
                            <img src="../img/sub/path1.png" alt="">
                            <img src="../img/sub/path1.png" alt="">
                        </div>
                    </div> -->
                    <div class="h_sub_top">
                        <div class="h_sub_text_box">
                            <h1 class="hei85p">PERFECT<br>SLEEP TAILORED<br>FOR YOU SINCE 1852</h1>
                            <p><span class="font_noto">Hästens</span>는 창립자인<br>페르 아돌프 얀슨(<span class="font_noto">Pehr Adolf Janson</span>)은<br>스웨덴 국왕으로부터 인정받은<br>고급 말 안장을 제작하던 '장인'이었습니다.</p>
                        </div>
                        <div class="h_sub_img_box">
                            <img src="../img/sub/spirit_01.png" alt="">
                        </div>
                    </div>
                    <div class="h_sub_bot">
                        <div class="h_sub_img_box">
                            <img src="../img/sub/spirit_02.png" alt="">
                        </div>
                        <div class="h_sub_text_box">
                            <h1>편안하고 내구성이<br>뛰어난 침대를<br>탄생시켰습니다.</h1>
                            <p>해스텐스(<span class="font_noto">Hästens</span>)의 역사는<br>그레이엄 벨과 토마스 에디슨이 그들의 발명품인<br>전화기와 전구로 사람들의 눈과 귀를 밝히기도 전인<br>1852년으로 거슬러 올라갑니다.</p>
                        </div>
                    </div>
                </div>
                <div class="heritage01_sub_02">
                    <div class="h_sub_bot1">
                        <p>
                            본래 해스텐스는 고급 말 안장 제작 기업으로 시작되었는데,<br>
                            당시에는 안장 제작자가 침대 매트리스도 함께 만들었기에, 해스텐스 역시 안장과 매트리스를 함께 제작하였습니다.<br>
                            그 후 전문 침대 제작 기업으로 성장시키기 위해 수공예 마스터 기술을 연마하고 발전시켰습니다.<br>
                            해스텐스는 북유럽 스웨덴의 독특한 감각을 결합해 침대 제조 기술을 한 단계 향상시켰고,<br>
                            더욱 편안하고 내구성이 뛰어난 침대를 탄생시켰습니다.
                        </p>
                    </div>
                    <div class="h_sub_bot2">
                        <div class="h_sub_bot_text">
                            <h1>소재와 품질에 대한 고집</h1>
                            <p>
                                1953년 무렵 해스텐스는 미국과 스웨덴을 오가던 <span class="font_noto">SAL</span> 고급 크루즈 유람선에 침대를 공급하게 되었고,<br>
                                이후부터 해스텐스 침대의 놀라운 품질은 전 세계로 뻗어 나가게 되었습니다.<br>
                                해스텐스는 1852년부터 지금까지 오직 인간에게 최상의 숙면을 제공하기 위한 하이엔드 침대의 제작에 초점을 맞춰왔으며,<br>
                                소재와 품질에 대한 고집은 자연스럽게 "세계 최고의 침대"로 모두가 공인하는 브랜드로 자리매김하였습니다.<br><br>
                                해스텐스가 설립되었을 당시에는 기존의 침대보다 더 좋은 것을 만드는 것과<br>
                                침대 제조 기술을 연마하여 재창조 하는 것이 주목적이었습니다.<br>
                                이에 초기부터 모든 침대에 홀스헤어, 울코튼 플렉스(아마 섬유)와 같은 최고의 천연 소재만을 침대의 충전재로 사용하였습니다.<br>
                                이런 장인 정신이 담긴 전통은 천연 소재에 대한 이해와 재료의 효능을 극대화하는 밑거름이 되었습니다.<br><br>
                                당신은 우리의 영감입니다.<br>
                                최고의 수면을 취하기 위해 필요한 것과 서비스, 건축, 품질, 편안함 및 기능 모든것이 중요합니다. <br>
                                6대에 걸친 수면 공예와 천연 재료가 절정에 있습니다. 당신은 우리의 끝없는 우수성을 추구하면서 항상 우리를 이끌어 왔습니다.<br>
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