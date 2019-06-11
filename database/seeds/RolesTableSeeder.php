<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
           'admin',
           'user',
           'commenter',
           'moderator',
        ];


        foreach ($roles as $role) {
             Role::create(['name' => $role]);
        }
    }
}
