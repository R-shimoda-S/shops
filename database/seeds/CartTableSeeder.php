<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=2;$i++) {
            DB::table('carts')->insert([
            'id' => $i,
            'stock_id' => $i,
            'user_id'=> $i,
        ]);
        }
    }
}
