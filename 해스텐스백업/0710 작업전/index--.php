<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_head.php");
?>

<script type='text/javascript'> 
var i=1 
function move(){ 
value=""+i+"" 
i=i+1 
if(i<=0){ //0은 시간 (단위: 초) 
setTimeout("move()",1000) 
}else{ 
location.href='http://www.hastenskorea.com'; 
} 
} 
</script> 
<script language="JavaScript" Event="onLoad" For="window"> 
<!-- 
move(); 
//--> 
</script> 


<?
include_once("./_tail.php");
?>
