<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert
        ([
            [
                'id' => 1,
                'name' => 'Administrador',
                'guard_name' => 'web',
                'created_at' => '2023-08-23 09:18:21',
                'updated_at' => '2023-08-23 09:18:21',
            ],
            [
                'id' => 2,
                'name' => 'Vendedor',
                'guard_name' => 'web',
                'created_at' => '2023-08-23 09:18:21',
                'updated_at' => '2023-08-23 09:18:21',
            ],
            [
                'id' => 3,
                'name' => 'Facturador',
                'guard_name' => 'web',
                'created_at' => '2023-08-23 09:18:21',
                'updated_at' => '2023-08-23 09:18:21',
            ],
        ]);
    }
}
