<%

Dim sch_cate,sch_email
sch_cate           = inSql(trim(request("sch_cate")))
sch_email					  = inSql(trim(request("sch_email")))

ReDim searchKeyAr(1)  ' 검색어를 배열에 담음
searchKeyAr(0) = sch_cate
searchKeyAr(1) = sch_email


Dim searchLinkString,searchAttachStr,searchLinkJoinStr,searchString

For i=0 to  Ubound(searchKeyAr)
   
    If not isEmptyStr(searchKeyAr(i)) Then
        searchAttachStr = " and "    ' 검색어가 있을 경우 쿼리문에 and 추가
        searchLinkJoinStr = "&"    ' 검색어가 있을 경우 페이지링크에 연결문자 추가
        
        Select Case i
                     
            Case 0 : searchString = searchString & searchAttachStr & "cate = N'"&searchKeyAr(i)&"'"
                     searchLinkString = searchLinkString & searchLinkJoinStr & "sch_cate="&server.URLEncode(sch_cate)&""
            Case 1 : searchString = searchString & searchAttachStr & "email like N'%"&searchKeyAr(i)&"%'"
                     searchLinkString = searchLinkString & searchLinkJoinStr & "sch_email="&server.URLEncode(sch_email)&""
        End Select
    Else
        searchAttachStr = ""     ' 연결문자 Reset
        searchLinkJoinStr = ""
    End If

Next



Dim basicSql,orderTxt

basicSql = "select * from wantNewsLetter where "


if sMenu="00" then
		basicSql = basicSql&"  actstatus='Y' "
elseif  sMenu="01" then
    basicSql = basicSql&"  actstatus='N' "
end if

orderTxt = " order by idx desc "
		
        
basicSql = basicSql & searchString&orderTxt

Dim htmlSignUpList

Dim rsCount
Dim listLoop ' 현재 페이지에서의 가져올 목록 수
Dim idxTmpNum  ' 게시물 출력 번호
Dim colspanCount
Dim fori
Dim trbg
Dim strErrMsg
Dim rsPageCount


downloadQry = basicSql
%>