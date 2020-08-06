<?php

use Illuminate\Database\Seeder;

class PatientDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\PatientDetails', 50)->create();

    }
}
