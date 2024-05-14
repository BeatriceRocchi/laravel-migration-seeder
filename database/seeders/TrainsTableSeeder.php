<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_train = new Train();
        $new_train->company = 'Italo';
        $new_train->code = 'MI345';
        $new_train->slug = 'italo-mi345';
        $new_train->departure_station = 'Milano Centrale';
        $new_train->arrival_station = 'Roma Termini';
        $new_train->departure_time = '10:30:00';
        $new_train->arrival_time = '12:30:00';
        $new_train->wagons = 12;
        $new_train->save();
    }
}
