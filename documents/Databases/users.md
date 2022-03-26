## テーブル名

- 論理名: ユーザー
- 物理名: users

## テーブル定義

| 論理(項目)名          | 物理(カラム)名    | データ型         | Null許可 | Key | デフォルト値 | その他設定     | 備考        |
|-----------------------|-------------------|------------------|:--------:|:---:|--------------|----------------|-------------|
| ID                    | id                | int(11)          | NO       | PK  | なし         | auto_increment | UNSIGNED    |
| ユーザー名            | name              | varchar(50)      | NO       |     | なし         | UNIQUE         |             |
| 自己紹介              | self_introduction | varchar(160)     | YES      |     | NULL         |                |             |
| プロフィール画像パス  | profile_pic_path  | varchar(255)     | YES      |     | NULL         | UNIQUE         |             |
| Eメールアドレス       | email             | varchar(254)     | NO       |     | なし         | UNIQUE         |             |
| Eメールアドレス確認日 | email_verified_at | timestamp        | YES      |     | NULL         |                |             |
| パスワード            | password          | varchar(255)     | NO       |     | なし         |                |             |
| 持続ログイントークン  | remember_token    | varchar(100)     | YES      |     | NULL         |                |             |
| 作成日時              | created_at        | timestamp        | NO       |     | なし         |                |             |
| 更新日時              | updated_at        | timestamp        | NO       |     | なし         |                |             |
| 削除日時              | deleted_at        | timestamp        | YES      |     | NULL         |                |             |

## 備考

- Laravel8で自動生成されるuserテーブルに準拠
  - したがって以下のカラムは要件定義書には無いものの、Laravelの機能の活用とカラム削除により想定外の動作が起こり、無駄な調整が必要とならないようにそのまま残す形とした。
    - Eメールアドレス確認日
    - 持続ログイントークン
- 自己紹介は文字数を制限するため、text型ではなくvarchar型を選択
- 自己紹介の文字数は画面イメージが崩れない文字数として160文字を設定
- 作成/更新/削除日時はアプリケーション側で自動で入力される
- 作成/更新日時については、Laravel8で自動生成されるマイグレーションファイルではNULL許可だが、今回のサービスにおいては、作成/更新日不明のデータが格納されることは想定されないためNOT NULL制約をつける
