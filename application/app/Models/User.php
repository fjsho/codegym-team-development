<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'self_introduction',
        'profile_pic_path',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 自分がフォローしているユーザーを取得.
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'user_follow_relationships', 'following_id', 'followed_id');
    }

    /**
     * 自分がフォローされているユーザーを取得.
     */
    public function followed()
    {
        return $this->belongsToMany(User::class, 'user_follow_relationships', 'followed_id', 'following_id');
    }

    // @check 仮実装。レシピ機能との統合後、要確認。
    /**
     * ユーザーのレシピを取得.
     */
    public function recipes()
    {
        return $this->hasMany(Project::class, 'created_user_id');
    }
}
