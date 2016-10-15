# DelAll插件

使用说明：
	<script>
	  $(function(){
			new DelAll({
		    "allClass":$('.all'),//控制所有复选框的复选框的className
		    "listClass":$('.cBox'),//被控制复选框的className
		    "delAllBtn":$('.del-all-btn'),//批量删除按钮
		    "delUrl":"delAll.php", //需要传给后端的url
		    "listCheckboxName":"ids[]",//被控制复选框的name
		    "imgUrl":"images" //插件所用图片的地址
		    });
		});
	</script>
