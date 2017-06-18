<?php
// データベースに接続するために必要なデータソースを変数に格納
// mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
$dsn = 'mysql:host=<hostname>;dbname=<dbname>;charset=utf8';

// データベースのユーザー名
$user = '<username>';

// データベースのパスワード
$password = '<password>';

// tryにPDOの処理を記述
try {

  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);

// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();

  // 強制終了
  exit;

}

$sql = <<<EOF
SELECT bs_mobilization.user_no,
(CASE WHEN users.nick_name is NULL THEN guest_name WHEN bs_mobilization.user_no = '00000000' THEN guest_name ELSE users.nick_name END) as displayName,
COUNT(CASE WHEN users.nick_name is NULL THEN guest_name WHEN bs_mobilization.user_no = '00000000' THEN guest_name ELSE users.nick_name END) as score
FROM bs_mobilization LEFT OUTER JOIN users
ON bs_mobilization.user_no = users.user_no
WHERE regist_datetime >= '2017-05-01' 
AND regist_datetime <= '2017-05-31' 
AND bs_mobilization.user_no != '7654321'
GROUP BY displayName
ORDER BY score DESC
EOF;

$result = $dbh -> query($sql);

//クエリー失敗
if(!$result) {
	echo $dbh->error;
	exit();
}
 
//連想配列で取得
while($row = $result->fetch(PDO::FETCH_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
unset($result);
 
// データベース切断
$dbh = NULL

?>

<!DOCTYPE html>
<html>
<head>
<title>ランキングの集計結果</title>
<meta charset="utf-8">
</head>
<body>
<h1>5月のランキングの集計結果</h1> 
※下表の名前で集計しています</br>
&nbsp;&nbsp;「bs_mobilization」と「users」を「user_no」でJOINしています。</br>
&nbsp;&nbsp;「bs_mobilization」テーブルに「user_no = '00000000'」のレコードが複数存在するため</br>
&nbsp;&nbsp;「user_no = '00000000'」のレコードに関しては「guest_name」を表示しています。</br></br>
 
<table border='1'>
<tr><th>順位</th><th>名前</th><th>紹介数</th></tr>
 
<?php 
$rank = 1;
$rows_count = 1;
$score = 0;
foreach($rows as $row){
?> 
<tr> 
	<td><?php if($score == $row['score']){ $rows_count++; }else{ $score = $row['score']; $rank = $rows_count++; } echo $rank; ?></td> 
	<td><?php echo htmlspecialchars($row['displayName'],ENT_QUOTES,'UTF-8'); ?></td>
	<td><?php echo $row['score']; ?></td>
</tr> 
<?php 
} 
?>
</table>
 
</body>
</html>


