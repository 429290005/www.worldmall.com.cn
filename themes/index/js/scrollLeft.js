var MySpeed =20;
var MyMar;
var MyDirection=1
var scroll_div=document.getElementById("scroll_div")
var scroll_end=document.getElementById("scroll_end")
var scroll_begin=document.getElementById("scroll_begin")
scroll_end.innerHTML = scroll_begin.innerHTML;

function Marquee_left() {
	if (scroll_end.offsetWidth - scroll_div.scrollLeft <= 0)
	
		scroll_div.scrollLeft -= scroll_begin.offsetWidth
	else {
		scroll_div.scrollLeft++;
	}
}


function Marquee_right() {
	if (scroll_div.scrollLeft <= 0)
		scroll_div.scrollLeft += scroll_begin.offsetWidth
	else {
		scroll_div.scrollLeft--;
	}
	
}
function Marquee_start(fx)
{
	clearInterval(MyMar);
	MyDirection=fx
	if (fx==1)
	{
		MyMar = setInterval(Marquee_left, MySpeed);
		
	}
	
	else
	{
	MyMar = setInterval(Marquee_right, MySpeed);
	
	}
}
    Marquee_start(MyDirection)
	


/*鼠标经过时，停止和继续运行*/
scroll_div.onmouseover = function() 
   {
	clearInterval(MyMar);
   }

scroll_div.onmouseout = function() {
   Marquee_start(MyDirection);
}