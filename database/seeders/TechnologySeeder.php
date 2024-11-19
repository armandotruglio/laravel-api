<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                "name" => "JavaScript",
                "color" => "yellow"
            ],
            [
                "name" => "PHP",
                "color" => "dark-blue"
            ],
            [
                "name" => "HTML",
                "color" => "orange"
            ],
            [
                "name" => "CSS",
                "color" => "blue"
            ],
            [
                "name" => "Vue",
                "color" => "green"
            ],
            [
                "name" => "SQL",
                "color" => "red"
            ],
        ];

        foreach($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology["name"];
            $newTechnology->color = $technology["color"];
            $newTechnology->save();
        }
    }
}