<% @LANGUAGE='VBSCRIPT' CODEPAGE='65001' %>
<%
Option Explicit
Response.CharSet = "utf-8"
%>
<object Runat="Server" Progid="ADODB.Connection" id="dbCon"></object>
<object Runat="Server" Progid="ADODB.RecordSet" id="rs"></object>
<!-- #include virtual="/common/inc/noCache.asp" -->
<!-- #include virtual="/_mngr/_inc/func.asp" -->
<!-- #include virtual="/common/inc/base64.asp" -->
<!-- #include virtual="/common/inc/dbCon.asp" -->
<!-- #include virtual="/_mngr/_inc/ad_config_inc.asp" -->
<%
Call isAdminChk_iframe(5)

Dim boardCate,m_idx
boardCate   = request("boardCate")
m_idx					= base64Decode(request("m_idx"))


Dim idx,title,content,view_date,file_or,file_sv,link_txt,b_hit,b_langCheck,file_or_list,file_sv_list
Dim file_or_sp,file_sv_sp,file_txt,file_cnt,file_txt_01,sY,sM,sD



Dim fsObject

if not isEmptyStr(m_idx) then
    
		Dim listSqlExe
		
    Call connOpen()
        With conn
        .CommandText =  "select idx,boardCate,title,content,view_date,file_or,file_sv,link_txt,b_hit,b_langCheck,file_or_list,file_sv_list  from TB_board where idx=? "
        .CommandType = adCmdText
    		.Parameters.Append .CreateParameter("@idx", adInteger, adParamInput, 4, m_idx)
    		set rsExe = .Execute
        listSqlExe =	GetRsArray(rsExe)
        set rsExe = Nothing
        End With
    Call connClose()	

		
		if isNull(listSqlExe) then
        m_idx = ""
    else
        
				idx									= listSqlExe(0,0)         
				boardCate						= listSqlExe(1,0)         
				title								= outSql(listSqlExe(2,0))         
				content							= outSql(listSqlExe(3,0))         
				view_date						= listSqlExe(4,0)         
				file_or							= listSqlExe(5,0)         
				file_sv							= listSqlExe(6,0)         
				link_txt						= outSql(listSqlExe(7,0))         
				b_hit								= listSqlExe(8,0)         
				b_langCheck					= listSqlExe(9,0)         
				
				file_or_list				= outSql(listSqlExe(10,0))         
				file_sv_list				= listSqlExe(11,0)         
				
				
				file_txt = ""
    		file_txt_01 = ""
				
				
				if not isEmptyStr(file_sv) then
				     
    				 Set fsObject = CreateObject("Scripting.FileSystemObject")
						 
						 if fsObject.FileExists(Request.ServerVariables("APPL_PHYSICAL_PATH")&"upload\board\"&file_sv)=true then
    		     file_txt_01 = file_txt_01&_
						               "<div style='padding:8px 5px;font-size:18px;'>"&_
													 "<div style='float:left;padding-right:20px;'><a href='/upload/abstract/"&file_sv&"' style='text-decoration:none;' target='_blank'>"&file_or&"</a></div>"&_
													 "<div style='float:left;background:#f7941d; text-align:center; font-weight:400; width:50px; height:20px; cursor:pointer; color:#fff; font-size:13px; line-height:20px; border-radius:3px' onClick=""thum_delFile('"&file_sv+"','"+file_or+"','bbsForm','jpg|gif|jpeg|png|bmp','bbsBtn','id_01','id_02','id_03','id_04','id_05','id_06','file_sv','file_or','board','Y');"">Delete</div>"&_
													 "</div>"
						 end if							 
													 
						 Set fsObject = Nothing							 
        end if
				
				
				
				if not isEmptyStr(file_sv_list) then
				  
				    file_or_sp=replace(file_or_list,"||",",")
        		file_or_sp=replace(file_or_sp,"|","")
        		file_or_sp=split(file_or_sp,",")
        		
        		file_sv_sp=replace(file_sv_list,"||",",")
        		file_sv_sp=replace(file_sv_sp,"|","")
        		file_sv_sp=split(file_sv_sp,",")
						
						
						

    				Set fsObject = CreateObject("Scripting.FileSystemObject")
		
						for i=0 to ubound(file_sv_sp)
						
						    if fsObject.FileExists(Request.ServerVariables("APPL_PHYSICAL_PATH")&"upload\board\"&file_sv_sp(i))=true then
        				    
										file_txt = file_txt&_
										"<div style='padding:5px;'>"&_			
              			"<div style='float:left;padding-right:20px;'><a href='/upload/board/"&file_sv_sp(i)&"' target='_blank' style='text-decoration:none;'>"&file_or_sp(i)&"</a></div>"&_
              			"<!--<div style='float:left;padding-right:20px;'><a href='/upload/download.html?fn="&file_sv_sp(i)&"&fd=board&dd="&file_or_sp(i)&"' style='text-decoration:none;'>"&file_or_sp(i)&"</a></div>-->"&_
              			"<div style='float:left;background:#f7941d; text-align:center; font-weight:400; width:50px; height:20px; cursor:pointer; color:#fff; font-size:13px; line-height:20px; border-radius:3px' onClick=""delFile('"&file_sv_sp(i)&"','"&file_or_sp(i)&"');"">Delete</div>"&_
              			"</div>"&_
              			"<div style='clear:both;'></div>"
										
    						end if
        		next
						
						Set fsObject = Nothing
				
				end if
		
		
		end if
end if





if not isEmptyStr(view_date) then
    sY = split(view_date,"-")(0)
		sM = split(view_date,"-")(1)
		sD = split(view_date,"-")(2)
else	
    sY  = Year(now)
		sM	= calc(Month(now),2)
		sD	= calc(day(now),2)
end if
%>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/_mngr/_css/style_pop.css" rel="stylesheet" type="text/css">
<link href="/_mngr/_css/buttonStyle.css" rel="stylesheet" type="text/css">
<script src="/common/js/jquery-2.1.3.min.js"></script>
<script src="/common/js/availableChk.js"></script>
<script src="/_mngr/_js/bd.js"></script>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/_mngr/_css/style_pop.css" rel="stylesheet" type="text/css">
<link href="/_mngr/_css/buttonStyle.css" rel="stylesheet" type="text/css">
<script src="/_includes/js/jquery-2.1.3.min.js"></script>
<script src="/_mngr/_js/availableChk.js"></script>
<script src="/_mngr/_js/bd.js"></script>
<script type="text/javascript" src="/editor/ckeditor.js"></script>


									 <script>
									 $(function(){
                        CKEDITOR.replace('content', {"width":"97%","height":"200px"});
                   });
									 
									 
									 </script>
									 <form name="bbsForm"  id="bbsForm" enctype="multipart/form-data" method="post" >
									 <input type='hidden' name="boardCate" value="<%=boardCate%>">
									 <input type='hidden' name="m_idx" value="<%=m_idx%>">
									 
  								 <input type="hidden" name="file_sv"  id="file_sv" value="<%=file_sv%>">
		    					 <input type="hidden" name="file_or"  id="file_or" value="<%=file_or%>">
									 
									 
									 <input type="hidden" name="file_sv_list"  id="file_sv_list" value="<%=file_sv_list%>">
		    					 <input type="hidden" name="file_or_list"  id="file_or_list" value="<%=file_or_list%>">
									 
									 <input type="hidden" name="del_sv"  id="del_sv">
									 
									 <body style="margin:0;padding:0;">
									 <table border="0" width="100%"  cellpadding="0" cellspacing="1" bgcolor="#999999">
                    <tr>
                      <td>
											
                        <table width="100%"  border="0" cellspacing="1" cellpadding="3">
                          <tr  align="center" class="table7" >
                            <td width="120" bgcolor='#EAEBE2'><nobr>제목</nobr></td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left;'  colspan="3"><input type="text" name="title" id="title" value="<%=title%>" maxlength="500"  style="border:solid 1px #ccc;width:97%;height:25px;"></td>
													</tr>
													
													
													
													<tr  align="center" class="table7" <%IF boardCate="NEWS" THEN%>style='display:none;'<%END IF%>>	
													  <td  bgcolor='#EAEBE2'><nobr>섬네일 이미지</nobr><div style='color:red;'>
														<%if boardCate="LETTER" then%>
														400 * 250
														<%elseif boardCate="MEDIA" then%>
														370 * 160
														<%elseif boardCate="VIDEO" then%>
														400 * 250
														<%end if%>
														</div>
														</td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left;' colspan="3">
														  
															<table border="0" cellspacing="0" cellpadding="0" >
                              <tr>
                                <td valign="top" style='border:0px solid #FFFFFF;padding:0px;'>
                        				<div style='border:1px solid #cccccc;font-size:13px;width:400px;height:30px;text-align:left;overflow:auto;' >
                                  	  <div id="id_05" align='center' style='display:none;'>
                                    		  <div style='text-align:center;' ><img src='/_images/smallLoading.gif'></div>
                               				</div>
                               				<div id='id_03' <%if isEmptyStr(file_txt_01) then%>style='display:none;'<%end if%>><%=file_txt_01%></div>
                             				</div>
                        				
                        				</td>
              									
                                <td width="200" style='line-height:50px;border:0px solid #FFFFFF;' align="cetner">
                        				<div style='display:none;' id="id_06">
																		<input type="file" name="id_01" id="id_01" onChange="thum_fileFun('bbsForm','jpg|gif|jpeg|png|bmp','bbsBtn','id_01','id_02','id_03','id_04','id_05','id_06','file_sv','file_or','board','Y')" accept="image/*" >
																		</div>
                              			<div id="id_02" >
                                			<div id="upFileBtn1" style='width:80px; margin:0 auto; height:20px; cursor:pointer;  line-height:20px; background:#3399ff; color:#fff; font-weight:500;  padding:1px; text-align:center;'  onclick="if($('#id_01')){$('#id_01').click();}">Upload</div>
                               			</div>
                               			<div id="id_04" style='display:none;'>
                               			  
                               			</div>
                        				
                        				</td>
                              </tr>
                        		 </table>
														 
														 
																		
														</td>
													</tr>
													
													<tr  align="center" class="table7" <%IF boardCate="NEWS" or boardCate="LETTER"  THEN%>style='display:none;'<%END IF%> >	
													  <td  bgcolor='#EAEBE2'><nobr><%if boardCate="MEDIA" then%>URL<%else%>유투브 Code<%end if%></nobr></td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left;' colspan="3"><input type="text" name="link_txt" id="link_txt" placeholder="<%if boardCate="MEDIA" then%>http://<%else%>코드값만<%end if%>"  value="<%=link_txt%>" style="border:solid 1px #ccc;width:97%;height:25px;"></td>
													</tr>
													
													<tr  align="center" class="table7" >	
													  <td  bgcolor='#EAEBE2'><nobr><%if boardCate="MEDIA" then%>보도 날짜<%else%>작성일<%end if%></nobr></td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left;'  >
														<input type="text" name="sY" id="sY" value="<%=sY%>" maxlength="4"  style="border:solid 1px #ccc;width:60px;height:25px;" onkeydown='onlynumberic(this);' onkeyup='onlynumberic(this);' onblur='onlynumberic(this);'> /
														<input type="text" name="sM" id="sM" value="<%=sM%>" maxlength="2"  style="border:solid 1px #ccc;width:30px;height:25px;" onkeydown='onlynumberic(this);' onkeyup='onlynumberic(this);' onblur='onlynumberic(this);'> /
														<input type="text" name="sD" id="sD" value="<%=sD%>" maxlength="2"  style="border:solid 1px #ccc;width:30px;height:25px;" onkeydown='onlynumberic(this);' onkeyup='onlynumberic(this);' onblur='onlynumberic(this);'> &nbsp;&nbsp;YYYY/MM/DD
														
														</td>
														
														<td  bgcolor='#EAEBE2'><nobr> 언어</nobr></td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left; width="150"'>
														    <select name="b_langCheck" id="b_langCheck" style="border:solid 1px #ccc;height:25px;">
																<option value="">=========</option>
																<option value="ALL" <%if b_langCheck="ALL" then%>selected<%end if%>>ALL</option>
																<option value="KOR" <%if b_langCheck="KOR" then%>selected<%end if%>>Korean</option>
																<option value="ENG" <%if b_langCheck="ENG" then%>selected<%end if%>>English</option>
																</select>
														</td>	
													</tr>
													
													
													<tr  align="center" class="table7" <%IF boardCate="VIDEO" THEN%>style='display:none;'<%END IF%>>	
													  <td  bgcolor='#EAEBE2'><nobr><%if boardCate="MEDIA" then%>요약<%else%>내용<%end if%></nobr></td>
                            <td bgcolor='#FFFFFF'  colspan="3"><textarea name="content"  id="content" style='display:none;'><%=content%></textarea></td>
													</tr>	
													
													
													<tr height='25' align="center" class="table7" style='display:none;'>	
													  <td bgcolor='#EAEBE2'><nobr>File</nobr></td>
                            <td bgcolor='#FFFFFF' style='padding:10px;text-align:left;' colspan="3">
															 <table border="0" cellspacing="0" cellpadding="0" >
                              <tr>
                                <td valign="top" style='border:0px solid #FFFFFF;padding:0px;'>
                        				<div style='border:1px solid #cccccc;font-size:13px;width:400px;height:80px;text-align:left;overflow:auto;' >
                          				<div id="lodingDiv_file" align='center' style='display:none;'>
                          				 
                                    <div style='text-align:center;' ><img src='/_images/smallLoading.gif' ></div>
                                  
                          				</div>
                          				<div id='viewFileDiv' <%if isEmptyStr(file_txt) then%>style='display:none;'<%end if%>><%=file_txt%></div>
                        				</div>
                        				
                        				</td>
              									
                                <td width="200" style='line-height:50px;padding:30px 0px 30px 0px;border:0px solid #FFFFFF;' align="cetner">
                        				<div style='display:none;' id="fileDiv"><input type="file" name="upFile" id="upFileBtn" onChange="fileFun()" ></div>
                        				<div id="upBtn" >
                        				<div  style='width:80px; margin:0 auto; height:20px; cursor:pointer;  line-height:20px; background:#3399ff; color:#fff; font-weight:500;  padding:1px; text-align:center;' onclick="if($('#upFileBtn')){$('#upFileBtn').click();}">Upload</div>
                        				</div>
                        				
                        				<div id="lodingDiv" align='center' style='display:none;'>
                        				 
                                  <div style='text-align:center;' ><img src='/_images/smallLoading.gif' ></div>
                                 
                        				</div>
                        				
                        				</td>
                              </tr>
                        		 </table>
              							 
									
														
														</td>
													</tr>	
													
												</table>	
											
											</td>
										</tr>
									 </table>	
									 </form>
									<div>&nbsp;</div>
									<div id="bbsBtn" style='margin:0 auto; width:100px;cursor:pointer;padding:5px; border:0px solid #ccc; font-size:13px;color:#fff; background:#3399ff; text-align:center;' onclick="goBD()"><strong>SAVE</strong></div>
									
									<iframe name="board_procFrame_file" id="board_procFrame_file" style="display:none;width:0px;" ></iframe> 

									
