<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // $faker->addProvider(new \Faker\Provider\it_IT\Address($faker));

        for ($i = 0; $i < 50; $i++) {
            $new_train = new Train();
            $new_train->company = $faker->randomElement(['Italo', 'Trenitalia', 'Trenord', 'Busitalia Sita', 'Grandi Treni Espressi']);
            $new_train->code = $faker->randomLetter() . $faker->randomLetter() . $faker->randomNumber(3, true);
            $new_train->slug = $this->generateSlug($new_train->company, $new_train->code);
            $new_train->departure_station = $faker->city();
            $new_train->arrival_station =  $faker->city();
            $new_train->departure_time = $faker->time();
            $new_train->arrival_time = $faker->time();
            $new_train->wagons = $faker->numberBetween(1, 20);
            $new_train->description = $faker->paragraph();
            $new_train->save();
        }
    }

    private function generateSlug($company_name, $code_name)
    {
        $slug = Str::slug($company_name, '-') . '-' . Str::slug($code_name, '-');
        $original_slug = $slug;

        $exists = Train::where('slug', $slug)->first();
        $counter = 1;

        while ($exists) {
            $slug = $original_slug . '-' . $counter;
            $exists = Train::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
