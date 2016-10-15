<?php
	header('content-type:text/html;charset=utf-8');
	$dbconfig = array(
		'dsn' => 'mysql:host=localhost;dbname=del_all;charset=utf8',
		'user' => 'root',
		'pwd' => ''
	);

	try{
		extract($dbconfig);
		$pdo = new PDO($dsn,$user,$pwd);
		$sql = "select * from user";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchAll();
	}catch(PDOException $e){
		$e->getMessage();
	}

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>批量删除插件DelAll</title>
	<script src="jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="delAll-plugin.js" type="text/javascript"></script>
	</head>
	<style>
		.tablelist{border:solid 1px #cbcbcb; width:100%; clear:both;}
		.tablelist th{background:url(images/th.gif) repeat-x; height:34px; line-height:34px; border-bottom:solid 1px #b6cad2; text-indent:11px; text-align:left;}
		.tablelist td{line-height:35px; text-indent:11px; border-right: dotted 1px #c7c7c7;}
		.tablelink{color:#056dae;}
		.tablelist tbody tr.odd{background:#f5f8fa;}
		.tablelist tbody tr:hover{background:#e5ebee;}
	</style>
	<body>
	<table class="tablelist">
	    <thead>
	    <tr style="align: center; font-size: 16px;">
	        <th>
				<input type="checkbox" name="all" class="all">编号<i class="sort"><img src="images/px.gif"></i>&nbsp;
				<a href="javascript:void (0);" class="del-all-btn"><font color="red">批量删除</font></a>
			</th>
	        <th>姓名</th>
	        <th>邮箱</th>
	        <th>性别</th>
	    </tr>
	    </thead>

	    <tbody>
		<?php foreach ($row as $key=>$vo) {?>
		    <tr>
		        <td><input type="checkbox" class="cBox" name="ids[]" value="<?php echo $vo['id'];?>"><?php echo $key+1?></td>
		        <td><?php echo $vo['username'];?></td>
		        <td><?php echo $vo['email'];?></td>
		        <td><?php echo $vo['sex'];?></td>
		    </tr>
	    </tbody>
		<?php }?>
	</table>

	<br>
	<form action="add.php" method="post">
		姓名：<input type="text" name="username"><br><br>
		邮箱：<input type="text" name="email"><br><br>
		性别：<input type="text" name="sex"><br><br>
		<input type="submit"　value="添加">
	</form>
</body>
</html>
<script>
	$(function(){
		new DelAll({
            "allClass":$('.all'),
            "listClass":$('.cBox'),
            "delAllBtn":$('.del-all-btn'),
            "delUrl":"delAll.php",
            "listCheckboxName":"ids[]",
            "imgUrl":"images"
	    });
	});
</script>