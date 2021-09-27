# Destiny 保険
保険が大好きで優柔不断な日本人に後悔のない保険選びをサポートすることを目的に作成いたしました。<br>
Destiny保険とは、保険の悩みを共有するSNSです。<br>
会員登録したユーザーは保険に対して抱えている悩みを投稿することができます。他のユーザーからコメントでアドバイスを受けることができます。<br>
プロフィール欄も充実しているためユーザーが保険のプロなのか？同じような悩みをかける主婦なのか？すぐに分かる事ができます。<br>
気になったユーザーがいた場合はチャット機能で２人だけの会話を頼むことができます。より深い内容の提案を受けることを期待できます。<br>

## 使用技術
MAMP/php/Laravel5.5/mysql/git/vim/linux<br>

## URL
WEBサイトURL:　https://xs970147.xsrv.jp/ <br>
解説記事URL:　https://qiita.com/yagiryu/items/312b1310298afc8e4cd6
## 機能
### 全ユーザー
・投稿を見ることができる<br>
・コメントに「いいね」評価をいただけた数ランキングを見ることができる<br>
・管理者にお問い合わせをすることができる<br>
・悩み投稿を検索することができる。<br>

### 会員登録したユーザーのみ
・保険に対する悩みを投稿することができる<br>
・ユーザーの投稿にコメント(アドバイス)をすることができる。<br>
・他のユーザーとチャットすることができる<br>
・投稿についたコメントを確認することができる<br>
・プロフィール機能<br>

### 投稿したユーザーのみ
・投稿を削除することができる<br>
・投稿のコメントに「いいね」をすることができる<br>

### 管理者のみ
・全ユーザー確認機能<br>
・全お問い合わせ確認機能<br>
・対応したお問い合わせのステータスを変更機能<br>

トップ画面<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D1readme.png)

悩み投稿の一覧ページ<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D2readme.png)

保険の投稿をクリックすると詳細画面<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D3readme.png)

保険の悩みを投稿するページ<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D4readme.png)

## 気に入っている点
・フッター<br>
黒と白を貴重にしたシンプルなデザインと人生初のcopyrightがかっこいい、、<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D5readme.png)


・デフォルトのプロフィール写真<br>
プロフィール写真を設定していないとかわいいピカチュウのシルエット写真になります。遊び心を入れました。<br>

・「Destiny　保険」というサービス名<br>

・コメントにいいねをたくさんいただいたランキング<br>
Fontawesomeでcrownのロゴを使いました！　色とロゴが合ってて抜群に好き<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D6readme.png)

・チャット機能<br>
![!](https://github.com/ryuzo111/insurance_sns/blob/master/storage/app/default/D7readme.png)

## 反省点
各作業にかかった時間計測していない<br>
fatコントローラー<br>
cssがきたない<br>

## 今後実施したいこと
提案書作成機能<br>
レスポンシブ対応<br>
非同期通信<br>
リファクタリング<br>

## 学んだ点
サーバーに公開する流れ<br>
①ssh接続時　<br>
公開鍵の権限を600に変更すること<br>
サーバーIDはメールで送られてくるIDとは違うこと(エックスサーバーと契約すると様々なIDがあるため勘違いしてログインに失敗しました)<br>
[ssh接続時に参考にした記事](https://qiita.com/ryo2132/items/38b5a93b3df476dd2b44)<br>

②サーバー公開後にローカルからimageデータをリモートサーバーに移す時<br>
FTPのログインするときに設定を何度も間違えたせいで、ログインできなくなりました。<br>
[xserver公式のFTPに関するQ&A](https://www.xserver.ne.jp/manual/man_server_ssh.php)<br>
そのため、VSCodeでRemote sshで接続して、ローカルにあるimageフォルダーをドラッグアンドドロップで移動させました。<br>
