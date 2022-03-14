<?php

namespace App\Http\Controllers;

use App\Models\AttachmentFile;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFollowRelationship;
use Illuminate\Http\Request;

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
}
