<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck("id");

        for($i=0; $i<20; $i++){
            $project = new Project();
            $project->type_id = $faker->randomElement($typeIds);
            $project->title = $faker->sentence();
            $project->description = $faker->paragraph();
            $project->date = $faker->date();
            $project->save();
        }
    }
}
