<?php

namespace App\Http\Controllers;

use App\Models\AttachmentFile;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFollowRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
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
        $storage_dir_path = Storage::disk('local')->path('public/'.$storage_dir_name);
        $pic_exist = file_exists($storage_dir_path.$post->attachment->attachment_pic_path);
        return view('posts.edit', [
            'post' => $post,
            'pic_exist' => $pic_exist
        ]);
    }
}
