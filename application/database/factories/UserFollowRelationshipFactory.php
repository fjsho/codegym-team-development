<?php

namespace Database\Factories;

use App\Models\UserFollowRelationship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFollowRelationshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserFollowRelationship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //
        return [];
    }
}
