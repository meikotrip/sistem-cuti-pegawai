<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =  [
            [
                'name'=>'Meiko Karyawan',
                'email' => 'meikokaryawan@gmail.com',
                'role' => 'karyawan',
                'password' => bcrypt('123456'),
            ],
            [
                'name'=>'Meiko Ketua Departemen',
                'email' => 'meikokadepartemen@gmail.com',
                'role' => 'kadepartemen',
                'password' => bcrypt('123456'),
            ],
            [
                'name'=>'Meiko Ketua HRD',
                'email' => 'meikokahrd@gmail.com',
                'role' => 'kahrd',
                'password' => bcrypt('123456'),
            ]
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
