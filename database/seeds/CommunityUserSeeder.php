<?php

use Illuminate\Database\Seeder;

class CommunityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_user')->insert([
            0 => array(
                'user_id' => 1,
                'community_id' => 1
            ),
            1 => array(
                'user_id' => 1,
                'community_id' => 2
            )
        ]);
    }
}
