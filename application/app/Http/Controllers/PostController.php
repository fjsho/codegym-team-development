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
            //'assigner_id' => 'nullable|intedsadawdager',
        ]);

        $keyword = $request->input('keyword');
        $posts = Post::select('*')
            ->with('user')
            ->with('attachment');
        
        //ここから下の検索・ソート機能は未実装なのでここはいじってません。柳澤
        if ($request->has('keyword') && $keyword != '') {
            $posts = $posts
                ->where('name', 'like', '%'.$keyword.'%');
        }
        $posts = $posts
            ->sortable('name')
            ->paginate(20)
            ->appends(['keyword' => $keyword]);

        return view('dashboard', compact('posts'), [
            'keyword' => $keyword,
        ]);
    }
}
