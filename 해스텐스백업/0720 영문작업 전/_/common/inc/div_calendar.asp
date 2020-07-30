<% Option Explicit %>
<!-- #include virtual="/common/inc/func.asp" -->
<%
' ##############################################################################
' 달력
' 초록, 등록, 숙박, 관광 날짜 입력
' 작성일 : 2007. 11. 16
' ##############################################################################
Dim reField : reField = request("reField") ' 반환되어질 필드명
Dim chkType : chkType = request("chkType") ' 달력이 사용될 구분값(관리자페이지, 숙박, 관광 등)

' 언어 -------------------------------------------------------------------------
Dim LNG : LNG = Ucase(Trim(request("LNG")))
if isEmptyStr(LNG) then
	  LNG = "EN"
end if
' ------------------------------------------------------------------------------


' ------------------------------------------------------------------------------
Const LimitDateStart = "2018-05-01"  ' 예약가능 시작일
Const LimitDateEnd	 = "2018-05-31"  ' 예약가능 종료일

Dim calMode ' 선택할 수 있는 날짜를 제한할지 구분
calMode = Lcase(Trim(request("calMode")))  ' LIMIT
' ------------------------------------------------------------------------------


' ------------------------------------------------------------------------------
Dim getDate
getDate = request("movedate")
' 반환되는 날짜가 유효하지 않을경우 오늘날짜로 지정
if not isDate(getDate) then
    if calMode="limit" and isDate(LimitDateStart) then
			  getDate = Left(LimitDateStart,8) & Day(now)  ' 오늘 날짜 박스 선택 표시
				if not isDate(getDate) then
            getDate = LimitDateStart
        end if
		else
				getDate = Date
		end if
end if
' ------------------------------------------------------------------------------
'if isTestAdmin() then
'    echobr getDate
'    'response.end
'end if

Dim DD,MM,YY
DD = Day(getDate)
MM = Month(getDate)
YY = Year(getDate)

Dim startMonthDay   ' 해당월의 첫 날짜를 지정
startMonthDay = YY & "-" & MM & "-01"

Dim endMonthDate, endMonthDay   ' 해당월의 마지막 날짜를 지정
endMonthDate = dateAdd("d",-1,dateAdd("m",1, startMonthDay)) 
endMonthDay  = day(endMonthDate)

Dim startWeekDay   ' 해당월의 첫 시작요일을 구함
startWeekDay = weekDay(startMonthDay)

Dim nextStartWeek  ' 다음달의 첫 시작요일을 구함
nextStartWeek = weekDay(Dateadd("d",1,endMonthDate))

Dim prevMonthDay, nextMonthDay
prevMonthDay = dateAdd("m",-1,getDate)  ' 이전달
nextMonthDay = dateAdd("m",1,getDate)   ' 다음달
%>

<style type="text/css">
#calendar{
	width:200px;
	background:#FFF;
	font-family:Arial, Helvetica, sans-serif;
	border:4px solid #2f4078;
	}


#calendar:after{
  content:'';
  display:block;
  clear:both;
}



	
#calendar ul{
	margin:0;
	padding:0;
	}

#calendar li{
	list-style:none;
	}	

#calendar li.c_prev{
	float:left;
	width:50px;
	border:0px solid #ccc;
	font-size:16px;
	text-align:center;
	padding-top:25px;
	padding-left:10px;
	}
	
#calendar li.c_date{
	float:left;
	width:74px;
	height:50px;
	font-size:26px;
	text-align:center;
	font-weight:bold;
	margin-top:25px;
	margin-bottom:0px;
	}

#calendar li.c_next{
	float:left;
	width:50px;
	font-size:16px;
	text-align:center;
	padding-top:25px;
	padding-right:0px;
	}
#c_date2{
		clear:both;
		width:200px;
		
		}

#c_date2 ul{
			margin-top:10px;
			margin:0 auto;
			}

#c_date2 li.d_bg{
			
			background:#efefef;
			width:184px;
			margin:0 auto;
			
			padding:0px;
			}
			
#c_date2 li.d_bg:after{
  content:'';
  display:block;
  clear:both;
}

			
#c_date2 li.d_bg ul li{
						width:22px;
						height:22px;
						background:#FFF;
						margin:2px;
						text-align:center;
						font-size:11px;
						line-height:20px;
						float:left;
						}

.txt_2015{
		font-size:16px;
    padding-top:10px;
		line-height:12px;
		display:block;
		}
			

</style> 

