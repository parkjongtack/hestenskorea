<%
Dim subject,fileName,fileWidth,fileHeight,thumbNail,viewNail,view_date
Dim file_or_sp,file_sv_sp,file_txt,file_cnt
Dim fw,fh

if isEmptyStr(idx) then
    response.redirect "/"
    response.end
end if


Dim listSqlExe
		
    Call connOpen()
        With conn
        .CommandText =  "select idx,subject,fileName,fileWidth,fileHeight,thumbNail,viewNail,view_date,b_langCheck  from TB_gallery where idx=? "
        .CommandType = adCmdText
    		.Parameters.Append .CreateParameter("@idx", adInteger, adParamInput, 4, idx)
    		set rsExe = .Execute
        listSqlExe =	GetRsArray(rsExe)
        set rsExe = Nothing
        End With
    Call connClose()	

		
		if not isNull(listSqlExe) then
        
				idx									= listSqlExe(0,0)         
				subject					  	= outSql(listSqlExe(1,0))         
				fileName						= listSqlExe(2,0)         
				view_date						= listSqlExe(7,0)
				view_Date						= replace(view_date,"-",".")         

		end if
		
%>