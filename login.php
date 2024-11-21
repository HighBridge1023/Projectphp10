<?php
//セッションをスタート
session_start();

// ログアウトボタンを押された時の処理
if(isset($_POST["logout"])){//押されているならば
	session_unset(); //セッションを削除する
}

// セッションデータ内に残されているアカウントと氏名を変数に記録
//var_dump($_SESSION);
if(!empty($_SESSION["account"]) && !empty($_SESSION["name"])){ //残されているならば
	$account = $_SESSION["account"]; //変数に代入
	$name = $_SESSION["name"]; //変数に代入
}

// フォームから送信されたアカウントとパスワードを変数に記録
if(isset($_POST["account"]) && isset($_POST["password"])){ //アカウントとパスワードが送信されているならば
	$ac = $_POST["account"];//変数に代入
	$pw = $_POST["password"];
}
// ユーザのaccount, password, nameが１行に書かれたCSVファイルがあるとする。
$csvFile="users.csv";
$docRoot=$_SERVER['DOCUMENT_ROOT'];

// 表示メッセージのデフォルト値
$message='未登録です';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>login.php</title>
</head>
<body>

<?php
// セッションデータにアカウントが残っていない（＝ログイン中ではない）ならば…
if(empty($account) && empty($name)){
	// フォームからの送信値（アカウントとパスワード）がなければ…
	if(empty($ac) && empty($pw)){
	// 以下のログインフォームを表示
?>
	<h2>ログイン</h2>
	<!-- accountとpasswordを入力⇒送信するformをここに書く -->
	<form action='login.php' method='POST'>
		<table>
			<tr>
				<td>account</td>
				<td><input type='text' name='account'></td>
			</tr>
			<tr>
				<td>password</td>
				<td><input type='password' name='password'></td>
			</tr>
		</table>
		<input type='submit' value='ログイン'>
	</form>
	<hr>

<?php
	// フォームからの送信値があれば…
	}else{ // (39行目のifに対するelse)
	
// 送信されたaccount,passwordを含む行がcsvFileの中にあれば，ログイン成功。
// なければログイン失敗⇒エラーメッセージを出す。

		if(file_exists($csvFile)){ // 指定したファイル（CSVファイル）が存在していれば

			//CSVファイルを開く
			$handle = fopen($csvFile, "r");
			
			while(!feof($handle)){	// ポインタが終端でなければ繰り返し処理
			
				// 1行読み取って変数に格納
				$line = fgets($handle);
				
				// 読み取った内容を区切り文字で分割(csvファイルの区切り文字は「,」)
				$array = explode("," , $line);
				//print_r($array);
				
				if($array[0] == $ac){	//ファイルから読み取ったアカウント名 が フォームから送られたアカウント名 と一致する場合
					
					if($array[1] == $pw){	// パスワードも合致したら以下の処理を実行
						
						$message=$array[2].'さん、ようこそ！';
						
						// セッションデータにアカウントと氏名を残す（次回の表示用に）。
						$_SESSION['account']=$array[0];
						$_SESSION['name']=$array[2];
					}else{
						$message='パスワードが違います。';
					}
					break;	// whileループを抜ける
				}
			}
			//CSVファイルを閉じる
			fclose($handle);
		}
		// 未登録です、パスワードが違います、～さんようこそのいずれかのメッセージを出力
		echo $message;
	}

// セッションデータの中にアカウントが残っていれば…
}else{ // ログイン状態である場合
	//「～さん、ようこそ」と表示
	echo $account."さん、ようこそ";

// ログイン状態であれば以下のログアウトボタンを表示
?>
<form action="login.php" method="POST">
<input type="hidden" name="logout" value="yes">
<input type="submit" value="ログアウト">
</form>
<?php
}
?>
</body>
</html>