<div id="custom-content" class="white-popup-block" style="max-width:210px; margin-top:50px; background:#FFFFFF; margin: 20% auto;">
<!-- �뙘�뾽李� �쐞移� margin�쑝濡� �닔�젙�븯湲� -->
    <style>
    #custom-content img {max-width: 100%;margin-bottom: 10px;}
    </style>
   <div><p class='sub_title_red2' style='color:#333333; font-size:30PX; font-weight:bold; height:40px'></p>
       <p class='sub_m_txt'>
       <div id="calendar">
  
	<ul>
    <li class="c_prev">&nbsp;</li>
    <li class="c_date"><ul><li><%=MM%>&nbsp;&nbsp;&nbsp;<span class="txt_2016"><%=YY%></span></li></ul></li>
    <li class="c_next">&nbsp;</li>
  </ul>
  <ul id="c_date2">
  	<li class="d_bg">
		  <ul>
  		  <li><font color="red"><% if LNG="KR" then %>�씪<% else %>S<font style="font-size:8pt;">u</font><% end if %></font></li>
        <li><% if LNG="KR" then %>�썡<% else %>M<font style="font-size:8pt;">o</font><% end if %></li>
        <li><% if LNG="KR" then %>�솕<% else %>T<font style="font-size:8pt;">u</font><% end if %></li>
        <li><% if LNG="KR" then %>�닔<% else %>W<font style="font-size:8pt;">e</font><% end if %></li>
        <li><% if LNG="KR" then %>紐�<% else %>T<font style="font-size:8pt;">h</font><% end if %></li>
        <li><% if LNG="KR" then %>湲�<% else %>F<font style="font-size:8pt;">r</font><% end if %></li>
        <li><font color="blue"><% if LNG="KR" then %>�넗<% else %>S<font style="font-size:8pt;">a</font><% end if %></font></li>
			</ul>
      <%
        response.write "<ul>"
        
        ' 시작 행 공란 채움 ----------------------------------------------------
        for i=1 to startWeekDay-1
            response.write "<li>&nbsp;</li>"
        next
        ' ----------------------------------------------------------------------
        
        
        ' 날짜 출력 ------------------------------------------------------------
        Dim tdColor, dayColor, onTdColor, dayStyle, onOffMouse
        for i=1 to endMonthDay
            if (i+startWeekDay-1) mod 7 = 0 then  ' 토요일
                tdColor   = "#FFFFFF"
                dayColor  = "#0033FF"
                onTdColor = "#ECF7FF"
            elseif (i+startWeekDay-1) mod 7 = 1 then   ' 일요일
                tdColor   = "#FFFFFF"
                dayColor  = "#ff0033"
                onTdColor = "#FFE6FD"
            else
                tdColor   = "#FFFFFF"
                dayColor  = "#333333"
                onTdColor = "#EFEFEF"
            end if
            
            if i=DD then  ' 오늘일자 인경우 TD 색 지정
                if (i+startWeekDay-1) mod 7 = 0 then  ' 토요일
                    'tdColor   = "#ECF7FF"
										tdColor = "#FFFFFF"
                elseif (i+startWeekDay-1) mod 7 = 1 then   ' 일요일
                    'tdColor   = "#FFE6FD"
										tdColor = "#FFFFFF"
                else
                    'tdColor   = "#EFEFEF"
										tdColor   = "#FFFFFF"
                    dayColor  = "#333333"
                    onTdColor = "#EFEFEF"
                end if
            end if
            		
            dayStyle   = "font-family:Arial,Gulim,Dotum,sans-serif; font-size: 9pt; color:000000; text-decoration: none; line-height: 1.6;background-color:"&tdColor&"; color:"&dayColor&";"
            onOffMouse = "font-family:Arial,Gulim,Dotum,sans-serif; font-size: 9pt; color:000000; text-decoration: none; line-height: 1.6;onMouseOver=""this.style.backgroundColor='"&onTdColor&"'"" onMouseOut=""this.style.backgroundColor='"&tdColor&"'"""
            
						if calMode="limit" then ' 날짜 제한 있을 경우
    						Dim newDate
    						newDate = CDate(YY&"-"&calc(MM,2)&"-"&calc(i,2))
    
    						if Datediff("D",LimitDateStart,newDate)>=0 and Datediff("D",LimitDateEnd,newDate)<=0 then
                	  response.write "<li style="""&dayStyle&"; cursor:pointer;"" "&onOffMouse&" align=""center"" onClick=""inDate('"&calc(i,2)&"','"&calc(MM,2)&"','"&YY&"','"&reField&"');"">"&i&"</li>"
                else
    								response.write "<li style="""&dayStyle&"; color:#999999; background-image: url(/images/x-line.gif); background-repeat: no-repeat; background-position: center center;"" "&onOffMouse&" align=""center"">"&i&"</li>"
    						end if
						else
								response.write "<li style="""&dayStyle&"; cursor:pointer;"" "&onOffMouse&" align=""center"" onClick=""inDate('"&calc(i,2)&"','"&calc(MM,2)&"','"&YY&"','"&reField&"');"">"&i&"</li>"
						end if
						
						if (i+startWeekDay-1) mod 7 = 0 and endMonthDay>i then
                response.write "</ul><ul>"
            end if
        next
        ' ----------------------------------------------------------------------
        
        
        ' 마지막 행 공란 채움 --------------------------------------------------
        if nextStartWeek>1 then
            for i=0 to 7-nextStartWeek
                response.write "<li bgcolor=""#FFFFFF"" style="""&dayStyle&"""; ></li>"
            next
        end if
        ' ----------------------------------------------------------------------
        
        response.write "</ul>"
        %>
				
				
						 
						 
     </li>
	</ul>
	<ul>
    <li>&nbsp;</li>
  </ul>
	
</div>
       </p>
    </div>
    <p>&nbsp;</p>

        
</div>






