## テーブル名

- 論理名: ユーザーフォロー
- 物理名: user_follow_relationships

## テーブル定義

| 論理(項目)名                 | 物理(カラム)名    | データ型         | Null許可 | Key | デフォルト値 | その他設定     | 備考        |
|------------------------------|-------------------|------------------|:--------:|:---:|--------------|----------------|-------------|
| ユーザーフォローID               | id                | int(11)          | NO       | PK  | なし         | auto_increment | UNSIGNED    |
| フォローする側のユーザーID   | following_id      | int(11)          | NO       | FK  | なし         |                | UNSIGNED    |
| フォローされる側のユーザーID | followed_id       | int(11)          | NO       | FK  | なし         |                | UNSIGNED    |

## 備考

- 外部キーについて
  - following_id及びfollowed_idの参照先はどちらもusersテーブルのidカラム