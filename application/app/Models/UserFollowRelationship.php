<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollowRelationship extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'following_id',
        'followed_id',
    ];

    /**
     * モデルにタイムスタンプを付けるか
     *
     * @var bool
     */
    //このテーブルは中間テーブルであり、フォローの有無（=レコードの有無）を判定できればいいのでfalseとした
    public $timestamps = false;
}
