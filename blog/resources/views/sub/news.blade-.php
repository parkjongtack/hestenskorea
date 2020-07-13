@include('inc/head')
			<div id="sub_sec">
                <div class="news">
                    <div class="news_tabs">
                        <a href="{{ $_SERVER['REDIRECT_URL'] }}/?tab=1" class="tans01 hei85p @if($_SERVER['REQUEST_URI'] == '/sub/news?tab=1') on @endif">PRESS</a><a href="{{ $_SERVER['REDIRECT_URL'] }}/?tab=2" class="tans02 hei85p @if($_SERVER['REQUEST_URI'] == '/sub/news?tab=2') on @endif">MEDIA</a>
                    </div>
                    <div class="news_content inner">
                        <ul class="news_tabs_01 news_tabs_">
<<<<<<< HEAD
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
=======
							@foreach($data as $data)
                            <li class="half" style="cursor:pointer;" onclick="javascript:location.href='{{ $data->link_value }}';">
                                <img src="/storage/app/images/{{ $data->attach_file }}" alt="">
>>>>>>> 9e1203cdfae4c4fd49c908fd4cd18a071baeb621
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">{{ $data->subject }}</p>                                    
                                </div>
                            </li>
							@endforeach
                            <!-- <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li> -->
                        </ul>
                        <div class="pag_write news_tabs_01">
                            <!-- <ul>
                                <li><a href="#none"><</a></li>
                                <li class="on"><a href="#none">1</a></li>
                                <li><a href="#none">2</a></li>
                                <li><a href="#none">3</a></li>
                                <li><a href="#none">4</a></li>
                                <li><a href="#none">5</a></li>
                                <li><a href="#none">6</a></li>
                                <li><a href="#none">></a></li>
                            </ul> -->
							{!! $paging_view !!}
                        </div>

                        <ul class="news_tabs_02 news_tabs_">
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">1</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                            <li class="half">
                                <div class="youtube_img">
                                    <img src="https://img.youtube.com/vi/nVCubhQ454c/0.jpg" alt="">
                                </div>
                                <div class="acc_content_text">
                                    <p class="hei85" style="text-align: center;">2</p>
                                    
                                </div>
                            </li>
                        </ul>
                        <div class="pag_write news_tabs_02">
                            <ul>
                                <li><a href="#none"><</a></li>
                                <li class="on"><a href="#none">1</a></li>
                                <li><a href="#none">2</a></li>
                                <li><a href="#none">3</a></li>
                                <li><a href="#none">4</a></li>
                                <li><a href="#none">5</a></li>
                                <li><a href="#none">6</a></li>
                                <li><a href="#none">></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@include('inc/footer')
    </body>
</html>