<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>use_pdo.php</title>
<style>
	table{
		border-collapse: collapse;
	}
	th,td{
		padding: 5px 10px;
		border: solid 1px #ccc;
	}
</style>
</head>
<body>

<?php
	//PDOでデータベースに接続（例外処理バージョン）
	$conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8;", "root", "1234");

	//PDOでデータベースに接続（例外処理バージョン）
	/*
	$conn = null;
	try{
		$option = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
		$conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8;", "root", "1234", $option);
	}catch(PDOException $e){	//エラー時は例外処理を実施
		die($e->getMessage());  //接続に失敗したらエラーメッセージを出して終了
	}
	*/

	//INSERT文を作成する
	//$sql = "INSERT INTO users VALUES (NULL, 'test6', '6789', 'テスト六郎');";
	
	//UPDATE文を作成する
	//$sql = "UPDATE users SET password = '7777' WHERE userID = 'test6'; ";	//INSERT文が正常に動作したらコメントを解除して試してみよう
	
	//DELETE文を作成する
	//$sql = "DELETE FROM users WHERE id = 6; ";	//UPDATE文が正常に動作したらコメントを解除して試してみよう
	
	//処理を実行
	//$result = $conn->exec($sql);
	
	//実行後の戻り値（変更件数）を表示する
	//echo $result."件のデータを更新しました";
	
	//queryメソッドを使って、usersテーブルにSELECTを実行してみよう
	$sql = "SELECT * FROM users;";
	$result = $conn->query($sql);
	
	//検索されたレコードのカラムをテーブルに出力しよう
	if($result->rowCount()){
?>
		<table>
			<tr>
				<th>userID</th>
				<th>password</th>
				<th>name</th>
			</tr>
		<?php foreach($result as $r){ ?>
			<tr>
				<td><?php echo $r[1]; ?></td>
				<td><?php echo $r[2]; ?></td>
				<td><?php echo $r[3]; ?></td>
			</tr>
		<?php } ?>
		</table>
	<?php 
	}else{
		echo "該当するものがありませんでした";
	}
	?>
</body>
</html>
