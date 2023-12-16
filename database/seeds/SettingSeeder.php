<?php

use App\Setting as Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Setting::create([
            'email' => 'joaovieira@gmail.com',
            'spainInsurance' => 25,
            'gps' => 30,
            'extraDriver' => 20,
            'todlerSeat' => 25,
            'infantSeat' => 25,
            'boosterSeat' => 25,
        ]);
    }
}
