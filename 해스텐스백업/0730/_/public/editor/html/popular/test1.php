<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="sample.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="append.js"></script>
</head>

* 모든 컨텐츠는 더블클릭하셔야 정상작동합니다.
<div id="content_area" class="hover_box1" style="border:1px solid #C6E2FF;display:flex;flex-wrap:wrap;justify-content:left;min-height:500px;width:100%;z-index:0;">
<!-- <table id="content_area" style="border:1px solid #000;display:flex;flex-wrap:wrap;justify-content:left;min-height:500px;width:100%;z-index:0;">
	<tr>
		<td> -->
			<!--
			<div id="outer_1" name="outer" style="border:1px solid #000;width:500px;height:500px;" onclick="javascript:id_q2(this,'inner_not_click');">
				<div id="inner_1" name="inner" style="border:1px solid #000;width:200px;height:200px;" onclick="javascript:id_q(this,'inner_click');">
				</div>
				<div id="inner_2" name="inner" style="border:1px solid #000;width:200px;height:200px;" onclick="javascript:id_q(this,'inner_click');">
				</div>
			</div>
			-->
		<!-- </td>
	</tr>
</table> -->
<!-- <table class="content" style="background-color:gray;z-index:1;width:300px;height:300px;" ><tr><td valign="top"></td></tr></table> -->
</div>
<div id=""></div>
<input type="hidden" id="aaa" name="bbb" />
<input type="hidden" id="ccc" name="ddd" />
<input type="hidden" id="bbb" name="bbb" />
<input type="hidden" id="eee" name="eee" />
<form name="contents_form" method="post" action="./fileout.php">
  <textarea name="contents" style="display:none;"></textarea>
  <input type="button" name="save" value="저장" />
