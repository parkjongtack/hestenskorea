<style type="text/css">
<!--
#SpecialCharacters { position:absolute;  width:422px;}
#RomanAlhabets { position:absolute; left:1px; top:50px; width:420px;}
#MathematicalSymbols{ position:absolute; left:1px; top:50px; width:420px;}
#Unit { position:absolute; left:1px; top:50px; width:420px;}
#Superscript { position:absolute; left:1px; top:50px; width:420px;}
#Subscript { position:absolute; left:1px; top:50px; width:420;}

-->
</style>





<script language="JavaScript" type="text/javascript">
<!--



function ShowHideLayer(nID, txtAreaObj, event) {
    //var layer = document.all;
    var lr_SpecialCharacters = document.getElementById('SpecialCharacters');
    var lr_RomanAlhabets = document.getElementById('RomanAlhabets');
    var lr_MathematicalSymbols = document.getElementById('MathematicalSymbols');
    var lr_Unit = document.getElementById('Unit');
    var lr_Superscript = document.getElementById('Superscript');
    var lr_Subscript = document.getElementById('Subscript');
    
    /* var y_cusorPoint = getPosition(event).y;
    var topLocation = y_cusorPoint; */
    
    
    var topLocation =event.pageY ? event.pageY : document.documentElement.scrollTop + event.clientY;
   
    
		
	  if (!txtAreaObj) {
        txtAreaObj = document.forms['absForm'].txtAreaName.value;
    } else {
        document.forms['absForm'].txtAreaName.value = txtAreaObj;

        lr_SpecialCharacters.style.top = (topLocation-430)+"px";
        
    }
    
    switch (nID){
        case 'All' : lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'block'; 
                     lr_MathematicalSymbols.style.display = 'none';
                     lr_Unit.style.display = 'none';
                     lr_Superscript.style.display = 'none';
                     lr_Subscript.style.display = 'none';
                     break;
        case 'R' :   lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'block'; 
                     lr_MathematicalSymbols.style.display = 'none';
                     lr_Unit.style.display = 'none';
                     lr_Superscript.style.display = 'none';
                     lr_Subscript.style.display = 'none';
                     break;
        case 'M' :   lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'none'; 
                     lr_MathematicalSymbols.style.display = 'block';
                     lr_Unit.style.display = 'none';
                     lr_Superscript.style.display = 'none';
                     lr_Subscript.style.display = 'none';
                     break;
        case 'U' :   lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'none'; 
                     lr_MathematicalSymbols.style.display = 'none';
                     lr_Unit.style.display = 'block';
                     lr_Superscript.style.display = 'none';
                     lr_Subscript.style.display = 'none';
                     break;
        case 'P' :   lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'none'; 
                     lr_MathematicalSymbols.style.display = 'none';
                     lr_Unit.style.display = 'none';
                     lr_Superscript.style.display = 'block';
                     lr_Subscript.style.display = 'none';
                     break;
        case 'B' :   lr_SpecialCharacters.style.display = 'block'; 
                     lr_RomanAlhabets.style.display = 'block'; 
                     lr_MathematicalSymbols.style.display = 'none';
                     lr_Unit.style.sisplay = 'none';
                     lr_Superscript.style.display = 'none';
                     lr_Subscript.style.display = 'block';
                     break;
        case 'Close' : lr_SpecialCharacters.style.display = 'none'; break;
        
        default : lr_SpecialCharacters.style.display = 'none'; break;
    }
}



/* function $(Element){
  return document.getElementById(Element);
 } */

 
function insertSpecialChar(prefix) {
  var form = document.forms['absForm'];
  var obj = eval('form.'+form.txtAreaName.value);
  
  if (document.getSelection)    ts = document.getSelection();
  else if (document.selection)  ts = document.selection.createRange().text;
  else if (window.getSelection) ts = window.getSelection();

  if (ts != ""){ //IE
   document.selection.createRange().text = prefix + ts ;
  }else {
   if (obj.selectionStart == obj.selectionEnd){
    if(/*@cc_on!@*/false){
     obj.focus();
     document.selection.createRange().duplicate().text = prefix + document.selection.createRange().duplicate().text ;
          document.selection.createRange().select();
    }else{
     var s1 = obj.value.substring(0, obj.selectionStart);
     var s2 = obj.value.substring(obj.selectionStart);
     obj.value = s1 + prefix  + s2;
    }
   }else{
     var s1 = obj.value.substring(0, obj.selectionStart);
     var s2 = obj.value.substring(obj.selectionStart, obj.selectionEnd);
     var s3 = obj.value.substring(obj.selectionEnd);
     obj.value = s1 + prefix + s2  + s3;
   }
  }
  obj.focus();
	CountCharters();
}



