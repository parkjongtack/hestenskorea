<script language="JavaScript" type="text/javascript">
<!--

function delRestroe(str,str1){
    var msg
		if(str=='Y'){
		    msg = confirm('Î≥µÍµ¨Ï†úÌïòÏãúÍ≤†ÏäµÎãàÍπå?')
		}else{
		    msg = confirm('ÏÇ≠Ï†úÌïòÏãúÍ≤†ÏäµÎãàÍπå?')
		}
		if(msg){
        document.getElementById("procFrame").src="/_mngr/active/LL/exe_delRestore.asp?targetIdx="+str+"&cate="+str1;
		}
}	
//-->
</script>

<%
Call dbConOpen()

rs.open basicSql,dbCon,1
rsCount = rs.recordcount

If pageNo=1 Then
    idxTmpNum = rsCount + 1
Else
    idxTmpNum = rsCount - ((pageNo-1)*listCount) + 1
End If

%>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
              <tr>
                <td class="padding" >
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr class="bold_txt">
                      <td height="28">
                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr class="bold_txt">
                            <td width="90" height="28">Total : <span class="red_txt"><%=formatNumber(rsCount,0)%></span></td>
                            <td width="26"  ><img src="images/menu_line01.gif" width="21" height="12"></td>
                            <td width="100"  >Page : <span class="red_txt"><%=pageNo%></span><span class="green_txt"> / <%=getRound(rsCount/listCount)%></span></td>
                            <td width="26"  ><img src="/a_admin/images/menu_line01.gif" width="21" height="12"></td>
                            <td >
                              <select name="listViewCnt" class="input" onChange="goListUp(this.value,'menuIdx=<%=menuIdx%>&sMenu=<%=sMenu%>&bMenu=<%=bMenu%>&mCate=<%=mCate%><%=searchLinkString%>');">
                                <option value="">Î™©Î°ùÏàò</option>
            										<option value="5"<% if listCount=5 then %> selected<% end if %>>5</option>
                                <option value="10"<% if listCount=10 then %> selected<% end if %>>10</option>
                                <option value="20"<% if listCount=20 then %> selected<% end if %>>20</option>
                                <option value="30"<% if listCount=30 then %> selected<% end if %>>30</option>
                                <option value="50"<% if listCount=50 then %> selected<% end if %>>50</option>
                                <option value="100"<% if listCount=100 then %> selected<% end if %>>100</option>
                              </select>
                              List<font style="font-weight:normal; font-size:8pt;"> / Page</font>
                            </td>
														<%if sMenu="00" then%>
														<td width="200">&nbsp;</td>
            								<td >&nbsp;
                             <a href="javascript:goDownLoad('/_mngr/active/LL/excel_download.asp');"><span class="buttonGreen">&nbsp;&nbsp;Search Download&nbsp;&nbsp;</span></a>
                            </td>
														<%end if%>
                        	</tr>	
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td height="5" ></td>
              </tr>
							<tr>  
								<td valign="top">
								
								  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
                    
                    <tr>
                      <td>
								
                        <table width="100%" border="0" cellspacing="1" cellpadding="3">
                          
                          <tr  height='25' align="center" class="table7" bgcolor='#EAEBE2'>
                            <td style='padding:3px;' width="50"><nobr>No.</nobr></td>
														<td style='padding:3px;'><nobr>Cate</nobr></td>
														<td style='padding:3px;'><nobr>Subject</nobr></td>
														<td style='padding:3px;'><nobr>Date</nobr></td>
														<%if adLevel=5 then%>
														<td style='padding:3px;'>				
														<%if sMenu="01" then%>
                  					<nobr>Î≥µÍµ¨</nobr>
                  					<%else%>
														<nobr>ÏÇ≠Ï†ú</nobr>
                  					<%end if%>
														</td>
														<%end if%>
                          </tr> 
													            
<%
If rsCount>0 Then  ' ∞‘Ω√π∞¿Ã ¿÷¥¬ ∞ÊøÏ...
    rs.pageSize     = listCount  ' ∆‰¿Ã¡ˆ¥Á ∞‘Ω√π∞ ºˆ (listCount = 10)
    rs.AbsolutePage = pageNo     ' «ˆ¿Á ∆‰¿Ã¡ˆ π¯»£

    ' ∑πƒ⁄µÂº¬¿« ∆‰¿Ã¡ˆ ºˆøÕ «ˆ¿Á ∆‰¿Ã¡ˆ π¯»£∞° ∞∞¿∏∏È
    if rs.PageCount = pageNo then
       ' «ˆ¿Á∆‰¿Ã¡ˆ¿« ∞‘Ω√π∞ ºˆ = ¿¸√º ∞‘Ω√π∞ ºˆ∏¶ ∆‰¿Ã¡ˆ¥Á ∞‘Ω√π∞ ºˆ∑Œ ≥™¥Æ
        listLoop = rsCount mod rs.PageSize
        if listLoop=0 then listLoop = rs.PageSize end if
    else
        listLoop  = rs.PageSize  ' π¯»£∞° ¥Ÿ∏•∞ÊøÏ 
    end if

    Dim idx,cate,email,regDate
		
		for i=1 to listLoop
        ' Eof or Bof ¿Œ ∞ÊøÏ ø°∑Ø »£√‚ -----------------------------------------
        If rs.eof=true or rs.bof=true Then
            Call dbConClose()
            Call noEntryPage()
            response.end
        End If
        
        idxTmpNum           = idxTmpNum - 1 
        
				idx									=  rs("idx")
				cate						=  rs("cate")
				email								=  outSql(rs("email"))
				regDate							=  rs("regDate")
			
				
				if i mod 2=0 then
            trbg = " style='background:#f7f7f7' "
        else
            trbg = " style='background:#FFFFFF'  "
        end if

				%>
        
                          <tr  height='25' align="center" class="table7" <%=trbg%>>
                            <td style='padding:3px;' ><nobr><%=idxTmpNum%></nobr></td>
														<td style='padding:3px;' ><nobr><%=cate%></nobr></td>
                  					<td style='padding:3px;' ><nobr><%=email%></nobr></td>
                  					<td style='padding:3px;' ><nobr><%=regDate%></nobr></td>
														<%if adLevel=5 then%>
                  					<td style='padding:3px;' ><nobr>
                  					<%if sMenu="01" then%>
                            <nobr><a href="javascript:delRestroe('<%=base64Encode(idx)%>','Y')" style='color:#8b8b8b;'>Restore</a></nobr>
                            <%else%>
                  					<nobr><a href="javascript:delRestroe('<%=base64Encode(idx)%>','N')" style='color:#8b8b8b;'>Del</a></nobr>
                            <%end if%>
                  					</nobr></td>
                  					<%end if%>
                  				</tr>	
        <%
        rs.moveNext
    next
    



End If

%>													
								        </table>
											</td>	
									  </tr>
									</table>			
												
								</td>
              </tr>
              <tr><td height="10" ></td></tr>

<%
rsPageCount = rs.PageCount
Call dbConClose()    
%>		 
            </table> 