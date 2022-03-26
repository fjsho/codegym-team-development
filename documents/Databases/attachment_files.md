## テーブル名

- 論理名: 添付ファイル
- 物理名: attachment_files

## テーブル定義

| 論理(項目)名        | 物理(カラム)名       | データ型         | Null許可  | Key | デフォルト値       | その他設定       | 備考        |
|-------------------|--------------------|-----------------|:--------:|:---:|------------------|----------------|-------------|
| 投稿ID            | id                  | int(11)         | NO       | PK  | なし              |                | UNSIGNED    |
| 添付ファイル画像パス | attachment_pic_path | varchar(255)   | NO       |     | なし               |                |             |
| 作成日時           | created_at          | timestamp      | YES      |     |                   |                |             |
| 更新日時           | updated_at          | timestamp      | YES      |     |                   |                |             |
| 削除日時           | deleted_at          | timestamp      | YES      |     |                   |                |             |
