<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $storage_dir_name = 'profile_pic'; //ストレージとするディレクトリ名
        $storage_dir_path = Storage::disk('public')->path($storage_dir_name);
        if(Storage::disk('public')->missing($storage_dir_name)){
            Storage::disk('public')->makeDirectory($storage_dir_name);
        }

        $picture = $this->faker->image($storage_dir_path, 300, 300, 'people', false);
        $file_path = str_replace($storage_dir_path, '', $picture);

        return [
            'name' => $this->faker->unique()->name,
            'self_introduction' => $this->faker->realText(random_int(10, 160)),
            'profile_pic_path' => $file_path,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
