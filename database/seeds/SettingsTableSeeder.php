<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => "Taz's Blog",
            'address' => 'Dhaka, Bangladesh',
            'contact_number' => '+880123456',
            'contact_email' => 't@g.com'
        ]);
    }
}
