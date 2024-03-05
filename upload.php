<?php
$host = "mysql57.kemco.sakura.ne.jp";
$dbName = "kemco_kakizome";
$username = "kemco";
$password = "h76-id_z";
$dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";


try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
            $image .= '.jpg';# . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得

            $img = imagecreatefrompng($_FILES['image']['tmp_name']);//画像取得

            
            // 取得した画像リソースIDと指定角度で、画像を回転させる。
            $img_left = imagerotate($img, 270, 0);

            $width  = 397;//Canvasの幅395
            $height = 546;//Canvasの高さ544553
            $create_image = imagecreatetruecolor($width,$height);//Canvasの土台作成
            $position_x1 = 0;//画像配置するポジションX
            $position_y1 = 0;//画像配置するポジションX
            imagecopy($create_image, $img_left, $position_x1, $position_y1, 290, 440, $width, $height);//コピー先の画像リソース, コピー元の画像リソース, コピー先の x 座標, コピー先の y 座標, コピー元の x 座標,　コピー元の y 座標, コピー元の幅, コピー元の高さ
            ImageFilter($create_image, IMG_FILTER_BRIGHTNESS, 50);
            ImageFilter($create_image, IMG_FILTER_CONTRAST, -10);
            
            $file = "images/$image";


            $sql = "INSERT INTO usagi_2023 (path)  VALUES (:file)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':file', $file, PDO::PARAM_STR);

            // 画像を書き出す
            imagejpeg($create_image, $file);
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $stmt->execute();
                $message = 'アップロードが完了しました';
            } else {
                $message = '画像ファイルではありません';
            }
            

        }
    }
?>

<h1>画像アップロード</h1>
<!--送信ボタンが押された場合-->
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
    <a href="upload.php">戻る</a>
    
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <input type="submit" name="upload" value="送信">
    </form>
<?php endif;?>
