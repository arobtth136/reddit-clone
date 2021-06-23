<?php

use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert([
            0 => array(
                'user_id' => 1,
                'name' => 'Chemsificadores',
                'icon' => 'https://photos.app.goo.gl/Vg36WmWwipVnboit6',
                'group_pick' => 'https://photos.app.goo.gl/uELuoTk2YNacDZCm8'),
            1 => array(
                'user_id' => 1,
                'name' => 'Furbol',
                'icon' => 'https://photos.app.goo.gl/Uwy8e7GsN8jPjh3Y6',
                'group_pick' => 'https://photos.app.goo.gl/D6V4W3SNxExgmoVBA')
        ]);
    }
}
