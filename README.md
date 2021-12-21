# 擬似ECサイト
## Laravelで制作した簡易的な動作をするECサイト
実際に購入することは出来ませんが、商品のカート登録、削除、購入履歴の閲覧、商品の検索などが行えます。

## 機能一覧
##### ・会員登録　ログイン機能
会員名、パスワードの登録及び会員データを活用したログイン認証機能
##### ・カートに商品を登録、カート内の商品削除、商品の購入機能
商品の個数を入力すると、その商品と個数がユーザーのカートページに記録される。<br>
ユーザーのカートページで商品を削除するとカートに入れていた商品が削除される。<br>
「カートを空にする」ボタンでカート内の全ての商品を削除できる<br>
ユーザーのカートページで購入ボタンを選択するとカートの商品が購入され、購入履歴が記録される。
##### ・商品紹介ページのページネーション
1画面に表示される商品の個数は6個であり、それ以上の商品は次ページ以降に表示
##### ・商品の検索機能
検索欄で文字を入力すると、それに伴った商品が絞り込まれる。<br>
また、検索欄横のタブを選択すると、タブに沿った商品ジャンルから検索を絞り込むこともできる。
##### ・簡易バナー表示
紹介紹介ページの上部に一定時間で内容が変更されるバナーを設定
##### ・購入履歴の閲覧
購入履歴の閲覧ページに購入した日付の一覧が表示される。<br>
また、日付横に記載された表示を選択すると、購入した商品の記録を閲覧できる。

## 動作環境
windows10<br>
PHP 8.0.12<br>
Laravel Framework 6.20.27<br>
10.4.21-MariaDB - mariadb.org binary distribution 