</form>
<script>
	var count = 0;
	function id_q(dom, inner_check) {
		if($(dom).attr("name") == "inner") {
			$("#aaa").val(dom.id);
			count = count + 1;
			return;
		}
	}

	function id_q2(dom, inner_check) {
		if(count >= 1) {
			$("#ccc").val("");
			count = 0;
		} else {
			$("#ccc").val(dom.id);					
		}
	}

	var count2 = 0;
	function id_q3(dom, inner_check, uniq) {
		if($(dom).attr("id") == "inner") {
			$("#bbb").val(dom.id);
			count2 = count2 + 1;
			return;
		}
	}

	function id_q4(dom, inner_check, uniq) {
		if(count2 >= 1) {
			$("#eee").val("");
			//$("#bbb").focus();
			count2 = 0;

			$(dom).draggable();
			$(dom).draggable( "destroy" );

		} else {
			$("#eee").val(dom.id);	

			$("input[name=valid_text_name]").val($(dom).attr("name"));
			
			/*
			$("input[id="+$("input[name=valid_text_name]").val()+"]")
			  .on("dragover", dragOver)
			  .on("dragleave", dragOver)
			  .on("drop");
			*/
			/*
			$("#"+$("input[name=valid_text_name]").val()).resizable({
			  disabled: false
			});
			*/

			$("div[name="+$("input[name=valid_text_name]").val()+"]").resizable();

			$("div[name=text_outer_"+ uniq +"]").css("cursor","grab");
			$("div[name=text_inner_"+ uniq +"]").css("cursor","text");

			$("div[name=text_inner_"+ uniq +"]").css("width",(parseInt($("div[name=text_outer_"+ uniq +"]").css("width")) - 20) + "px");
			$("div[name=text_inner_"+ uniq +"]").css("height",(parseInt($("div[name=text_outer_"+ uniq +"]").css("height")) - 20) + "px");

			//alert((parseInt($("div[name=text_outer_"+ uniq +"]").css("width")) - 10) + "px");
			//alert($("div[name=text_outer_"+ uniq +"]").css("width"));

			//$("#"+$("input[name=valid_text_name]").val()).draggable({
			$(dom).draggable({
				 cursor:"pointer", // 커서 모양
				 containment:"#content_area", // div영역 에서만 움직이도록 설정
				 //axis:"x", // 드래그 방향 설정 (x, y) 모두 움직이려면 axis 제거
				 revert:false, // true:드래그 후 원위치로 복귀, false:드래그 후 현재(이동한) 위치
			});
			


		}
	}

	var src = $("#content_area").html();

	var regEx = /(\d*(\.?\d*)+\s*px)/gi;


	var Cda = {
		_convertCssVw : function(obj) {

			var src = obj.html();

			var r = src.replace(regEx,  function($1) {
					var a = $1.replace("px",""),
						st = 1440;

						a = parseInt(a);
						//a = (a / ( st / 100)).toFixed(4);
						a = (a / ( st / 100)).toFixed( 4 );
						a = a + "vw";

						return a;
			})	;
			
			/*
			var str_r = "",
				re = null;

			if($("#attr_chk").is(":checked")) {
				for(var i = 0; i < removeTag.length; i++) {
					str_r = removeTag[i] + regStr;
					re = new RegExp(str_r, "gi");
				
					r = r.replace(re, "" );
				}
			}
			*/
			return r;
			//txtareaRst.addClass("on").val ( r ).select();

		}
	}				

	$(function () {

		

		$("input[name=save]").click(function () {
			
			var data = Cda._convertCssVw( $("#content_area") );

			//console.log(data);
			//return;
	
			$("textarea[name=contents]").val($("#content_area").html());
			var form = document.contents_form;
			form.submit();
			
		});
		
		var uniqueId = (function(){ var id=0; return function(){ return id++;} })();
		
		$("input[name=imageAdd]").click(function () {
			
			$("#content_area").append('<table id="content_'+ uniqueId() +'" class="hover_box" onclick="javascript:control_image(this);" style="background-color:gray;z-index:1;width:300px;height:300px;" ><tr><td valign="top" class="hover_box"></td></tr></table>');
			
		});

		$("input[name=textAdd]").click(function () {
			
			var uniq = uniqueId();

			$("#content_area").append('<div id="outer" class="hover_box" name="text_outer_'+ uniq +'" style="position:absolute;border:1px dotted #000;z-index:1;width:150px;height:40px;" onclick="javascript:id_q4(this,\'inner_not_click\', \'' + uniq + '\');"><div class="hover_box" type="text" onclick="javascript:id_q3(this,\'inner_click\', \'' + uniq + '\');" contenteditable="true" id="inner" name="text_inner_'+ uniq +'" style="width:100px;height:30px; possition:relative; top:50%;left:50%; transform:translate(-50%,-50%);"  ></div></div>');
			
		});


	});
</script>
<input type="hidden" name="valid_id" />
<input type="hidden" name="valid_text_name" />
<input type="button" name="imageAdd" value="이미지 추가" />
<input type="button" name="textAdd" value="텍스트 박스 추가" />

  <div style="background-color:#CCFFFF; width:390px; padding: 10px;">

    <button id="selectAll">전체선택</button>
    <button id="bold">굵게</button>
    <button id="italic">기울임</button>
    <button id="underLine">밑줄</button>

    <br/>

    <button id="justifyLeft">왼쪽정렬</button>
    <button id="justifyCenter">가운데정렬</button>
    <button id="justifyRight">오른쪽정렬</button>

    <br/>

    <select id="fontName" width="50px">
        <option value="">글꼴 선택</option>
        <option value="돋움">돋움</option>
        <option value="굴림">굴림</option>
        <option value="궁서">궁서</option>
        <option value="바탕">바탕</option>
        <option value="맑은 고딕">맑은 고딕</option>
    </select>

    <select id="fontSize" width="50px">
        <option value="">글자 크기</option>
        <option value="1">4px</option>
        <option value="2">8px</option>
        <option value="3">10px</option>
        <option value="4">12px</option>
        <option value="5">16px</option>
        <option value="6">20px</option>
        <option value="7">30px</option>
    </select>

    <select id="foreColor" width="50px">
        <option value="">글자 색깔</option>
        <option value="#f00">빨강</option>
        <option value="#00f">파랑</option>
        <option value="#0f0">초록</option>
        <option value="#ffff00">노랑</option>
        <option value="#000">검정</option>
        <option value="#fff">흰색</option>
    </select>

    <select id="hiliteColor" width="50px">
        <option value="">글자 배경색</option>
        <option value="#f00">빨강</option>
        <option value="#00f">파랑</option>
        <option value="#0f0">초록</option>
        <option value="#ffff00">노랑</option>
        <option value="#000">검정</option>
        <option value="#fff">흰색</option>
    </select>

  </div>

