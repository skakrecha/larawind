<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'IIJS Admin',
            'username'=>'admin',
            'email'=>'admin@iijs.com',
            'password'=> bcrypt('secret123')
        ]);

        $user->assignRole('super');
    }
}
