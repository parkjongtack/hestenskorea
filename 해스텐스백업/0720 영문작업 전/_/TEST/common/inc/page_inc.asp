<%
Dim  b_amt,page
b_amt = inSql(request("b_amt"))

if isEmptyStr(b_amt) then
    b_amt = inSql(request("perPage"))
end if

if nCate ="LETTER" or nCate ="VIDEO" or nCate ="GALLERY"  then
    b_amt = 9
elseif 	nCate ="MEDIA" then	
    b_amt = 6		
else
    b_amt = 10
end if


page  = inSql(request("page"))

if b_amt = "" then b_amt = 10
if page =""   then page = 1
b_amt = cint(b_amt)
page  = cint(page)


Dim perPage,p_size,currentPage

perPage = b_amt	

p_size = 10
currentPage = page




function pageUtil(perPage, p_size, writing_count, currentPage, goUrl)
    perPage = cint(perPage)
		p_size = cint(p_size)
		currentPage = cint(currentPage)
		writing_count = cint(writing_count)
		
		
		
		Dim getPage_Start,getPage_Count,getPage_End
		'getPage_Start = cint(((cint(cint(currentPage - 1) / p_size)) * p_size) + 1)
		getPage_Start = (((fix((currentPage - 1) / p_size)) * p_size) + 1)
		getPage_Count = cint(fix(cint(writing_count - 1) / perPage) + 1)
		
		
		if (getPage_Start + p_size - 1)<getPage_Count then
		    getPage_End = (getPage_Start + p_size - 1)
		else
		    getPage_End = getPage_Count
		end if
		
		if getPage_End > getPage_Count then
			  getPage_End = getPage_Count
		end if
		
		Dim imgBtnFst,imgBtnPrv
		if  cint(currentPage)<=1 then
		    'imgBtnFst = "<img src='/_images/prev_btn_2.gif' align='absmiddle' style='filter:gray();'>"
        'imgBtnPrv = "<img src='/_images/prev_btn_1.gif' align='absmiddle' style='filter:gray();'>"
		else
		    'imgBtnFst = "<a href='"&goUrl&"&perPage="&perPage&"&page=1'><img src='/_images/prev_btn_2.gif' align='absmiddle' border='0'></a>"
        imgBtnPrv = "<a class='first btn'  href='"&goUrl&"&perPage="&perPage&"&page="&(cint(currentPage)-1)&"'><img src='img/paging_prev.png' alt=''></a>"
		end if 


		Dim imgBtnNxt,imgBtnEnd
		if cint(currentPage)>=getPage_Count then
        'imgBtnNxt = "<img src='/_images/next_btn_1.gif' align='absmiddle' border='0' style='filter:gray();'>"
        'imgBtnEnd = "<img src='/_images/next_btn_2.gif' align='absmiddle' border='0' style='filter:gray();'>"
    else
        imgBtnNxt = "<a class='last btn' href='"&goUrl&"&perPage="&perPage&"&page="&(cint(currentPage)+1)&"'><img src='img/paging_next.png' alt=''></a>"
        'imgBtnEnd = "<a href='"&goUrl&"&perPage="&perPage&"&page="&getPage_Count&"'><img src='/_images/next_btn_2.gif' align='absmiddle' border='0'></a>"
    end if
		
		
		Dim htmlPageNumbering
		htmlPageNumbering ="<div class='paging'>"&imgBtnPrv
										
    
    Dim forI,tmpBlink
		
		for forI=getPage_Start to getPage_End
  			if currentPage = forI then
			      htmlPageNumbering = htmlPageNumbering &"<a class='on br_1' href='#none'>"&forI&"</a>"
			  else
				    htmlPageNumbering = htmlPageNumbering &"<a class=''  href='"&goUrl&"&perPage="&perPage&"&page="&forI&"' class='off'>"&forI&"</a>"
			  end if
						
		next
		
		htmlPageNumbering = htmlPageNumbering&imgBtnNxt&"</div>"
    
		pageUtil=htmlPageNumbering

end function







%>