<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Create default roles */
        $role = Role::firstOrCreate(['name' => 'Super Admin']);
        $role = Role::firstOrCreate(['name' => 'Manager']);
        $role = Role::firstOrCreate(['name' => 'Admin']);


        //Create Default User
        $user = User::firstOrCreate([
        	'name' => 'admin',
        	'email' => 'admin@noemail.com',
        	'password' => Hash::make('123456'),
        	'is_active' => 1
        ]);

        $user->assignRole('Admin');
    }
}
