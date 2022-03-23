<?php

namespace App\Http\Controllers;

use App\Models\AttachmentFile;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFollowRelationship;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * 新規投稿作成
     *
     * @return view
     */
    public function create(Post $post)
    {
        $storage_dir_name = 'attachment_pic'; //ストレージのディレクトリ名
        // @fixme 以下の処理は後ほどモデルに移す
        if(isset($post->attachment)){
            $pic_exist = Storage::disk('public')
            ->exists($storage_dir_name.'/'.$post->attachment->attachment_pic_path);
        }else{
            $pic_exist = "";
        }

        return view('posts.create', [
            'post' => $post,
            'pic_exist' => $pic_exist
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\StorePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        if ($post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'created_user_id' => $request->user()->id,
        ])) {
            $flash = "";
        } else {
            $flash = ['error' => __('Failed to store the post.')];
        }

        // @fixme if以下の一連の処理は後ほど適当なモデルに移す
        // セッションにtmp_fileがあったら、アタッチメントテーブルに登録し、ポストテーブルに紐付けて、画像を一時保存ディレクトリから本保存ディレクトリに移す
        if(session()->has('tmp_file')){
            if($attachment_file = AttachmentFile::create([
                'attachment_pic_path' => $request->session()->get('tmp_file'),
            ])){
                $post->update([
                    'attachment_id' => $attachment_file->id,
                ]);
                Storage::disk('public')->move('./tmp/'.$attachment_file->attachment_pic_path, './attachment_pic/'.$attachment_file->attachment_pic_path);
            }
        }

        return redirect()
            ->route('posts.edit', ['post' => $post])
            ->with($flash);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'keyword' => 'max:255',
        ]);

        $keyword = $request->input('keyword');
        $posts = Post::select('*')
            ->with('user')
            ->with('attachment');
        
        //検索機能
        if ($request->has('keyword') && $keyword != '') {
            $posts = $posts
                ->where('title', 'like', '%'.$keyword.'%');
        }
        $posts = $posts
            ->sortable('title')
            ->paginate(20)
            ->appends(['keyword' => $keyword]);

        return view('dashboard', compact('posts'), [
            'keyword' => $keyword,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $interval = $post->updated_at->diff(now());
        return view('posts.show', [
            'post' => $post,
            'interval' => $interval
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $storage_dir_name = 'attachment_pic'; //ストレージのディレクトリ名
        if(isset($post->attachment)){
            $pic_exist = Storage::disk('public')
                ->exists($storage_dir_name.'/'.$post->attachment->attachment_pic_path);
        }else{
            $pic_exist = "";
        }

        return view('posts.edit', [
            'post' => $post,
            'pic_exist' => $pic_exist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Http\Requests\TaskUpdateRequest  $request
     * @param  \App\Models\POST  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        if ($post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ])) {
            $flash = "";
        } else {
            $flash = ['error' => __('Failed to update the post.')];
        }

        return redirect()
            ->route('posts.edit', ['post' => $post])
            ->with($flash);
    }
}
