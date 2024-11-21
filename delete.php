<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>delete.php</title>
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
</style>
</head>
<body>
	<h1>ユーザ１人の削除</h1>
	<p>入力されたIDのユーザの情報を削除します。</p>
	<form action="delete.php" method="get">
		<input type="text" name="id" placeholder="IDを入力" />
		<input type="submit" value="送信する">
	</form>
	<hr>

	<?php
	//GETで送信されたidの取得
	
	//idが送信されていた場合は削除処理を実行
	if(0){
		//connect.phpを読み込み
	
		//DELETE文を作成して実行する
		
		//実行結果が0より大きければ削除に成功、そうでなければ失敗した旨を表示
		if(0){
			echo "<p>ユーザを削除しました。</p>";
		}else{
			echo "<p>ユーザが存在しません。</p>";
		}
	}
	?>
</body>
</html>