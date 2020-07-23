<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UsersSeeder::class,
          ApartmentsSeeder::class,
          PhotosSeeder::class,
          MessagesSeeder::class,
          OptionalsSeeder::class,
          SponsorsSeeder::class,
          ViewsSeeder::class,
          PreferencesSeeder::class
        ]);
    }
}
