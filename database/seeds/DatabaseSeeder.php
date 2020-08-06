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
        $this->call([UsersTableSeeder::class]);
        $this->call([PatientsSeeder::class]);
        $this->call([PatientDetailsSeeder::class]);
        $this->call([EventsSeeder::class]);
    }
}
