<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>read.php</title>
<style>
	table{
		border-collapse: collapse;
	}
	th,td{
		padding: 5px 10px;
		border: solid 1px #ccc;
	}
	.tar{
		text-align: right;
	}
	hr{
		margin:20px 0;
	}
</style>
</head>
<body>
	<h1>ユーザ１人の表示</h1>
	<p>入力されたIDのユーザの情報を表示します。</p>
	<form action="read.php" method="get">
		<input type="text" name="id" placeholder="IDを入力" />
		<input type="submit" value="送信する">
	</form>
	<hr>
	<?php
	//GETパラメータから読込対象idを取得
	
	//idが指定されていたら検索処理を実行
	if(0){
		//connect.phpを読み込み
		require("connect.php");
		
		//SELECT文を作成して実行する
		
		//指定IDに該当するユーザが見つかればテーブルに出力
		if(0){
		?>
			<table>
				<tr>
					<th>id</th><td></td>
				</tr>
				<tr>
					<th>userID</th><td></td>
				</tr>
				<tr>
					<th>name</th><td></td>
				</tr>
			</table>
		<?php }else{ ?>
			<p>レコードが見つかりませんでした。</p>
		<?php } ?>
	<?php } ?>
</body>
</html>