<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainsTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_csv = fopen(__DIR__ . '/trains.csv', 'r');
        $i = 0;

        while (($row = fgetcsv($data_csv)) !== false) {
            if ($i > 0) {
                $new_train = new Train();
                $new_train->company = $row[0];
                $new_train->code = $row[5];
                $new_train->slug = $this->generateSlug($new_train->company, $new_train->code);
                $new_train->departure_station = $row[1];
                $new_train->arrival_station =  $row[2];
                $new_train->departure_time = $row[3];
                $new_train->arrival_time = $row[4];
                $new_train->wagons = $row[6];
                $new_train->is_on_time = $row[7];
                $new_train->is_cancelled = $row[8];
                $new_train->save();
            }
            $i++;
        }
        fclose($data_csv);
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
