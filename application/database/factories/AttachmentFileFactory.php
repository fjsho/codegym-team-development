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
        //ダミーファイル保存用の記述
        $storage_name = 'attachment_pic'; //ストレージとするディレクトリ名を記述する
        $storage_dir_path = Storage::disk('local')->path('public/'.$storage_name);
        if(Storage::disk('local')->missing('public/'.$storage_name)){
            Storage::makeDirectory('public/'.$storage_name);
        }
        $picture = $this->faker->image($storage_dir_path, 620, 325, 'city', false);
        $file_path = str_replace($storage_dir_path, '', $picture);

        return [
        'attachment_pic_path' => $file_path,
        ];
    }
}
