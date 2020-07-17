$(function(){
    var nav = $('.nav_list li');
    var sub_nav = $('.sub_nav');
    var ham_list = $('.ham_list');
    var nav_list,
        nav_offset,
        ham_nav = "";
    $(sub_nav).hide();
    $(".hamburger").click(function(){
        
        $('#ham_nav').toggle();
      });
    function on_sub_nav(nav_list,nav_offset){
        $(sub_nav).hide();
        $('.'+nav_list).show();
        var ul_width = $('.'+nav_list+' ul').width();
        //console.log(ul_width);
        if(nav_list == "Contact"){
            $('.'+nav_list+' ul').eq(0).css({marginLeft:nav_offset-ul_width+"px"});
        }else if(nav_list == "Acc"){
        }
        else{
            $('.'+nav_list+' ul').eq(0).css({marginLeft:nav_offset-ul_width/2+"px"});
        }
        
    }
    $(nav,sub_nav).hover(function(){
        nav_list = $(this).text(); 
        nav_offset = $(this).offset().left;
        on_sub_nav(nav_list,nav_offset)
    });
    $(sub_nav).hover(function(){
        
    },function(){
        $(sub_nav).hide();
    });

    $(ham_list).click(function(){
        ham_nav = $(this).text();
        $('.ham'+ham_nav+'').slideToggle();
    })
    //서브

    //material
    var w_width = $(document).width();
    if(w_width < 769){
        var img_height = [];
        setTimeout(function(){
            for(var i=0; i<$("#sub_sec .material_sub_img").length; i++){
                img_height[i] = $("#sub_sec .material_sub_img").eq(i).children(".mo_block").height();
                img_height[i] = img_height[i]/360*100;
                $("#sub_sec .material_sub_img").eq(i).css({height:img_height[i]+"vw"});
            }
            console.log(img_height)
            
        },100)
        
        
    }

    $("#sub_sec .material_sub_img").click(function(){
        var w_widht = $(document).width();
        if(w_widht > 1367){
        var this_con = $(this);
        var idx = $(this).parent().index();
        console.log("adsfasfdsa")
        function doing(){
            var header_height = $("#header").height();
            console.log(header_height)
            var this_con_offset = $(this_con).offset().top;
            $('html, body').animate({scrollTop:this_con_offset-header_height},0);
        }

        var start_inter = setInterval(doing,0);

        function even_odd(check_idx){
            return (check_idx % 2)? "odd":"even";
        }
        var even_or_odd = even_odd(idx)
        console.log(even_or_odd)
        $(this).stop();
        $("#sub_sec .material_sub_img").removeClass('on_')
        $(this_con).addClass('on_');
        for(var i=0; i<$('.material_sub').length; i++){
            $("#sub_sec .material_sub_img").eq(i).not(".on_").children('img').attr('src','../img/sub/material_0'+(i+1)+'.png');
            $("#sub_sec .material_sub_img").eq(i).not(".on_").children('div').css({
                position: "absolute",
                top: "50%",
                left: "50%",
                transform: "translate(-50%,-50%)"
            });
            $("#sub_sec .material_sub_img").not(".on_").eq(i).children('div').children('h2').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)"
            });
            $("#sub_sec .material_sub_img").not(".on_").eq(i).children('div'). children('p').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)",
                textAlign: "center"
            });
        }
		if($(this_con).hasClass('on') == false){
            
            $(this_con).children('img').fadeOut(0);
            
            $(this_con).children('img').attr('src','../img/sub/material_0'+(idx+1)+'_on.png').fadeIn(500);;
            setTimeout(function(){
                var img_height = $(this_con).children('img').height();
            
            if(even_or_odd == "even"){
                console.log(img_height)
                console.log($(this_con))
                $(this_con).children('div').css({
                    height:img_height+"px",
                    position:"absolute",
                    top:0,
                    left:0,
                    transform:"translate(0)"
                })
                $(this_con).children('div').children('h2').css({
                    position:"absolute",
                    top:"15%",
                    bottom:"auto",
                    left:"50%"
                }).animate({
                    top:"15%",
                    bottom:"auto",
                    left:"13.5417vw"
                },700);
                $(this_con).children('div').children('p.toggle_text').css({
                    textAlign:"right",
                    position:"absolute",
                    top:"auto",
                    bottom:"6.9444vw",
                }).animate({
                    top:"auto",
                    bottom:"6.9444vw",
                    left:"auto",
                    right:"13.5417vw"
                },1000);
            }else{
                $(this_con).children('div').css({
                    height:img_height+"px",
                    position:"absolute",
                    top:0,
                    left:0,
                    transform:"translate(0)"
                })
                $(this_con).children('div').children('h2').css({
                    position:"absolute",
                    top:"15%",
                    bottom:"auto",
                    left:"auto"
                }).animate({
                    top:"15%",
                    bottom:"auto",
                    right:"13.5417vw"
                },700);
                $(this_con).children('div').children('p.toggle_text').css({
                    textAlign:"left",
                    position:"absolute",
                    top:"auto",
                    bottom:"6.9444vw",
                }).animate({
                    top:"auto",
                    bottom:"6.9444vw",
                    right:"auto",
                    left:"13.5417vw"
                },1200);
            }
        },200)
            setTimeout(function(){
                $(this_con).animate({height:$(this_con).children('img').height()-5},700);
            },200);
        }
        setTimeout(function(){
            clearInterval(start_inter);
        },500);
        $("#sub_sec .material_sub_img").removeClass("on");
        $(this_con).toggleClass("on");
        
        $("#sub_sec .material_sub_img").not('.on').animate({height:"15.6250vw"},0);
        $("#sub_sec .material_sub_img").not('.on').children('div').css({height:"auto"});
    }else if(w_widht > 768){
        console.log("abs")
        var this_con = $(this);
        var idx = $(this).parent().index();
        for(var i=0; i<$('.material_sub').length; i++){
            $("#sub_sec .material_sub_img").eq(i).children('img').attr('src','../img/sub/material_0'+(i+1)+'.png');
            $("#sub_sec .material_sub_img").eq(i).children('div').css({
                position: "absolute",
                top: "50%",
                left: "50%",
                transform: "translate(-50%,-50%)"
            });
            $("#sub_sec .material_sub_img").eq(i).children('div').children('h2').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)"
            });
            $("#sub_sec .material_sub_img").eq(i).children('div'). children('p').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)",
                textAlign: "center"
            });
        }
        $(this_con).animate({height:$(this_con).children('img').height()-5},100);
        $("#sub_sec .material_sub_img").removeClass("on");
        $(this_con).toggleClass("on");
        
        $("#sub_sec .material_sub_img").not('.on').animate({height:"15.6250vw"},0);
    }else{
        console.log("abs")
        var this_con = $(this);
        var idx = $(this).parent().index();
        $(this_con).children('.mo_block').attr('src','../img/sub/m_material_0'+(idx+1)+'_on.png').fadeIn(500);
        $("#sub_sec .material_sub_img").removeClass("on");
        $(this_con).toggleClass("on");
        for(var i=0; i<$('.material_sub').length; i++){
            $("#sub_sec .material_sub_img").eq(i).not(".on").children('.mo_block').attr('src','../img/sub/m_material_0'+(i+1)+'.png');
            $("#sub_sec .material_sub_img").eq(i).children('div').css({
                position: "absolute",
                top: "50%",
                left: "50%",
                transform: "translate(-50%,-50%)"
            });
            $("#sub_sec .material_sub_img").eq(i).children('div').children('h2').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)"
            });
            $("#sub_sec .material_sub_img").eq(i).children('div'). children('p').css({
                position: "relative",
                top: "auto",
                bottom: "auto",
                left: "auto",
                right: "auto",
                transform: "translate(0)",
                textAlign: "center"
            });
        }
        setTimeout(function(){
            $(this_con).animate({height:$(this_con).children('.mo_block').height()-5},100);
        },100)
        
        
        
        for(var i=0; i<$('.material_sub').length; i++){
            $("#sub_sec .material_sub_img").eq(i).not('.on').css({height:img_height[i]+"vw"});
        }
    }
    });

    //news
    var now_url = document.location.href;
    
    if(now_url.indexOf("press?tab=1") != -1){
        $('.news_content ul.news_tabs_').hide();
        $('.news_content ul.news_tabs_').eq(0).show();
    }else{
        $('.news_content ul.news_tabs_').hide();
        $('.news_content ul.news_tabs_').eq(1).show();
    }
    // $('.news_tabs a').click(function(){
    //     var idx = $(this).index();
    //     $('.news_tabs a').removeClass('on');
    //     $(this).addClass('on');
    //     $('.news_content ul.news_tabs_').hide();
    //     $('.news_content ul.news_tabs_').eq(idx).show();
    //     $('.pag_write').hide();
    //     $('.pag_write').eq(idx).show();
    // })
});