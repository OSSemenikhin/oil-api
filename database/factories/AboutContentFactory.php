<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutContent>
 */
class AboutContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = '<div class="content">';
        $content .= '<h2>' . fake()->words(3, true) . '</h2>';
        $content .= '<p>' . fake()->paragraph(40, true) . '</p>';
        $content .= '<ul>';
        for($i = 0; $i < rand(3, 7); $i++) {
            $content .= '<li>' . fake()->words(rand(1, 4), true) . '</li>';
        }
        $content .= '</ul>';
        $content .= '<p>' . fake()->paragraph(40, true) . '</p>';
        $content .= '</div>';

        return [
            'route' => 'us',
            'menu' => 'О нас',
            'topBar' => true,
            'content' => $content,
        ];
    }
}
