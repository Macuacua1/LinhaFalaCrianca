<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = \App\Role::where('rolenome', 'admin')->first();
        $role_user  = \App\Role::where('rolenome', 'user')->first();
        $employee = new \App\User();
        $employee->nome = 'Mario';
        $employee->avatar = 'default';
        $employee->email = 'mariocarlitosmacuacua@gmail.com';
        $employee->password = bcrypt('Macuacua1');
        $employee->save();
        $employee->role()->attach($role_admin);
        $employee = new \App\User();
        $employee->nome = 'Maria';
        $employee->avatar = 'default';
        $employee->email = 'maria@gmail.com';
        $employee->password = bcrypt('123456');
        $employee->save();
        $employee->role()->attach($role_user);
    }
}
