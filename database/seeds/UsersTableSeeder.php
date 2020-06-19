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
        $user=App\User::create([
            'first_name'=>'super',
            'last_name'=>'admin',
            'email'=>'Admin@app.com',
            'password'=>bcrypt('123456')
        ]);
        $user->attachRole('Admin');
    }
}
