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
// GETで送信されたidの取得
$id = $_GET['id'] ?? '';

// idが送信されていた場合は削除処理を実行
if (!empty($id)) {
    $file = 'users.csv';
    $temp_file = 'users_temp.csv';

    // 一時ファイルを作成
    $input = fopen($file, 'r');
    $output = fopen($temp_file, 'w');
    
    $found = false;

    // CSVファイルの内容を一行ずつ読み込み
    while (($data = fgetcsv($input)) !== FALSE) {
        if ($data[0] === $id) {
            $found = true; // ユーザーが見つかった場合
        } else {
            fputcsv($output, $data); // 一時ファイルに書き込む
        }
    }

    fclose($input);
    fclose($output);

    // 一時ファイルを元のファイルに置き換える
    if ($found) {
        rename($temp_file, $file);
        echo "<p>ユーザを削除しました。</p>";
    } else {
        unlink($temp_file); // 一時ファイルを削除
        echo "<p>ユーザが存在しません。</p>";
    }
}
?>
</body>
</html>