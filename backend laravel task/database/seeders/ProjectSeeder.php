<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (User::all() as $user) {
            for ($i = 0; $i < 5; $i++) {
                Project::create([
                    'user_id' => $user->id,
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph

                ]);
            }
        }
    }
}
