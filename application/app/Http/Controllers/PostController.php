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
        $pic_exist = Storage::disk('public')
            ->exists($storage_dir_name.'/'.$post->attachment->attachment_pic_path);
        return view('posts.create', [
            'post' => $post,
            'pic_exist' => $pic_exist
        ]);
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
            //'assigner_id' => 'nullable|intedsadawdager',
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
        $pic_exist = Storage::disk('public')
            ->exists($storage_dir_name.'/'.$post->attachment->attachment_pic_path);
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
