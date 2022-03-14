<?php

namespace Database\Factories;

use App\Models\AttachmentFile;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        //ダミープロフィール画像保存用の記述
        $storage_dir_path = './storage/app/public/profile_pic';
        $picture = $this->faker->image($storage_dir_path, 300, 300, 'posts', false);
        $file_path = str_replace($storage_dir_path, '', $picture);

        return [
        'attachment_pic_path' => $file_path
        ];
    }
}
