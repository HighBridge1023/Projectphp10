<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>update.php</title>
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
<h1>ユーザ１人の更新</h1>
<?php
//GETパラメータの取得

//POSTされたデータの取得

//connect.phpを読み込み

//ID指定がない場合はidを指定するフォームを表示
if(0){
	?>
	<p>更新したいユーザのIDを入力してください。</p>
	<form action="update.php" method="get">
		<input type="text" name="id" placeholder="IDを入力" />
		<input type="submit" value="送信する">
	</form>
	<hr>
<?php
//GETでIDが指定されている場合、データベースからユーザの情報を取得し、更新用のテーブルと入力欄を表示する。
}elseif(0){
	//SELECT文を作成して実行
	
	//指定されたユーザが存在した場合は、情報更新用のテーブルと入力欄を表示する
	if(0){
		?>
		<p>記載情報を修正後、更新するボタンをクリックしてください。</p>
		<form action="update.php" method="post">
			<table>
				<tr>
					<th>id</th>
					<td><input type="hidden" name="id" value="" /><!--idはhiddenで送信--></td>
				</tr>
				<tr>
					<th>userID</th>
					<td><input type="text" name="userID" value="" /></td>
				</tr>
				<tr>
					<th>password</th>
					<td><input type="password" name="password" value="" /></td>
				</tr>
				<tr>
					<th>name</th>
					<td><input type="text" name="name" value="" /></td>
				</tr>
				<tr>
					<td colspan="2" class="tar"><input type="submit" value="更新する"></td>
				</tr>
			</table>
		</form>
	<?php }else{ //見つからない場合はメッセージを表示 ?>
		<p>指定されたidのユーザが見つかりません。</p>
	<?php } ?>
<?php
//POSTでIDが送信されていた場合は、更新処理を実行
}else{

	//UPDATE文を作成して実行する
	
	//メッセージと、最初の画面に戻るためのリンクを表示
	echo "<p>ユーザ情報を更新しました。<br>
	（<a href=\"update.php\">戻る</a>）</p>";
}
?>
</body>
</html>