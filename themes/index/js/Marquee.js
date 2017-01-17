// JScript 文件


	//id为CSS名,direction: 1向上,2向下,3向左,4向右  size:尺寸
	function jMarquee(id,direction,size,speed)
	{
		
		if(direction<3)
		{
			MarqueeV(id,direction,size,speed)
		}
		else
		{
			MarqueeH(id,direction,size,speed)
		}
	}
	
	function MarqueeH(id,direction,size,speed)
	{
		var _size=size;
		var wrap="wrap"+GetRandomNum(100,999);//包裹DIV,用随机数生成,确保不冲突
		var copy="copy"+GetRandomNum(100,999); //复制DIV,用随机数生成,确保不冲突	
		var mar="mar"+GetRandomNum(100,999); //复制DIV,用随机数生成,确保不冲突	
		var _temp=$("."+id);		
		_temp.wrap("<div class='"+wrap+"'><table><tr><td class='"+mar+"'></td></tr></table></div>"); //用大的DVI包裹目标
		_mar=$("."+mar);
		
		_mar.after("<td class='"+copy+"'></td>");  //在目标结尾添加复制DIV	
		
		var _copy=$("."+copy);
		_copy.html(_mar.html());   //复制内容
		
		var _wrap=$("."+wrap);		
		_wrap.css("overflow","hidden"); 
		
		
		var _copyDom=$("."+copy)[0];  //获取dom对象
		var _wrapDom=$("."+wrap)[0];  //获取dom对象
		var _marDom=$("."+mar)[0]; //获取dom对象
		
		switch(direction)
		{			
			case 3:				
				_wrap.css("width",_size+"px");
				break;
			case 4:
				_wrapDom.scrollLeft=_wrapDom.scrollWidth;
				_wrap.css("width",_size+"px");
				break;
			default :return ;break;
		}
		
		var start=function(){
				var _offset; var _scroll; 
				switch(direction)
				{
					case 3:						
							_scroll=_wrapDom.scrollLeft;						
							_offset=_copyDom.offsetWidth;							
							//alert(_wrapDom.innerHTML);
							if(_offset>_scroll)
							{
								_wrapDom.scrollLeft++;
							}
							else
							{
								_wrapDom.scrollLeft-=_marDom.offsetWidth
							}
							break;
					case 4:
						    _scroll=_wrapDom.scrollLeft;						
							_offset=_copyDom.scrollWidth;							
							//alert(_scroll+","+_offset);
							if(_scroll<=0)
							{
								_wrapDom.scrollLeft+=_copyDom.offsetWidth;
							}
							else
							{
								_wrapDom.scrollLeft--;
							}
							break;
				}
		};		
		
		//start();
		var timer=setInterval(start,speed);
		
		_wrap.hover(
		function()
		{
		    clearInterval(timer);
		},
		function()
		{
		    timer=setInterval(start,speed);
		}
		);
	}
	
	
	function MarqueeV(id,direction,size,speed)
	{
		var _size=size;
		var wrap="wrap"+GetRandomNum(100,999);//包裹DIV,用随机数生成,确保不冲突
		var copy="copy"+GetRandomNum(100,999); //复制DIV,用随机数生成,确保不冲突		
		var _mar=$("."+id);		
		_mar.wrap("<div class='"+wrap+"'></div>"); //用大的DVI包裹目标
		_mar.after("<div class='"+copy+"'></div>");  //在目标结尾添加复制DIV		
		var _copy=$("."+copy);
		_copy.html(_mar.html());   //复制内容
		
		var _wrap=$("."+wrap);		
		_wrap.css("overflow","hidden"); 
		
		
		var _copyDom=$("."+copy)[0];  //获取dom对象
		var _wrapDom=$("."+wrap)[0];  //获取dom对象
		var _marDom=$("."+id)[0]; //获取dom对象
		
		switch(direction)
		{
			case 1:				
				_wrap.css("height",_size+"px");
				break;
			case 2:			
				_wrapDom.scrollTop=_wrapDom.scrollHeight;		
				_wrap.css("height",_size+"px");
				break;		
			default :return ;break;
		}
		
		var start=function(){
				var _offset; var _scroll; 
				switch(direction)
				{
					case 1:						
							_scroll=_wrapDom.scrollTop;						
							_offset=_copyDom.offsetHeight;							
							//alert(_scroll+","+_offset);
							if(_offset>_scroll)
							{
								_wrapDom.scrollTop++;
							}
							else
							{
								_wrapDom.scrollTop=0;
							}
							break;
					case 2:
						    _scroll=_wrapDom.scrollTop;						
							_offset=_copyDom.offsetTop;							
							//alert(_scroll+","+_offset);
							if(_offset<_scroll)
							{
								_wrapDom.scrollTop--;
							}
							else
							{
								_wrapDom.scrollTop+=_copyDom.offsetHeight;
							}
							break;				
				}
		};		
		
		//start();
		var timer=setInterval(start,speed);
		
		
		_wrap.hover(
		function()
		{
		    clearInterval(timer);
		},
		function()
		{
		    timer=setInterval(start,speed);
		}
		);
	}

function GetRandomNum(Min,Max){
        var Range = Max - Min;
        var Rand = Math.random();
        return(Min + Math.round(Rand * Range));
} 