## テーブル名

- 論理名: ユーザー
- 物理名: users

## テーブル定義

| 論理(項目)名          | 物理(カラム)名    | データ型         | Null許可 | Key | デフォルト値 | その他設定     | 備考        |
|-----------------------|-------------------|------------------|:--------:|:---:|--------------|----------------|-------------|
| ID                    | id                | int(11)          | NO       | PK  | NULL         | auto_increment |             |
| ユーザー名            | name              | varchar(50)      | NO       |     | NULL         | UNIQUE         |             |
| 自己紹介              | self_introduction | varchar(1000)    | YES      |     | NULL         |                |             |
| プロフィール画像パス  | profile_pic_path  | varchar(255)     | YES      |     | NULL         | UNIQUE         |             |
| Eメールアドレス       | email             | varchar(254)     | NO       |     | NULL         | UNIQUE         |             |
| Eメールアドレス確認日 | email_verified_at | timestamp        | YES      |     | NULL         |                |             |
| パスワード            | password          | varchar(255)     | NO       |     | NULL         |                |             |
| 持続ログイントークン  | remember_token    | varchar(100)     | YES      |     | NULL         |                |             |
| 作成日時              | created_at        | timestamp        | YES      |     | NULL         |                |             |
| 更新日時              | updated_at        | timestamp        | YES      |     | NULL         |                |             |
| 削除日時              | deleted_at        | timestamp        | YES      |     | NULL         |                |             |

## 備考

- Laravel8で自動生成されるuserテーブルに準拠
- 自己紹介は文字数を制限するため、text型ではなくvarchar型を選択
- 作成・更新・削除日時はアプリケーション側で自動で入力される