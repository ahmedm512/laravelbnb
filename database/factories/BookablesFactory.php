<?php

namespace Database\Factories;

use App\Models\Bookables;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookablesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookables::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {        $suffix = [
        'Villa',
        'House',
        'Cottage',
        'Luxury Villas',
        'Cheap House',
        'Rooms',
        'Cheap Rooms',
        'Luxury Rooms',
        'Fancy Rooms'
    ];
        return [
        'title' => $this->faker->city . ' ' . Arr::random($suffix),
        'description' => $this->faker->text(),
        'price' => random_int(15, 600)
        ];
    }
}