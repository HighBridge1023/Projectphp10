<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>search.php</title>
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
// GETパラメータから検索対象の名前を取得
$name = $_GET['name'] ?? '';

// 名前が空でなければ検索処理を実行
if (!empty($name)) {
    $file = 'users.csv';
    $found = false;

    // CSVファイルを開いて読み込む
    if (($input = fopen($file, 'r')) !== FALSE) {
        echo "<table>
                <tr>
                    <th>id</th>
                    <th>userID</th>
                    <th>password</th>
                    <th>name</th>
                </tr>";

        // CSVの内容を1行ずつ読み込む
        while (($data = fgetcsv($input)) !== FALSE) {
            // 名前が一致した場合、結果を表示
            if (strpos(strtolower($data[2]), strtolower($name)) !== false) {
                $found = true;
                echo "<tr>
                        <td>" . htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($data[1], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($data[2], ENT_QUOTES, 'UTF-8') . "</td>
                        <td>" . htmlspecialchars($data[3], ENT_QUOTES, 'UTF-8') . "</td>
                    </tr>";
            }
        }

        fclose($input);
        
        // 名前が一致したユーザーが見つからなかった場合
        if (!$found) {
            echo "<p>該当するユーザが見つかりませんでした。</p>";
        }
        
        echo "</table>";
    } else {
        echo "<p>ファイルを開けませんでした。</p>";
    }
}
?>
</body>
</html>