<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\AttachmentFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'created_user_id' => User::factory(),
        'attachment_id' => AttachmentFile::factory(),
        'title' => $this->faker->sentence,
        'content' => $this->faker->text
        ];
    }
}
