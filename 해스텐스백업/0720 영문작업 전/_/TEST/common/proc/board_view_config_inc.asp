<%
Dim title,content,view_date,file_or,file_sv,link_txt,b_hit,b_langCheck,file_or_list,file_sv_list,boardCate
Dim file_or_sp,file_sv_sp,file_txt,file_cnt
Dim fw,fh

if isEmptyStr(idx) then
    response.redirect "/"
    response.end
end if


Dim listSqlExe
		
    Call connOpen()
        With conn
        .CommandText =  "select idx,boardCate,title,content,view_date,file_or,file_sv,link_txt,b_hit,b_langCheck,file_or_list,file_sv_list  from TB_board where idx=? "
        .CommandType = adCmdText
    		.Parameters.Append .CreateParameter("@idx", adInteger, adParamInput, 4, idx)
    		set rsExe = .Execute
        listSqlExe =	GetRsArray(rsExe)
        set rsExe = Nothing
        End With
    Call connClose()	

		
		if not isNull(listSqlExe) then
        
				idx									= listSqlExe(0,0)         
				boardCate						= listSqlExe(1,0)         
				title								= outSql(listSqlExe(2,0))         
				content							= outSql(listSqlExe(3,0))         
				view_date						= listSqlExe(4,0)
				view_Date						= replace(view_date,"-",".")         
				file_or							= listSqlExe(5,0)         
				file_sv							= listSqlExe(6,0)         
				link_txt						= outSql(listSqlExe(7,0))         
				b_hit								= listSqlExe(8,0)         
				b_langCheck					= listSqlExe(9,0)         
				
				file_or_list				= outSql(listSqlExe(10,0))         
				file_sv_list				= listSqlExe(11,0)         
				
				
				if boardCate="LETTER" then
				fw = 400
				fh = 250
				elseif boardCate="MEDIA" then
				fw = 370
				fh = 160
				elseif boardCate="VIDEO" then
				fw = 400
				fh = 250
				end if
				
								
				
				file_txt = ""
    		file_cnt = 0
				
				if not isEmptyStr(file_sv_list) then
				  
				    file_or_sp=replace(file_or_list,"||",",")
        		file_or_sp=replace(file_or_sp,"|","")
        		file_or_sp=split(file_or_sp,",")
        		
        		file_sv_sp=replace(file_sv_list,"||",",")
        		file_sv_sp=replace(file_sv_sp,"|","")
        		file_sv_sp=split(file_sv_sp,",")
						
						Dim fsObject
    				Set fsObject = CreateObject("Scripting.FileSystemObject")
		
						for i=0 to ubound(file_sv_sp)
						    if fsObject.FileExists(Request.ServerVariables("APPL_PHYSICAL_PATH")&"upload\board\"&file_sv_sp(i))=true then
        				    'file_txt = file_txt&"<div><a href='/upload/download.asp?fn="&file_sv_sp(i)&"&fd=BOARD&dd="&file_or_sp(i)&"' style='text-decoration:none;font-size:15px;color:#666666:font-size:13px;'><nobr >"&file_or_sp(i)&"</nobr></a></div>"
										file_txt = file_txt&"<div><a href='/upload/board/"&file_sv_sp(i)&"' target='_blank' style='text-decoration:none;font-size:13px;color:#666666:'><nobr >"&file_or_sp(i)&"</nobr></a></div>"
    						end if
        		next
						
						Set fsObject = Nothing
				
				end if
		
		
		end if
		
%>