<!-- <div class="content">
</div> -->
<input type="button" name="image_control1" value="이미지 앞으로 보내기" onclick="javascript:zindexin();" />
<input type="button" name="image_control1" value="이미지 뒤로 보내기" onclick="javascript:zindexout();" />
<input type="button" name="image_control1" value="이미지 드래그" onclick="javascript:draglayer();" />
<input type="button" name="image_control1" value="이미지 크기 조정" onclick="javascript:resizableTrue();" />
<input type="button" name="image_control1" value="이미지 크기 조정 취소" onclick="javascript:resizableFalse();" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
.content {
	/*
	outline: 2px dashed #92b0b3 ;
    outline-offset:-10px;  
    text-align: center;
    transition: all .15s ease-in-out;
	width: 300px;
    height: 300px;
	z-index:0;
    background-color: gray;
	*/
}

</style>

<script type="text/javascript">

function control_image(dom) {
	//alert("편집 이미지가 선택되었습니다.");
	$("input[name=valid_id]").val(dom.id);
	
	//alert($("input[name=valid_id]").val());
	//alert("table[id="+$("input[name=valid_id]").val()+"]");
	$("table[id="+$("input[name=valid_id]").val()+"]")
	  .on("dragover", dragOver)
	  .on("dragleave", dragOver)
	  .on("drop", uploadFiles);

	//$("#"+$("input[name=valid_id]").val()).css("z-index","999");
	//$(".content").draggable();
	
	//alert("#"+$("input[name=valid_id]").val());

	$("#"+$("input[name=valid_id]").val()).draggable({
		 cursor:"pointer", // 커서 모양
		 containment:"#content_area", // div영역 에서만 움직이도록 설정
		 //axis:"x", // 드래그 방향 설정 (x, y) 모두 움직이려면 axis 제거
		 revert:false, // true:드래그 후 원위치로 복귀, false:드래그 후 현재(이동한) 위치
	});


}

function control_text(dom) {

	$("input[name=valid_text_name]").val(dom.id);
	
	/*
	$("input[id="+$("input[name=valid_text_name]").val()+"]")
	  .on("dragover", dragOver)
	  .on("dragleave", dragOver)
	  .on("drop");
	*/

	//$("#"+$("input[name=valid_text_name]").val()).draggable({
	$("#"+dom.id).draggable({
		 cursor:"pointer", // 커서 모양
		 containment:"#content_area", // div영역 에서만 움직이도록 설정
		 //axis:"x", // 드래그 방향 설정 (x, y) 모두 움직이려면 axis 제거
		 revert:false, // true:드래그 후 원위치로 복귀, false:드래그 후 현재(이동한) 위치
	});


}

function dragOver(e){
  e.stopPropagation();
  e.preventDefault();
}

function uploadFiles(e){
  e.stopPropagation();
  e.preventDefault();
}

function dragOver(e) {
    e.stopPropagation();
    e.preventDefault();
    if (e.type == "dragover") {
        $(e.target).css({
            "background-color": "black",
            "outline-offset": "-20px"
        });
    } else {
        $(e.target).css({
            "background-color": "gray",
            "outline-offset": "-10px"
        });
    }
}

