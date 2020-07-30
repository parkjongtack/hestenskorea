<%
' ##############################################################################
' ÃÊ·Ï ¸®½ºÆ® Ãâ·Â½Ã Æ÷ÇÔÇÏ´Â ÃÊ·Ï »ó¼¼ °Ë»öÆû
' ÆÄÀÏ¸í : exe_AL_inc_searchForm.asp
' ¼öÁ¤ÀÏ : 2007.03.28
' ##############################################################################
%>
<script language="JavaScript" type="text/javascript">
<!--
function enter(e){  
      if (e.which == 13){goSearch()}  
} 

function goSearch() {
    var form = document.searchForm;
		var tmpCnt = 0;
		
    /* if (!form.sch_userID.value && !form.sch_fullName.value && !form.sch_smallName.value && !form.sch_email.value && !form.sch_country.value && !form.sch_regDateSt.value && !form.sch_pName.value&& !form.sch_pemail.value) {
				 form.sch_userID.focus(); return false;
    } */
		
		/* if (form.sch_regDateSt.value && form.sch_regDateEn.value) {
		    if (calcDate(form.sch_regDateSt.value,form.sch_regDateEn.value) < 0) {
            alert('error Reg.Date.'); form.sch_regDateSt.focus(); return false;
        }
    } */
    form.method = 'get';
    form.submit();
}

//-->
</script>

<br>

  <form name="searchForm" >
          <input type="hidden" name="menuIdx" value="<%=menuIdx%>">
          <input type="hidden" name="sMenu" value="<%=sMenu%>">
          <input type="hidden" name="mode" value="search">
          <input type="hidden" name="listCount" value="<%=listCount%>">
          <input type="hidden" name="bMenu" value="<%=bMenu%>">
          <input type="hidden" name="mCate" value="<%=mCate%>">    
      <table  border="0" cellspacing="1" cellpadding="3" >
			  <tr>
          <td width="55" class="bold_txt" valign="top" style='padding-top:5px;'><nobr><strong>Search :</strong></nobr></td>
				  <td valign="top">
          
          
          
          <table border="0" cellspacing="1" cellpadding="3" class="table_3">
              
              <tr>
                <th width="120" >Category</th>
                <td bgcolor="#FFFFFF" style="padding:3px 20px 3px 7px;" width="200">
                <select name="sch_cate" onkeypress = "enter(event)" <%if isEmptyStr(sch_cate) then%>class="input"<%else%>class="inputins"<%end if%> style="width:150px;height:20px;">
                     <option value="">====================</option>
										 <option value="VC" <%if sch_cate="VC" then %>selected<%end if%>>VC</option>
      							 <option value="AC" <%if sch_cate="AC" then %>selected<%end if%>>AC</option>
      							 <option value="ìŠ¤íƒ€íŠ¸ì—…" <%if sch_cate="ìŠ¤íƒ€íŠ¸ì—…" then %>selected<%end if%>>ìŠ¤íƒ€íŠ¸ì—…</option>
      							 <option value="ê¸°íƒ€" <%if sch_cate="ê¸°íƒ€" then %>selected<%end if%>>ê¸°íƒ€</option>
                </select>
								
								</td>
              
                <th width="120">Email</th>
                <td bgcolor="#FFFFFF" style="padding:3px 20px 3px 7px;">
                 <input name="sch_email" type="text" onkeypress = "enter(event)" <%if isEmptyStr(sch_email) then%>class="input"<%else%>class="inputins"<%end if%> style="width:220px" value="<%=sch_email%>"> 
                </td>
                
              </tr>
              
             
          </table>    
          
          
          
          
          
          </td>
         
          <td width="100" align='center' valign="top" style='padding-top:5px;'><a href="javascript:goSearch();"><span class="buttonGreen">&nbsp;&nbsp;Search&nbsp;&nbsp;</span></a></td>
         
			  </tr>
			</table>
      </form>
      