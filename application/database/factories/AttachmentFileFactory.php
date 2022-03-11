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
        return [
        'attachment_pic_path' => $this->faker->url
        ];
    }
}
