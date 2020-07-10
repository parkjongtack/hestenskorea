/*****************************
	따라다니는 스크롤바
*****************************/

<!--
var bNetscape4plus = (navigator.appName == "Netscape" && navigator.appVersion.substring(0,1) >= "4");
var bExplorer4plus = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.substring(0,1) >= "4");

function always_pos()
{
        var yMenuFrom, yMenuTo, yButtonFrom, yButtonTo, yOffset, timeoutNextCheck;

        if ( bNetscape4plus ) { // 네츠케이프 용 설정
                yMenuFrom   = document["scrollmenu"].top;
                yMenuTo     = top.pageYOffset + 70;   // 화면 위쪽으로 부터의 위치
        }
        else if ( bExplorer4plus ) {  // 익스플로러 용 설정
                yMenuFrom   = parseInt (scrollmenu.style.top, 10);
                yMenuTo     = document.body.scrollTop + 70; // 화면 위쪽으로 부터의 위치
        }

        timeoutNextCheck = 500;

        if ( Math.abs (yButtonFrom - (yMenuTo + 152)) < 6 && yButtonTo < yButtonFrom ) {
                setTimeout ("always_pos()", timeoutNextCheck);
                return;
        }


        if ( yButtonFrom != yButtonTo ) {
                yOffset = Math.ceil( Math.abs( yButtonTo - yButtonFrom ) / 10 );
                if ( yButtonTo < yButtonFrom )
                        yOffset = -yOffset;

                if ( bNetscape4plus )
                        document["divLinkButton"].top += yOffset;
                else if ( bExplorer4plus )
                        divLinkButton.style.top = parseInt (divLinkButton.style.top, 10) + yOffset;

                timeoutNextCheck = 10;
        }
        if ( yMenuFrom != yMenuTo ) {
                yOffset = Math.ceil( Math.abs( yMenuTo - yMenuFrom ) / 20 );
                if ( yMenuTo < yMenuFrom )
                        yOffset = -yOffset;

                if ( bNetscape4plus )
                        document["scrollmenu"].top += yOffset;
                else if ( bExplorer4plus )
                        scrollmenu.style.top = parseInt (scrollmenu.style.top, 10) + yOffset;

                timeoutNextCheck = 10;
        }

        setTimeout ("always_pos()", timeoutNextCheck);
}
function OnLoad()
{
        var y;

        // 프레임 에서 벗어나게 하는 함수입니다. 프레임에 넣으려면 삭제하세요
        if ( top.frames.length )
         //       top.location.href = self.location.href;

        // 페에지 로딩시 포지션
        if ( bNetscape4plus ) {
                document["scrollmenu"].top = top.pageYOffset + 100;
                document["scrollmenu"].visibility = "visible";
        }
        else if ( bExplorer4plus ) {
                scrollmenu.style.top = document.body.scrollTop + 100;
                scrollmenu.style.visibility = "visible";
        }

        always_pos();
        return true;
}
//-->



/*****************************
	오른쪽 마우스 금지 1
*****************************/
<!--
curPage=1;
document.oncontextmenu = function(){return false}
if(document.layers) {
window.captureEvents(Event.MOUSEDOWN);
window.onmousedown = function(e){
if(e.target==document)return false;}
}
else {
document.onmousedown = function(){return false}
}
//-->


/*****************************
	main 공통
*****************************/
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

/**** select box 링크 ****/
function goURL(values) {
        var obj = values.split("|");
        if (obj[1]=="pop") {
                 window.open(obj[0],"winName","toolbar=yes, width=auto, height=auto,resize=no,scrollbar=yes");
        } else if (obj[1]=="_blank") {
                window.open(obj[0]);
        } else {
                location.href = obj[0];
        }
}


/*****************************
	faq 테이블 보여주고 숨기기
*****************************/

/*var old_menu = "";
		function menuclick(submenu)
		{
			if( old_menu != submenu ) {
			if( old_menu !="" ) {
			old_menu.style.display = "none";
			}
			submenu.style.display = "block";
			old_menu = submenu;
			} else {
			submenu.style.display = "none";
			old_menu = "";
			}
		}
		
//-->
*/

<!--
var old_menu = '';
function menuclick(submenu) {
  submenu = document.getElementById(submenu);
    if( old_menu != submenu ) {
    if( old_menu !='' ) {
        old_menu.style.display = 'none';
    }
   submenu.style.display = 'block';
   old_menu = submenu;
    } else {
        submenu.style.display = 'none';
        old_menu = '';
    }
}

//-->


