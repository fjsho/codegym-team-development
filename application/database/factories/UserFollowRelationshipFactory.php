<?php

namespace Database\Factories;

use App\Models\UserFollowRelationship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFollowRelationshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserFollowRelationship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //あらかじめfollowing_idを決め、followed_idとの重複を避ける
        $following_id = optional(User::inRandomOrder()->first())->id;

        // 厳密には登録済みのfollowed_idも避ける必要があるが、実装を優先し保留中
        // →一括でSQL文を発行して登録しているため、以下のように登録と同時に登録済みのfollowed_idを取得することはできなかった。
        // $already_followed_id = optional(UserFollowRelationship::where('following_id', '=', $following_id))->pluck('followed_id');
        // 上記の処理が使える場合、'->whereNotIn('id', $already_followed_id)'をfollowed_idの検索条件に追加することで実装可能となる。

        return [
            'following_id' => $following_id,
            'followed_id' => optional(User::where('id', '<>', $following_id)->inRandomOrder()->first())->id,
        ];
    }
}
