## テーブル名

- 論理名: 添付ファイル
- 物理名: attachment_files

## テーブル定義

| 論理(項目)名        | 物理(カラム)名     | データ型         | Null許可  | Key | デフォルト値       | その他設定       | 備考        |
|-------------------|------------------|-----------------|:--------:|:---:|------------------|----------------|-------------|
| 投稿者ID           | id               | bigint          | NO       | PK  | なし              |                | UNSIGNED    |
| 添付ファイル画像パス | attachment_path  | varchar(2500)   | NO       | FK  | なし               |                |             |
| 作成日時           | created_at       | timestamp       | NO       |     |                   |                |             |
| 更新日時           | updated_at       | timestamp       | NO       |     |                   |                |             |
| 削除日時           | deleted_at       | timestamp       | NO       |     |                   |                |             |
