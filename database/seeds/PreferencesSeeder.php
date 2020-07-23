<?php
use Illuminate\Database\Seeder;
use App\Preference;
use App\Apartment;
class PreferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Preference::class, 30) -> make() -> each(function($preferences){
        $apartment = Apartment::inRandomOrder() -> first();
        $preferences -> apartment() -> associate($apartment);
        $preferences -> save();
      });
    }
}
