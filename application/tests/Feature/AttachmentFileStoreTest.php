<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AttachmentFileStoreTest extends TestCase
{
    const STORAGE_DIR_NAME = 'attachment_pic';

    /**
     * @test
     */
    public function jpg画像を投稿できる()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->image('test.jpg');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertExists('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertRedirect($referer);
    }

    /**
     * @test
     */
    public function jpeg画像を投稿できる()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->image('test.jpeg');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertExists('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertRedirect($referer);
    }

    /**
     * @test
     */
    public function png画像を投稿できる()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        storage::fake('attachment_pic');
        $file = UploadedFile::fake()->image('test.png');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertExists('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertRedirect($referer);
    }

    /**
     * @test
     */
    public function gif画像を投稿できる()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->image('test.gif');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertExists('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertRedirect($referer);
    }

    /**
     * @test
     */
    public function tiff画像を投稿できる()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->image('test.tiff');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertExists('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertRedirect($referer);
    }
    /**
     * @test
     */
    public function pdfファイルは投稿できない()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->create('test.pdf',500,'application/pdf');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertMissing('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertSessionHasErrors();
        $response->assertRedirect($referer);
    }
    /**
     * @test
     */
    public function txtファイルは投稿できない()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $file = UploadedFile::fake()->create('test.txt', 500, 'text/plain');
        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertMissing('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertSessionHasErrors();
        $response->assertRedirect($referer);
    }
    /**
     * @test
     */
    public function 指定した容量以上の画像を登録することはできない()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'created_user_id' => $user->id, 
        ]);

        $max_size_mb = 10.05;
        $file_size_kb = $max_size_mb * 1024; //指定容量10.5MB（10,500KB未満は保存できる）
        $file = UploadedFile::fake()->create('sizetest.jpg', $file_size_kb, 'image/jpeg');

        $referer = route('posts.edit', ['post' => $post->id]);

        $response = $this->actingAs($user)
        ->from($referer)
        ->put(route('attachment_files.update', ['post' => $post->id, 'attachment_file' => $post->attachment ]),[
            'file' => $file,
        ]);

        Storage::disk('public')->assertMissing('./'.self::STORAGE_DIR_NAME.'/'.$file->hashName());
        $response->assertSessionHasErrors();
        $response->assertRedirect($referer);
    }
}