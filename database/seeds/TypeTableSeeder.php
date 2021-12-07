<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('types')->insert([
           'name' => '食品'
       ]);

        DB::table('types')->insert([
        'name' => '飲料'
        ]);

        DB::table('types')->insert([
            'name' => '日用品'
        ]);
 
        DB::table('types')->insert([
         'name' => '楽器'
         ]);
    }
}