/* function saveCurrentPos (objTextArea) {
    if (objTextArea.createTextRange) 
    //objTextArea.currentPos = document.selection.createRange().duplicate();
    objTextArea.currentPos = document.body.createTextRange().duplicate();
    return true;
}


function insertSpecialChar (spChar) {
    var form = document.forms['absForm'];
    var objTextArea = eval('form.'+form.txtAreaName.value);
    if (objTextArea.createTextRange && objTextArea.currentPos) {
        alert("a")
        //var currentPos = objTextArea.currentPos;
        //currentPos.text = spChar;
    } else {
        alert("b")
        //objTextArea.value = objTextArea.value + spChar;
    }
} */

/* 
String.prototype.Trim = function() {  // <% ' Trim 정의 %>
    return this.replace(/(^ *)|( *$)/g, "");
} */






function CountCharters(field) {
    var form = document.forms['absForm'];
    var field_O = form.objective.value.Trim(); if (field_O) { field_O = field_O + '\n';}  // <% ' 입력값이 있으면 기본 enter 키값 추가(키운트 증가 위함) %>
    var field_M = form.methods.value.Trim(); if (field_M) { field_M = field_M + '\n';}
    var field_R = form.results.value.Trim(); if (field_R) { field_R = field_R + '\n';}
    var field_C = form.conclusions.value.Trim(); if (field_C) { field_C = field_C + '\n';}
    var strFieldAll = field_O + field_M + field_R+ field_C;
    var strLength = field_O.length + field_M.length + field_R.length + field_C.length;
    var tmpStrCount = form.tmpStrCount.value;
    var tmpInt = 0;
    
    for (var i=0; i<strLength; i++) {
        //if (strFieldAll.substring(i,i+1).indexOf(' ')!=-1) {
        if (strFieldAll.substring(i,i+1).indexOf(' ')!=-1 || strFieldAll.substring(i,i+1).indexOf('\n')!=-1) {
            tmpInt++;
            form.tmpStrCount.value = tmpInt;
        }
    }
    /* for (i=0; i<document.all.countView.length; i++) {
        document.all.countView[i].innerText = tmpInt;
    } */
    for (i=0; i<document.getElementsByName('countView').length; i++) {
        document.getElementsByName('countView')[i].innerHTML = tmpInt;
    }
    
    
    var newStrFieldAll;
    var newTmpStrCount = 0;
    if (tmpInt>eval('<%=absLimitWord%>')) {
        alert('Please enter <%=absLimitWord%> words limit.');
        //field.value = field.value.substring(0,field.value.lastIndexOf(' '));
        newStrFieldAll = form.objective.value + form.methods.value + form.results.value + form.conclusions.value;        
        /* for (j=0; j<field.value.length-1; j++) {
            //if (newStrFieldAll.substring(j,j+1).indexOf(' ')!=-1) {
            if (newStrFieldAll.substring(j,j+1).indexOf(' ')!=-1 || strFieldAll.substring(i,i+1).indexOf('\n')!=-1) {
                field.value = field.value.substring(0,field.value.lastIndexOf(' '));
                tmpInt--;
                form.tmpStrCount.value = tmpInt-1;
            }
            if (tmpInt<=eval('<%=absLimitWord%>')) {
                //for (k=0; k<document.all.countView.length; k++) {
                //   document.all.countView[k].innerText = tmpInt;
                //}
                for (k=0; k<document.getElementsByName('countView').length; k++) {
                    document.getElementsByName('countView')[k].innerText = tmpInt;
                }
                break;
            }
        } */
        
        return false;
    }
}





