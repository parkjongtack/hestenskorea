@include('inc/head')
<style>
    .wrap_controllers{display: none !important;}
</style>
    <div id="sub_sec">
        <div class="contact">
            <div class="map">
                <div id="daumRoughmapContainer1594365579451" class="root_daum_roughmap root_daum_roughmap_landing mo_none"></div>
                <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
                <script charset="UTF-8">
                   new daum.roughmap.Lander({
                      "timestamp" : "1594365579451",
                      "key" : "2z72g",
                      "mapWidth" : "1920",
                      "mapHeight" : "540"
                   }).render();
                </script>
				<div id="daumRoughmapContainer1594382776882" class="root_daum_roughmap root_daum_roughmap_landing mo_block"></div>
				<script charset="UTF-8">
					new daum.roughmap.Lander({
						"timestamp" : "1594382776882",
						"key" : "2z778",
						"mapWidth" : "360",
						"mapHeight" : "260"
					}).render();
				</script>
            </div>
            <div class="contact_info inner">
                <div class="info left">
                    <div class="info_text">
                        <div class="info_ico">
                            <img src="/img/sub/contact_ico_01.png" alt="">
                        </div>
                        <p>전화문의</p>
                        <h1>02-3467-8407</h1>
                        <span>
                            email-8h@the8h.com<br>
                            MON-SAT 9:30~19:00<br>
                            SUN 11:00~6:00
                        </span>
                    </div>
                </div>
                <div class="info right">
                    <img class="mo_none" src="/img/sub/contact_01.png" alt="">
					<img class="mo_block" src="/img/sub/m_contact_01.png" alt="">
                </div>
                <div class="info left">
                    <div class="info_text">
                        <div class="info_ico">
                            <img src="/img/sub/contact_ico_02.png" alt="">
                        </div>
                        <p>판매처</p>
                    </div>
                </div>
                <div class="info right">
                    <img class="mo_none" src="/img/sub/contact_02.png" alt="">
					<img class="mo_block" src="/img/sub/m_contact_02.png" alt="">
                </div>
            </div>
        </div>
    </div>
@include('inc/footer')
    </body>
</html>