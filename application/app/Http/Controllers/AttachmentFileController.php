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
        $storage_dir_name = 'attachment_pic';
        if(Storage::disk('public')->missing($storage_dir_name)){
            Storage::disk('public')->makeDirectory($storage_dir_name);
        }

        $validated = $request->validate([
            'file' => ['required', 'file', new AttachmentFileValidation]
        ]);

        $file_name = $validated['file']->hashName();
        $validated['file']->storeAs('public/'.$storage_dir_name, $file_name);

        if ($attachment_file->update([
            'attachment_pic_path' => $file_name,
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
