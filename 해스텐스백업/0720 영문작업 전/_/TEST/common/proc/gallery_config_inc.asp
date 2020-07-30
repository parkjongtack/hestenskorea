<%
Dim schField,schValue,searchLinkString

schField = inSql(request("schField"))
schValue = inSql(request("schValue"))

Dim schValueTxt
Dim add_option
if not isEmptyStr(schValue) then
    add_option = " and subject like ? "
		
		schValueTxt = "%"&replace(schValue," ","")&"%"
		searchLinkString = "&schValue="&server.URLEncode(schValue)
end if


Dim viewP 
viewP	= "&perPage="&perPage&"&page="&p_size&searchLinkString		 
								 
Dim boardSql,boardCountSql 

boardSql = "select  top " & perPage & " idx,subject,fileName,fileWidth,fileHeight,thumbNail,viewNail,view_date,b_langCheck from TB_gallery code where (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL')  and  actResult = 0   "&add_option&"  and  "&_
           "idx not in(select  top " & ((currentPage - 1) * perPage) & " idx  from TB_gallery where (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL') and  actResult = 0 "&add_option&"  order by view_date desc, idx desc) order by view_date desc, idx "


boardCountSql	= "select count(*) from TB_gallery "&_
                "where (b_langCheck=N'"&nLang&"' or b_langCheck=N'ALL') and  actResult = 0  "&add_option		

					



								
Dim SqlExe
Call connOpen()
    With conn
    .CommandText = boardSql
    .CommandType = adCmdText
		
		if not isEmptyStr(schValue) then
		    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
				.Parameters.Append .CreateParameter("@sch_02", adVarWChar, adParamInput, 255, schValueTxt)
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
		    .Parameters.Append .CreateParameter("@sch_01", adVarWChar, adParamInput, 255, schValueTxt)
		end if 
		
   	 set rsExe = .Execute
     totalCnt =	rsExe(0)
     set rsExe = Nothing
End With
Call connClose()		


Dim writing_count
writing_count = totalCnt					

	
%>