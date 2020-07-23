<?php

use Illuminate\Database\Seeder;
use App\Photo;
use App\Apartment;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();
        foreach ($apartments as $apartment) {
            factory(Photo::class, 4)-> create([
            'apartment_id' => $apartment->id
          ]);
        }
    }
}
