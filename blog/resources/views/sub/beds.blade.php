@include('inc/head')
			<div id="sub_sec">
                <div class="beds">
                    <div class="beds_detail inner">
                        <img class="mo_none" src="../img/sub/beds_detail_01.png" alt="">
                        <img class="mo_block" src="../img/sub/m_beds_detail_01.png" alt="">
                        <div class="besd_explain">
                            <p class="hastens_name hei85p">HÄSTENS</p>
                            <p class="beds_title hei85p_kr">VIVIDUS®</p>
                            <p class="beds_txt hei85p_kr">Our second most exclusive bed</p>
                            <a class="beds_more hei85p_kr" href="/sub/beds/sub">SHOW ME THE BED</a>
                        </div>
                    </div>
                    {{-- <div class="beds_bot">
                        <img src="../img/sub/beds_bot.png" alt="">
                    </div> --}}
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