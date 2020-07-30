<table  border="0" cellpadding="0" cellspacing="5" >
  <tr>
    <td>
     <div onClick="location.href='?mCate=<%=mCate%>&bMenu=<%=bMenu%>&menuIdx=<%=menuIdx%>&sMenu=00';"  style='width:140px;cursor:pointer;padding:5px; border:0px solid #ccc; font-size:13px;color:#fff; background:#<%if sMenu="00" then%>ff6600<%else%>c0c0c0<%end if%>; text-align:center;' "><strong>게시 중  항목</strong></div>
    </td>
		<td width="20">&nbsp;</td>
    <td>
     <div onClick="location.href='?mCate=<%=mCate%>&bMenu=<%=bMenu%>&menuIdx=<%=menuIdx%>&sMenu=01';" style='width:140px;cursor:pointer;padding:5px; border:0px solid #ccc; font-size:13px;color:#fff; background:#<%if sMenu="01" then%>ff6600<%else%>c0c0c0<%end if%>; text-align:center;' "><strong>삭제 된 항목</strong></div>
    </td>
   
  </tr>
  <tr><td colspan='5' height='10'></td></tr>
</table>