<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        'name',
        'email',
        'password',
        'isAdmin',
        */
        User::create(['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('123456789'),'isAdmin'=>true]);
        User::create(['name'=>'notAdmin','email'=>'notadmin@gmail.com','password'=>Hash::make('123456789'),'isAdmin'=>false]);
        User::create(['name'=>'admin2','email'=>'admin2@gmail.com','password'=>Hash::make('123456789'),'isAdmin'=>true]);
    }

}
