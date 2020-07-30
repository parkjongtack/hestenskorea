<%
Dim schField,schValue,searchLinkString

schField = inSql(request("schField"))
schValue = inSql(request("schValue"))

Dim schValueTxt
Dim add_option
if not isEmptyStr(schField) and not isEmptyStr(schValue) then
    if schField<>"title" and schField<>"content" then schField="ALL"
		
		if schField="ALL" then
		    add_option = " and (title like ?  or content like ?) " 
		else
		    add_option = " and "&schField&" like ? "
		end if
		
		schValueTxt = "%"&replace(schValue," ","")&"%"
		 
		searchLinkString = "&schField="&server.URLEncode(schField)&"&schValue="&server.URLEncode(schValue)
end if


Dim viewP 
viewP	= "&perPage="&perPage&"&page="&p_size&searchLinkString		 
								 
Dim boardSql,boardCountSql 

boardSql = "select  top " & perPage & " idx,boardCate,title,content,view_date,file_or,file_sv,link_txt,b_hit,b_langCheck,file_or_list,file_sv_list from TB_board code where boardCate=N'"&nCate&"'  and (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL')  and  b_actStatus='Y'   "&add_option&"  and  "&_
           "idx not in(select  top " & ((currentPage - 1) * perPage) & " idx  from TB_board where boardCate=N'"&nCate&"' and (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL') and  b_actStatus='Y' "&add_option&"  order by view_date desc, idx desc) order by view_date desc, idx "

					 
		 

boardCountSql	= "select count(*) from TB_board "&_
                "where boardCate=N'"&nCate&"' and (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL') and  b_actStatus='Y'  "&add_option		


Dim SqlExe
Call connOpen()
    With conn
    .CommandText = boardSql
    .CommandType = adCmdText
		
		if not isEmptyStr(schField) and not isEmptyStr(schValue) then
		    if schField="ALL" then
				    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
						.Parameters.Append .CreateParameter("@sch_02", adVarWChar, adParamInput, 255, schValueTxt)
						.Parameters.Append .CreateParameter("@sch_03", adVarWChar, adParamInput, 255, schValueTxt)
						.Parameters.Append .CreateParameter("@sch_04", adVarWChar, adParamInput, 255, schValueTxt)
				else
				    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
						.Parameters.Append .CreateParameter("@sch_02", adVarWChar, adParamInput, 255, schValueTxt)
				end if
		end if 
		
		set rsExe = .Execute
    SqlExe =	GetRsArray(rsExe)
    set rsExe = Nothing
    End With
Call connClose()	


Dim totalCnt
Call connOpen()
With conn     
  	.CommandText = boardCountSql
   	.CommandType = adCmdText
		
		if not isEmptyStr(schField) and not isEmptyStr(schValue) then
		    if schField="ALL" then
				    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
						.Parameters.Append .CreateParameter("@sch_02", adVarWChar, adParamInput, 255, schValueTxt)
				else
				    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
				end if
		end if 
		
   	 set rsExe = .Execute
     totalCnt =	rsExe(0)
     set rsExe = Nothing
End With
Call connClose()		


Dim writing_count
writing_count = totalCnt						
%>

