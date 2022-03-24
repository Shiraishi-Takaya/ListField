<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $taskName = [
            'HDDを買い直す',
            '食材買う',
            '通院',
            'メール送信',
            '講演会',
            '定例報告',
            '食事は1日2000kcalまで！',
            '3月の目標→記事を20本書く',
            '来月までに買うもの：プリンター・机・夏用毛布',
            'タイムカード押すの忘れない'
        ];

        return [
            'user_id' => User::factory(),
            'title' => $this->faker->randomElement($taskName),
            'description' => '詳細詳細詳細',
            'date' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'time' => $this->faker->time(),
            'is_done' => false,
            'x_position' => 0,
            'y_position' => 2,
            'width' => 4,
            'height' => 4,
            'color' => 0
        ];
    }
}