function getCountCharters() {
    var form = document.forms['absForm'];
    var field_O = form.objective.value.Trim(); if (field_O) { field_O = field_O + '\n';}  // <% ' 입력값이 있으면 기본 enter 키값 추가(키운트 증가 위함) %>
    var field_M = form.methods.value.Trim(); if (field_M) { field_M = field_M + '\n';}
    var field_R = form.results.value.Trim(); if (field_R) { field_R = field_R + '\n';}
    var field_C = form.conclusions.value.Trim(); if (field_C) { field_C = field_C + '\n';}
    var strFieldAll = field_O + field_M + field_R+ field_C;
    var strLength = field_O.length + field_M.length + field_R.length + field_C.length;
    var tmpStrCount = form.tmpStrCount.value;
    var tmpInt = 0;
    
    for (var i=0; i<strLength; i++) {
        //if (strFieldAll.substring(i,i+1).indexOf(' ')!=-1) {
        if (strFieldAll.substring(i,i+1).indexOf(' ')!=-1 || strFieldAll.substring(i,i+1).indexOf('\n')!=-1) {
            tmpInt++;
            form.tmpStrCount.value = tmpInt;
        }
    }
    /* for (i=0; i<document.all.countView.length; i++) {
        document.all.countView[i].innerText = tmpInt;
    } */
    for (i=0; i<document.getElementsByName('countView').length; i++) {
        document.getElementsByName('countView')[i].innerText = tmpInt;
    }
    
    
    var newStrFieldAll;
    var newTmpStrCount = 0;
    if (tmpInt>eval('<%=absLimitWord%>')) {
        return false;
    } else {
        return true;
    }
}


//-->
</script>















