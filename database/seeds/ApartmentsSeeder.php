<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\User;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Apartment::class,100) -> make() -> each(function($apartment){

        $user = User::inRandomOrder() -> first();
        $apartment -> user() -> associate($user);
        $apartment -> save();

      });
    }
}
