$(function(){
//    var ido;
//    var flag = 0;
//    var select_val;
//    var uniqueId = (function(){ var id=0; return function(){ return id++;} })();
//    var text_uniqueId = (function(){ var id=0; return function(){ return id++;} })();
//    var outer_uniqueId = (function(){ ido=0; return function(){ return ido++;} })();
//    $("input[name=imageAdd]").click(function () {
//        
//        $("#content_area").append('<table id="content_'+ uniqueId() +'" class="contents" contenteditable="true" onclick="javascript:control_image(this);" style="position:relative;background-color:transparent; border:1px dotted #f01234; z-index:1;width:300px;height:300px;" ><tr><td align="left" valign="top"></td></tr></table>');
//        
//    });
//    var item,
//        item_list_cnt,
//        item_css;
//    $('.abc').click(function(){
//        console.log(ido);
//        item_list_cnt = $('input[name=item_list_cnt]').val();
//        console.log(item_list_cnt)
//        item = '<table id="content_outer_'+ outer_uniqueId() +'" class="contents" onclick="javascript:control_image(this);" style="position:relative;background-color:transparent; border:1px dotted #f01234; z-index:1;width:1000px;height:400px;display:flex;align-items:center; justify-content:center;" ><tr><td align="left" valign="top"></td></tr></table>';
//        //item_child = '<table id="content_inner_'+ uniqueId() +'" onclick="javascript:control_image(this);" style="position:relative;background-color:#f0f0f0;z-index:1;width:300px;height:300px;" ><tr><td align="left" valign="top"></td></tr></table>';
//        $('#content_area').append(item);
//        // if(flag == 0){
//        //     ido = ido-1;
//        //     flag++;
//        // }
//        for(var i = 0; i<item_list_cnt; i++){
//            append_par = "#content_outer_"+(ido-1);
//            console.log(append_par);
//            $(append_par).append('<table id="content_inner_'+ uniqueId() +'" contenteditable="true" class="contents" onclick="javascript:control_image(this);" style="position:relative;background-color:transparent; border:1px dotted #f01234;z-index:2;width:300px;height:300px;item-align:center; margin: 0 auto;" ><tr><td align="left" valign="top"></td></tr></table>');
//        }
//    });
//    $(".contents").click(function(){
//        //var idx_val = $(this).attr('id');
//        //$('input[name=valid_id]').val(idx_val);
//    });
//    $('.add_text').click(function(){
//        select_val = "#"+$('input[name=valid_id]').val();
//        $(select_val).append('<span id="text_'+text_uniqueId()+'" onclick="javascript:dragtext(this);" style="padding:10px; border:1px dotted #f01234;"></span>');
//        console.log(select_val);
//    });

//    $(".hover_box").hover(function(){
//		var i = $(this).index();
//		console.log(i)
//		$(".hover_box").eq(i).css({boxShadow:"0px 0px 10px #4ca3dd"});
//    }, function(){
//		var i = $(this).index();
//		$(".hover_box").eq(i).css({boxShadow:"none"});
//    });
});