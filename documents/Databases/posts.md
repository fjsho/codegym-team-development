## テーブル名

- 論理名: 投稿
- 物理名: posts

## テーブル定義

| 論理(項目)名    | 物理(カラム)名     | データ型         | Null許可  | Key | デフォルト値       | その他設定       | 備考        |
|---------------|------------------|-----------------|:--------:|:---:|------------------|----------------|-------------|
| 投稿ID         | id               | bigint          | NO       | PK  | なし              | auto_increment | UNSIGNED    |
| 投稿者ID       | created_user_id  | bigint          | NO       | FK  | なし              |                | UNSIGNED    |
| 添付ファイルID  | attachment_id    | bigint          | YES      | FK  | なし              |                | UNSIGNED    |
| タイトル       | title             | varchar(255)    | NO       |    | なし              |                |             |
| 投稿内容       | content           | varchar(10000)  | NO       |    | なし              |                |             |
| 更新日時       | updated_at        | timestamp       | NO       |    | NULL              |                |             |
| 公開日時       | released_at       | timestamp       | YES      |    | NULL              |                |             |
| 削除日時       | deleted_at        | timestamp       | YES      |    | NULL              |                |             |
