<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            0 => array(
                'name' => 'Rafael Zamora',
                'username' => 'Panvaso8k',
                'email' => 'correo@correo.com',
                'password' => Hash::make('123'),
                'profile_pick' => 'https://photos.app.goo.gl/5WfcqZzXF9i91obv7')
        ]);
    }
}