<!-- Start. Special Characters -->
<div id="SpecialCharacters" style="display:none;">
  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="24" align="center" >Special Characters</td>
                  <td width="20"  align="right">
                    <img src="/_images/close_btn1.gif" alt="close" width="17" height="16" border="0" style="cursor:pointer;" onClick="ShowHideLayer('Close','',event);">
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td height="1" align="center"></td>
          </tr>
          <tr>
            <td>
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="102"><img src="/_images/s_characters_01.gif" width="100" height="20" border="0" id="Image1" style="cursor:pointer;" onClick="ShowHideLayer('R','',event);" onMouseOver="MM_swapImage('Image1','','/_images/s_characters_o_01.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
                  <td width="132"><img src="/_images/s_characters_02.gif" width="130" height="20" border="0" id="Image2" style="cursor:pointer;" onClick="ShowHideLayer('M','',event);" onMouseOver="MM_swapImage('Image2','','/_images/s_characters_o_02.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
                  <td width="50"><img src="/_images/s_characters_03.gif" width="48" height="20" border="0" id="Image3" style="cursor:pointer;" onClick="ShowHideLayer('U','',event);" onMouseOver="MM_swapImage('Image3','','/_images/s_characters_o_03.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
                  <td width="73"><img src="/_images/s_characters_04.gif" width="71" height="20" border="0" id="Image4" style="cursor:pointer;" onClick="ShowHideLayer('P','',event);" onMouseOver="MM_swapImage('Image4','','/_images/s_characters_o_04.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
                  <td style="padding-right:4px;"><img src="/_images/s_characters_05.gif" width="63" height="20" id="Image5" style="cursor:pointer;" onClick="ShowHideLayer('B','',event);" onMouseOver="MM_swapImage('Image5','','/_images/s_characters_o_05.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td height="130">
              <div id="RomanAlhabets">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <tr align="center" bgcolor="#F2F2F2">
                    <td width="26" height="24" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="25" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="26" onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td width="26" onClick="insertSpecialChar('科');" style="cursor:pointer;">科</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24" onClick="insertSpecialChar('誇');" style="cursor:pointer;">誇</td>
                    <td onClick="insertSpecialChar('課');" style="cursor:pointer;">課</td>
                    <td onClick="insertSpecialChar('跨');" style="cursor:pointer;">跨</td>
                    <td onClick="insertSpecialChar('過');" style="cursor:pointer;">過</td>
                    <td onClick="insertSpecialChar('鍋');" style="cursor:pointer;">鍋</td>
                    <td onClick="insertSpecialChar('顆');" style="cursor:pointer;">顆</td>
                    <td onClick="insertSpecialChar('廓');" style="cursor:pointer;">廓</td>
                    <td onClick="insertSpecialChar('慣');" style="cursor:pointer;">慣</td>
                    <td onClick="insertSpecialChar('棺');" style="cursor:pointer;">棺</td>
                    <td onClick="insertSpecialChar('款');" style="cursor:pointer;">款</td>
                    <td onClick="insertSpecialChar('灌');" style="cursor:pointer;">灌</td>
                    <td onClick="insertSpecialChar('琯');" style="cursor:pointer;">琯</td>
                    <td onClick="insertSpecialChar('瓘');" style="cursor:pointer;">瓘</td>
                    <td onClick="insertSpecialChar('管');" style="cursor:pointer;">管</td>
                    <td onClick="insertSpecialChar('罐');" style="cursor:pointer;">罐</td>
                    <td onClick="insertSpecialChar('菅');" style="cursor:pointer;">菅</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24" onClick="insertSpecialChar('觀');" style="cursor:pointer;">觀</td>
                    <td onClick="insertSpecialChar('貫');" style="cursor:pointer;">貫</td>
                    <td onClick="insertSpecialChar('關');" style="cursor:pointer;">關</td>
                    <td onClick="insertSpecialChar('館');" style="cursor:pointer;">館</td>
                    <td onClick="insertSpecialChar('刮');" style="cursor:pointer;">刮</td>
                    <td onClick="insertSpecialChar('恝');" style="cursor:pointer;">恝</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td onClick="insertSpecialChar('��');" style="cursor:pointer;">��</td>
                    <td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                </table>
              </div>
              <div id="MathematicalSymbols">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <tr align="center" bgcolor="#F2F2F2">
                    <td width="26" height="24" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('짹');" style="cursor:pointer;">짹</td>
                    <td width="25" onClick="insertSpecialChar('횞');" style="cursor:pointer;">횞</td>
                    <td width="25" onClick="insertSpecialChar('첨');" style="cursor:pointer;">첨</td>
                    <td width="25" onClick="insertSpecialChar('�돖');" style="cursor:pointer;">�돖</td>
                    <td width="25" onClick="insertSpecialChar('�돞');" style="cursor:pointer;">�돞</td>
                    <td width="25" onClick="insertSpecialChar('�돟');" style="cursor:pointer;">�돟</td>
                    <td width="25" onClick="insertSpecialChar('�닞');" style="cursor:pointer;">�닞</td>
                    <td width="25" onClick="insertSpecialChar('�꼦');" style="cursor:pointer;">�꼦</td>
                    <td width="25" onClick="insertSpecialChar('�꽞');" style="cursor:pointer;">�꽞</td>
                    <td width="25" onClick="insertSpecialChar('�뎿');" style="cursor:pointer;">�뎿</td>
                    <td width="25" onClick="insertSpecialChar('�닊');" style="cursor:pointer;">�닊</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                </table>
              </div>
              <div id="Unit">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <tr align="center" bgcolor="#F2F2F2">
                    <td width="26" height="24" onClick="insertSpecialChar('竊�');" style="cursor:pointer;">竊�</td>
                    <td width="25" onClick="insertSpecialChar('竊�');" style="cursor:pointer;">竊�</td>
                    <td width="25" onClick="insertSpecialChar('占�');" style="cursor:pointer;">占�</td>
                    <td width="25" onClick="insertSpecialChar('竊�');" style="cursor:pointer;">竊�</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="25" onClick="insertSpecialChar('�꼦');" style="cursor:pointer;">�꼦</td>
                    <td width="25" onClick="insertSpecialChar('�꽞');" style="cursor:pointer;">�꽞</td>
                    <td width="25" onClick="insertSpecialChar('占�');" style="cursor:pointer;">占�</td>
                    <td width="25" onClick="insertSpecialChar('占�');" style="cursor:pointer;">占�</td>
                    <td width="25" onClick="insertSpecialChar('占�');" style="cursor:pointer;">占�</td>
                    <td width="25" onClick="insertSpecialChar('짚');" style="cursor:pointer;">짚</td>
                    <td width="25" onClick="insertSpecialChar('�꼮');" style="cursor:pointer;">�꼮</td>
                    <td width="25" onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td width="26" onClick="insertSpecialChar('�궗');" style="cursor:pointer;">�궗</td>
                    <td width="26" onClick="insertSpecialChar('�럶');" style="cursor:pointer;">�럶</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td onClick="insertSpecialChar('�럷');" style="cursor:pointer;" height="24">�럷</td>
                    <td onClick="insertSpecialChar('�럸');" style="cursor:pointer;">�럸</td>
                    <td onClick="insertSpecialChar('�꼻');" style="cursor:pointer;">�꼻</td>
                    <td onClick="insertSpecialChar('�럹');" style="cursor:pointer;">�럹</td>
                    <td onClick="insertSpecialChar('�룄');" style="cursor:pointer;">�룄</td>
                    <td onClick="insertSpecialChar('�렍');" style="cursor:pointer;">�렍</td>
                    <td onClick="insertSpecialChar('�렎');" style="cursor:pointer;">�렎</td>
                    <td onClick="insertSpecialChar('�렏');" style="cursor:pointer;">�렏</td>
                    <td onClick="insertSpecialChar('�렑');" style="cursor:pointer;">�렑</td>
                    <td onClick="insertSpecialChar('�럺');" style="cursor:pointer;">�럺</td>
                    <td onClick="insertSpecialChar('�럻');" style="cursor:pointer;">�럻</td>
                    <td onClick="insertSpecialChar('�럾');" style="cursor:pointer;">�럾</td>
                    <td onClick="insertSpecialChar('�렂');" style="cursor:pointer;">�렂</td>
                    <td onClick="insertSpecialChar('�렃');" style="cursor:pointer;">�렃</td>
                    <td onClick="insertSpecialChar('�렄');" style="cursor:pointer;">�렄</td>
                    <td onClick="insertSpecialChar('�렅');" style="cursor:pointer;">�렅</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24" onClick="insertSpecialChar('�렆');" style="cursor:pointer;">�렆</td>
                    <td onClick="insertSpecialChar('�렊');" style="cursor:pointer;">�렊</td>
                    <td onClick="insertSpecialChar('�렋');" style="cursor:pointer;">�렋</td>
                    <td onClick="insertSpecialChar('�룋');" style="cursor:pointer;">�룋</td>
                    <td onClick="insertSpecialChar('�럪');" style="cursor:pointer;">�럪</td>
                    <td onClick="insertSpecialChar('�럫');" style="cursor:pointer;">�럫</td>
                    <td onClick="insertSpecialChar('�럮');" style="cursor:pointer;">�럮</td>
                    <td onClick="insertSpecialChar('�룒');" style="cursor:pointer;">�룒</td>
                    <td onClick="insertSpecialChar('�럥');" style="cursor:pointer;">�럥</td>
                    <td onClick="insertSpecialChar('�럦');" style="cursor:pointer;">�럦</td>
                    <td onClick="insertSpecialChar('�룉');" style="cursor:pointer;">�룉</td>
                    <td onClick="insertSpecialChar('�렒');" style="cursor:pointer;">�렒</td>
                    <td onClick="insertSpecialChar('�렓');" style="cursor:pointer;">�렓</td>
                    <td onClick="insertSpecialChar('�렟');" style="cursor:pointer;">�렟</td>
                    <td onClick="insertSpecialChar('�렠');" style="cursor:pointer;">�렠</td>
                    <td onClick="insertSpecialChar('�렡');" style="cursor:pointer;">�렡</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td onClick="insertSpecialChar('�렢');" style="cursor:pointer;" height="24">�렢</td>
                    <td onClick="insertSpecialChar('�렣');" style="cursor:pointer;">�렣</td>
                    <td onClick="insertSpecialChar('�렦');" style="cursor:pointer;">�렦</td>
                    <td onClick="insertSpecialChar('�렧');" style="cursor:pointer;">�렧</td>
                    <td onClick="insertSpecialChar('�렩');" style="cursor:pointer;">�렩</td>
                    <td onClick="insertSpecialChar('�렪');" style="cursor:pointer;">�렪</td>
                    <td onClick="insertSpecialChar('�렫');" style="cursor:pointer;">�렫</td>
                    <td onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td onClick="insertSpecialChar('�럞');" style="cursor:pointer;">�럞</td>
                    <td onClick="insertSpecialChar('�럟');" style="cursor:pointer;">�럟</td>
                    <td onClick="insertSpecialChar('�럠');" style="cursor:pointer;">�럠</td>
                    <td onClick="insertSpecialChar('�럡');" style="cursor:pointer;">�럡</td>
                    <td onClick="insertSpecialChar('�렭');" style="cursor:pointer;">�렭</td>
                    <td onClick="insertSpecialChar('�렮');" style="cursor:pointer;">�렮</td>
                    <td onClick="insertSpecialChar('�렯');" style="cursor:pointer;">�렯</td>
                    <td onClick="insertSpecialChar('�렰');" style="cursor:pointer;">�렰</td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td onClick="insertSpecialChar('�렱');" style="cursor:pointer;" height="24">�렱</td>
                    <td onClick="insertSpecialChar('�렲');" style="cursor:pointer;">�렲</td>
                    <td onClick="insertSpecialChar('�럯');" style="cursor:pointer;">�럯</td>
                    <td onClick="insertSpecialChar('�럱');" style="cursor:pointer;">�럱</td>
                    <td onClick="insertSpecialChar('�럲');" style="cursor:pointer;">�럲</td>
                    <td onClick="insertSpecialChar('�럳');" style="cursor:pointer;">�럳</td>
                    <td onClick="insertSpecialChar('�럵');" style="cursor:pointer;">�럵</td>
                    <td onClick="insertSpecialChar('�꽗');" style="cursor:pointer;">�꽗</td>
                    <td onClick="insertSpecialChar('���');" style="cursor:pointer;">���</td>
                    <td onClick="insertSpecialChar('�뢾');" style="cursor:pointer;">�뢾</td>
                    <td onClick="insertSpecialChar('�럧');" style="cursor:pointer;">�럧</td>
                    <td onClick="insertSpecialChar('�럨');" style="cursor:pointer;">�럨</td>
                    <td onClick="insertSpecialChar('�럩');" style="cursor:pointer;">�럩</td>
                    <td onClick="insertSpecialChar('�룚');" style="cursor:pointer;">�룚</td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div id="Superscript">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <tr align="center" bgcolor="#F2F2F2">
                    <td width="26" height="24" onClick="insertSpecialChar('<sup>-10</sup>');" style="cursor:pointer;"><sup>-10</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-9</sup>');" style="cursor:pointer;"><sup>-9</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-8</sup>');" style="cursor:pointer;"><sup>-8</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-7</sup>');" style="cursor:pointer;"><sup>-7</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-6</sup>');" style="cursor:pointer;"><sup>-6</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-5</sup>');" style="cursor:pointer;"><sup>-5</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-4</sup>');" style="cursor:pointer;"><sup>-4</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-3</sup>');" style="cursor:pointer;"><sup>-3</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-2</sup>');" style="cursor:pointer;"><sup>-2</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>-1</sup>');" style="cursor:pointer;"><sup>-1</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>1</sup>');" style="cursor:pointer;"><sup>1</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>2</sup>');" style="cursor:pointer;"><sup>2</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>3</sup>');" style="cursor:pointer;"><sup>3</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>4</sup>');" style="cursor:pointer;"><sup>4</sup></td>
                    <td width="26" onClick="insertSpecialChar('<sup>5</sup>');" style="cursor:pointer;"><sup>5</sup></td>
                    <td width="28" onClick="insertSpecialChar('<sup>6</sup>');" style="cursor:pointer;"><sup>6</sup></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24" onClick="insertSpecialChar('<sup>7</sup>');" style="cursor:pointer;"><sup>7</sup></td>
                    <td onClick="insertSpecialChar('<sup>8</sup>');" style="cursor:pointer;"><sup>8</sup></td>
                    <td onClick="insertSpecialChar('<sup>9</sup>');" style="cursor:pointer;"><sup>9</sup></td>
                    <td onClick="insertSpecialChar('<sup>10</sup>');" style="cursor:pointer;"><sup>10</sup></td>
                    <td onClick="insertSpecialChar('<sup>+</sup>');" style="cursor:pointer;"><sup>+</sup></td>
                    <td onClick="insertSpecialChar('<sup>-</sup>');" style="cursor:pointer;"><sup>-</sup></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                </table>
              </div>
              
              <div id="Subscript">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <tr align="center" bgcolor="#F2F2F2">
                    <td width="26" height="24" onClick="insertSpecialChar('<sub>1</sub>');" style="cursor:pointer;"><sub>1</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>2</sub>');" style="cursor:pointer;"><sub>2</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>3</sub>');" style="cursor:pointer;"><sub>3</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>4</sub>');" style="cursor:pointer;"><sub>4</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>5</sub>');" style="cursor:pointer;"><sub>5</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>6</sub>');" style="cursor:pointer;"><sub>6</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>7</sub>');" style="cursor:pointer;"><sub>7</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>8</sub>');" style="cursor:pointer;"><sub>8</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>9</sub>');" style="cursor:pointer;"><sub>9</sub></td>
                    <td width="25" onClick="insertSpecialChar('<sub>10</sub>');" style="cursor:pointer;"><sub>10</sub></td>
                    <td width="25"></td>
                    <td width="25"></td>
                    <td width="25"></td>
                    <td width="25"></td>
                    <td width="26"></td>
                    <td width="26"></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                  <tr align="center" bgcolor="#F2F2F2">
                    <td height="24"></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
<!-- End. Special Characters -->