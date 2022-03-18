<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_user_id',
        'attachment_id',
        'title',
        'content',
    ];

    /**
     * ソート対象となる項目.
     *
     * @var array
     */
    public $sortable = [
        'created_user_id',
        'attachment_id',
        'updated_at',
        'released_at',
        'created_at',
        'deleted_at',
    ];

    /**
    * 投稿したユーザーを取得.
    */
    public function user()
    {
    return $this->belongsTo(User::class, 'created_user_id');
    }

    /**
     * 投稿に添付されている画像を取得.
     */
    public function attachment()
    {
        return $this->belongsTo(AttachmentFile::class, 'attachment_id');
    }
}
