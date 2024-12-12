<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>read.php</title>
<style>
    table {
        border-collapse: collapse;
    }
    th, td {
        padding: 5px 10px;
        border: solid 1px #ccc;
    }
    .tar {
        text-align: right;
    }
    hr {
        margin: 20px 0;
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
// GETパラメータから読込対象idを取得
$id = $_GET['id'] ?? '';

// idが指定されていたら検索処理を実行
if (!empty($id)) {
    $file = 'users.csv';
    $found = false;
    $userData = [];

    // CSVファイルの内容を一行ずつ読み込み
    if (($input = fopen($file, 'r')) !== FALSE) {
        while (($data = fgetcsv($input)) !== FALSE) {
            if ($data[0] === $id) {
                $userData = $data;
                $found = true;
                break;
            }
        }
        fclose($input);
    }

    // 指定IDに該当するユーザが見つかればテーブルに出力
    if ($found) {
?>
        <table>
            <tr>
                <th>id</th><td><?php echo htmlspecialchars($userData[0], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr>
                <th>userID</th><td><?php echo htmlspecialchars($userData[0], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <tr>
                <th>name</th><td><?php echo htmlspecialchars($userData[2], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        </table>
<?php
    } else {
        echo "<p>レコードが見つかりませんでした。</p>";
    }
}
?>
</body>
</html>