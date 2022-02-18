<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserFollowRelationship;
use Illuminate\Database\Seeder;

class UserFollowRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy_count = 30; // 生成したいダミーデータの数
        $max_loop = User::count()*(User::count()-1); // 重複のない全ての組み合わせの総数（順列:nPk）

        $loop = $dummy_count > $max_loop ? $max_loop : $dummy_count; // 組み合わせの総数を超えて無限ループになることを防ぐ
        for ($i = 0; $i < $loop; $i++){

            // following_idとfollow_idが被らないようにそれぞれのidをランダムに取得
            $set_following_id = optional(User::inRandomOrder()->first())->id;
            $set_followed_id = optional(User::where('id', '<>', $set_following_id)->inRandomOrder()->first())->id;

            // 上記のモデルから取得したidの組み合わせが、未登録であることを確認
            $user_follow_relation = UserFollowRelationship::where([
                                ['following_id', '=', $set_following_id],
                                ['followed_id', '=', $set_followed_id]
                            ])->doesntExists();
            
            // 未登録であればデータ追加。登録済みならデクリメントして再ループ
            if($user_follow_relation){
                UserFollowRelationship::insert(
                    [
                        'following_id' => $set_following_id,
                        'followed_id' => $set_followed_id,
                    ]
                );
            }else{
                $i--;
            }
        }
    }
}
