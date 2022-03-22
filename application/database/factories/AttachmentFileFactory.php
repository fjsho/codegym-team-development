<?php

namespace Database\Factories;

use App\Models\AttachmentFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class AttachmentFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttachmentFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $storage_dir_name = 'attachment_pic'; //ストレージとするディレクトリ名
        $storage_dir_path = Storage::disk('public')->path($storage_dir_name);
        if(Storage::disk('public')->missing($storage_dir_name)){
            Storage::disc('public')->makeDirectory($storage_dir_name);
        }
        $picture = $this->faker->image($storage_dir_path, 620, 325, 'city', false);
        $file_path = str_replace($storage_dir_path, '', $picture);

        return [
        'attachment_pic_path' => $file_path,
        ];
    }
}
