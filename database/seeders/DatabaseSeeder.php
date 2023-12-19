<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use \App\Traits\ConsoleEcho;

    private function seedModel(string $modelClass, int $count, string $message): void
    {
        $this->executeWithLogging($message, function () use ($modelClass, $count) {
            $modelFactory = resolve($modelClass)::factory();

            if ($modelFactory instanceof Factory) {
                $modelFactory->count($count)->create();
            }
        });
    }

    private function seedModelHas(string $modelClass, int $count, string $hasClass, int $hasCount, string $message): void
    {
        $this->executeWithLogging($message, function () use ($modelClass, $count, $hasClass, $hasCount) {
            $modelFactory = resolve($modelClass)::factory();
            $modelFactoryHas = resolve($hasClass)::factory();

            if ($modelFactory instanceof Factory && $modelFactoryHas instanceof Factory) {
                $modelFactory->has($modelFactoryHas->count($hasCount))
                    ->count($count)
                    ->create();
            }
        });
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedModel(\App\Models\AboutContent::class, 1, 'about-content');
    }
}
