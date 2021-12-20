<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\SecurityFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);

        User::factory(10)->create()->each(function ($user,$key) {
            $user->username='s'.str_pad(($key+1), 2, '0', STR_PAD_LEFT);
            $user->update();
        });
    ;
    }
}
