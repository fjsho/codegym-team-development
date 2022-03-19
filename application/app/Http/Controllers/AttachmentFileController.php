<?php

namespace App\Http\Controllers;

use App\Models\AttachmentFile;
use App\Models\Post;
use App\Rules\AttachmentFileValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentFileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $task
     * @param  \App\Models\AttachmentFile  $attachment_file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, AttachmentFile $attachment_file)
    {
        //保存先ディレクトリがなければ新たに生成
        $storage_dir_name = 'attachment_pic';
        if(Storage::disk('local')->missing('public/'.$storage_dir_name)){
            Storage::makeDirectory('public/'.$storage_dir_name);
        }

        //バリデーション
        $validated = $request->validate([
            'file' => ['required', 'file', new AttachmentFileValidation]
        ]);

        //ファイル保存
        $file_name = $validated['file']->hashName();
        $validated['file']->storeAs('public/'.$storage_dir_name, $file_name);

        //更新
        if ($attachment_file->update([
            'attachment_pic_path' => $file_name,
        ])) {
            $flash = ['success' => __('Post updated successfully.')];
        } else {
            $flash = ['error' => __('Failed to update the post.')];
        }

        return redirect()
            ->route('posts.edit', ['post' => $post])
            ->with($flash);
    }
}
