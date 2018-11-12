<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Taz',
            'email' => 't@g.com',
            'password' => bcrypt('123456'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/taz.jpg',
            'about' => 'I am Taz',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
