// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(news,acc,type)
{
	$.post("api/good.php",{news,acc,type},function()
	{
		if(type=="1")
		{
			$("#vie"+news).text($("#vie"+news).text()*1+1)
			$("#good"+news).text("收回讚").attr("onclick","good('"+news+"','"+acc+"','2')")
		}
		else
		{
			$("#vie"+news).text($("#vie"+news).text()*1-1)
			$("#good"+news).text("讚").attr("onclick","good('"+news+"','"+acc+"','1')")
		}
	})
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}