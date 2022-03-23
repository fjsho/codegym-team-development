<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TmpFileController extends Controller
{
    /**
     * store the picture temporarily.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTmpFile(Request $request)
    {
        //投稿予定画像がある場合、tmpディレクトリに画像を保存し、セッション情報を一時的に保持する
        if($file = $request->file('file')){
            $tmp_file_name = $file->hashName();
            $tmp_file_path = basename($file->store('public/tmp'));
            $request->session()->put('tmp_file', $tmp_file_path);

            $flash = ['success' => __('File added successfully.')];
        } else {
            $flash = ['error' => __('Failed to add the file.')];
        }
        return redirect()
            ->route('posts.create')
            ->with($flash);
    }
}
