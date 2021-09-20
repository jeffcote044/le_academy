<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://vimeo.com/451355071',
            'duration' => '360',
            'iframe' => '<iframe src="https://player.vimeo.com/video/451355071" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>',
            'platform_id' => 1
        ];
    }
}
