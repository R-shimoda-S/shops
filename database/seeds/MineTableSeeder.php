<?php

use Illuminate\Database\Seeder;

class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mine')->insert([
            'name' => 'simoda',
            'age' => '27',
        ]);
    }
}
