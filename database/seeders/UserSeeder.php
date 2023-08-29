<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $user = User::create([
            'name' => 'Lab Dev',
            'email' => 'lab@satech.mx',
            'password' => Hash::make('mp-rs@1234'),
            'remember_token' => null,
        ]);

        $user->assignRole('Administrador');
    }
}
