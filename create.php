<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>create.php</title>
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
<h1>ユーザ１人の追加</h1>
<p>各項目を記入の上、登録ボタンをクリックしてください。</p>
<form action="create.php" method="post">
	<table>
		<tr>
			<th>userID</th>
			<td><input type="text" name="userID" /></td>
		</tr>
		<tr>
			<th>password</th>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<th>name</th>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td colspan="2" class="tar"><input type="submit" value="登録する"></td>
		</tr>
	</table>
</form>

<?php
//POSTされたデータの取得
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
//全入力欄が空欄でなければデータを追加
if(!empty($username) && !empty($email) && !empty($password)){
	//connect.phpを読み込
	include 'connect.php';
	//INSERT文を作成して実行
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	echo "<p>ユーザを追加しました。</p>";
}
?>
</body>
</html>