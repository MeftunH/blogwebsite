<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'Maftun Hashimli',
             'email'=>'meftun.yos@mail.ru',
             'password'=>bcrypt(102030),
        ]);
    }
}