function uploadFiles(e) {
    e.stopPropagation();
    e.preventDefault();
    dragOver(e); //1
 
    e.dataTransfer = e.originalEvent.dataTransfer; //2
    var files = e.target.files || e.dataTransfer.files;

    if(files.length > 1) {
        alert('한개의 이미지만 올려주세요.');
        return;
    }

	if(files[0].type.match(/image.*/)) {

		var form_data = new FormData();                  
		form_data.append('upfiles', files[0]);
		$.ajax({
			type: 'POST',
			url: 'file_upload2.php',
			contentType: false,
			processData: false,
			data: form_data,
			success:function(response) {
				$(e.target).css({
					"background-image": "url('" + response + "')",
					"outline": "none",
					"background-size": "100% 100%"
				});
			}
		});
	
	/*				
		$(e.target).css({
			"background-image": "url(" + window.URL.createObjectURL(files[0]) + ")",
			"outline": "none",
			"background-size": "100% 100%"
		});
	*/

	}else{
	  alert('이미지가 아닙니다.');
	  return;
	}

}

function zindexin() {
	$("#"+$("input[name=valid_id]").val()).css("z-index","1");
}

function zindexout() {
	$("#"+$("input[name=valid_id]").val()).css("z-index","-1");
}

function draglayer() {
	//$("#"+$("input[name=valid_id]").val()).css("z-index","999");
	//$(".content").draggable();
	
	$("#"+$("input[name=valid_id]").val()).draggable({
		 cursor:"pointer", // 커서 모양
		 containment:"#content_area", // div영역 에서만 움직이도록 설정
		 //axis:"x", // 드래그 방향 설정 (x, y) 모두 움직이려면 axis 제거
		 revert:false, // true:드래그 후 원위치로 복귀, false:드래그 후 현재(이동한) 위치
	});

}

function resizableTrue() {

	//$('.content').resizable();
	$("#"+$("input[name=valid_id]").val()).resizable({
	  disabled: false
	});

}

function resizableFalse() {

	//$('.content').resizable(false);
	//$( ".content" ).resizable( "option", "aspectRatio", false );
	//$( ".content" ).resizable( "option", "cancel", true );
	$("#"+$("input[name=valid_id]").val()).resizable( "option", "disabled", true );
}

</script>
<script>

  document.execCommand('styleWithCSS', false, true);

  document.execCommand('insertBrOnReturn', false, true);

  $(document).ready(function() {

	$("#content_area").resizable();
	/*
	$( ".content" ).resizable({
	  disabled: false
	});
	*/

    $("#text").focus();

    $('button').click(function(){

      document.execCommand($(this).attr('id'), false, true);

    });

    $('#bold').click(function() {

        document.execCommand('bold', false, true);
    });

    $('#selectAll').click(function() {

        document.execCommand('selectAll', false, true);
    });

    $('#italic').click(function() {

       document.execCommand('italic', false, true);

    });

    $("#underLine").click(function() {

       document.execCommand('underLine', false, true);

    });

    $("#justifyLeft").click(function() {

       document.execCommand('justifyLeft', false);

    });

    $("#justifyRight").click(function() {

       document.execCommand('justifyRight', false);

    });

    $("#justifyCenter").click(function() {

       document.execCommand('justifyCenter', false);

    }); 

    $('select').change(function(){

      document.execCommand($(this).attr('id'), false, $(this).val());

    });

    $("#foreColor").change(function(){ 

       document.execCommand('foreColor', false, $(this).val());

    });

    $("#hiliteColor").change(function(){

       document.execCommand('hiliteColor', false, $(this).val());

    });

    $("#fontName").change(function(){

       document.execCommand('fontName', false, $(this).val());

    });

    $("#fontSize").change(function(){

       document.execCommand('fontSize', false, $(this).val());

    });


    //$('button').click(function(){

		//$("input[name="+$("#valid_text_name").val()+"]").css();

    //});

  });

</script>