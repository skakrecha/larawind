<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name'=>'super',
                'guard_name'=>'web'
            ],
            [
                'name'=>'admin',
                'guard_name'=>'web'
            ],
            [
                'name'=>'security',
                'guard_name'=>'web'
            ],
            [
                'name'=>'employee',
                'guard_name'=>'web'
            ],
        ]);
    }
}
