<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>search.php</title>
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
		margin: 20px 0;
	}
</style>
</head>
<body>
	<h1>ユーザ検索</h1>
	<p>検索したいユーザの名前を入力してください。</p>
	<form action="search.php" method="GET">
		<table>
			<tr>
				<td><input type="text" name="name" /></td>
				<td><input type="submit" value="検索する"></td>
			</tr>
		</table>
	</form>
	<hr>
	<?php
	//GETパラメータから検索対象の名前を取得
	
	//GETパラメータの値を格納した変数の値が空でなければ
	if(0){
		//connect.phpを読み込み

		//SELECT文を作成して実行

		//レコードが見つかった場合は、検索されたレコードをテーブルに出力する
		if(0){
		?>
			<table>
				<tr>
					<th>id</th>
					<th>userID</th>
					<th>password</th>
					<th>name</th>
				</tr>
				<?php //レコードをtr・tdを使って１行ずつ表示 ?>
			</table>
		<?php } ?>
		<hr>
	<?php } ?>
</body>
</html>