<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new \App\Role();
        $role_employee->rolenome = 'admin';
        $role_employee->designacao = 'Administrador';
        $role_employee->save();
        $role_employee = new \App\Role();
        $role_employee->rolenome = 'user';
        $role_employee->designacao = 'Conselheiro';
        $role_employee->save();
    }
}
