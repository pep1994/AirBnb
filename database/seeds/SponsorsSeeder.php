<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use App\Apartment;

class SponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $apartments = Apartment::all();

      factory(Sponsor::class,3) -> create();

      $apartments = Apartment::take(5) -> get();
      foreach ($apartments as $apartment) {
        $sponsors = Sponsor::inRandomOrder() -> take(rand(1,3)) -> get();
        $apartment -> sponsors() -> attach($sponsors);
      }
    }
}
