## テーブル名

- 論理名: リレーション
- 物理名: relationships

## テーブル定義

| 論理(項目)名                 | 物理(カラム)名    | データ型         | Null許可 | Key | デフォルト値 | その他設定     | 備考        |
|------------------------------|-------------------|------------------|:--------:|:---:|--------------|----------------|-------------|
| リレーションID               | id                | int(11)          | NO       | PK  | NULL         | auto_increment | UNSIGNED    |
| フォローする側のユーザーID   | following_id      | int(11)          | NO       | FK  | NULL         |                | UNSIGNED    |
| フォローされる側のユーザーID | followed_id       | int(11)          | NO       | FK  | NULL         |                | UNSIGNED    |

## 備考

- 外部キーについて
  - following_id及びfollowed_idの参照先はどちらもusersテーブルのidカラム