<%

Dim sch_cate,sch_email
sch_cate           = inSql(trim(request("sch_cate")))
sch_email					  = inSql(trim(request("sch_email")))

ReDim searchKeyAr(1)  ' �˻�� �迭�� ����
searchKeyAr(0) = sch_cate
searchKeyAr(1) = sch_email


Dim searchLinkString,searchAttachStr,searchLinkJoinStr,searchString

For i=0 to  Ubound(searchKeyAr)
   
    If not isEmptyStr(searchKeyAr(i)) Then
        searchAttachStr = " and "    ' �˻�� ���� ��� �������� and �߰�
        searchLinkJoinStr = "&"    ' �˻�� ���� ��� ��������ũ�� ���Ṯ�� �߰�
        
        Select Case i
                     
            Case 0 : searchString = searchString & searchAttachStr & "cate = N'"&searchKeyAr(i)&"'"
                     searchLinkString = searchLinkString & searchLinkJoinStr & "sch_cate="&server.URLEncode(sch_cate)&""
            Case 1 : searchString = searchString & searchAttachStr & "email like N'%"&searchKeyAr(i)&"%'"
                     searchLinkString = searchLinkString & searchLinkJoinStr & "sch_email="&server.URLEncode(sch_email)&""
        End Select
    Else
        searchAttachStr = ""     ' ���Ṯ�� Reset
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
Dim listLoop ' ���� ������������ ������ ��� ��
Dim idxTmpNum  ' �Խù� ��� ��ȣ
Dim colspanCount
Dim fori
Dim trbg
Dim strErrMsg
Dim rsPageCount


downloadQry = basicSql
%>