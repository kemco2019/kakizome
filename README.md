# みんなの書き初め
参考URL: https://studio.kemco.keio.ac.jp/NewYear2023/

# 概要
新春展で使う「みんなの書き初め」のアップロードページと展示ページ
- .htaccess : https://studio.kemco.keio.ac.jp/NewYear20XX/ にアクセスしたときにpiece.phpを表示するためのファイル
- piece.php : 展示用ページ
- piece_ajax.js : いいねボタン用js
- piece_ajax.php : js処理用ページ
- upload.php : 撮影した画像のアップロードページ
- objectreading.py : 撮影用コード
# 使用方法
## データベース作成
1.[さくらのレンタルサーバ](https://secure.sakura.ad.jp/rs/cp/)にログイン

2.ショートカットのデータベースをクリック

3.phpMyAdminログインをクリック

4.ログイン後、左のタブからkemco_kakizomeをクリック

5.新しいテーブルを作成
