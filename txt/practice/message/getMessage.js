
$(function(){//禁用修改
	$("input").prop("readonly",true);
});
$(function(){
	$.get("text.json",
	function(data){
		var j=0;
		for(var i in data){
			$("input").eq(j).attr({value:data[i]});
			j++;
		}alert(data.used);
		if(data.used=="1"){
			$("input").prop("readonly",false);
		}
	});
});
$(function(){
	$("#changeManage").click(function(){
		alert("不为空!  "+$("#userWork").attr("value"));
		if($("#userWork").attr("value")!=""||$("#userWork").attr("value")!=null){
			
			$.get("text.json",
			{
				name:$("#useName").attr("value"),
				sex:$("#useSex").attr("value"),
				studentNum:$("#useStudentNum").attr("value"),
				academic:$("useAcademy").attr("value"),
				telephone:$("useTelephone").attr("value"),
				email:$("useEmail").attr("value"),
				department:$("useDepartment").attr("value"),
				work:$("useWork").attr("value")
			},
			  function(data){
				  alert("修改成功!");
			  })
		}
	});
});
	