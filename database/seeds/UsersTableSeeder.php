<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Dipendra Khadka',
                'email'=>'kdipendra642@gmail.com',
                'password'=>bcrypt('Dipendra@123'),
            ]);
    }
}
