<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rules\ProfilePicValidation;

class UserController extends Controller
{
    /**
     * 指定したユーザーのプロフィール画面を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', [
            'user' => Auth::user(),
            'profile' => User::findOrFail($id),
        ]);
    }

    /**
     * 指定したユーザーのプロフィールを編集する。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
            return view('users.edit', [
                'user' => Auth::user(),
                'profile' => User::findOrFail($id),
            ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'self_introduction' => 'string|max:1000',
            'file' => ['file', new ProfilePicValidation],
        ]);

        $storage_dir_name = 'profile_pic';
        if(isset($validated['file'])){
            $file_name = $validated['file']->hashName();
            $validated['file']->storeAs('public/'.$storage_dir_name, $file_name);
        } else {
            $file_name = $user->profile_pic_path;
        }

        if ($user->update([
            'name' => $validated['name'],
            'self_introduction' => $validated['self_introduction'],
            'profile_pic_path' => $file_name,
        ])) {
            $flash = "";
        } else {
            $flash = ['error' => __('Failed to update the user.')];
        }

        return redirect()
            ->route('users.edit', [
                'user' => $user,
                'profile' => $user,
                ])
            ->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
