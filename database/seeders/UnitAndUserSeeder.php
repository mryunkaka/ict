<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UnitAndUserSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            'EAS',
            'KAM 1',
            'KAM 2',
            'KAM 3',
            'MSAM 1',
            'MSAM 2',
            'MSAM 3',
            'THM',
            'HPJ',
            'JAR 1',
            'JAR 2',
            'JI',
            'PG 1',
            'PG 2',
            'PG 3',
        ];

        foreach ($units as $unitName) {
            $unit = Unit::create([
                'nama_unit' => strtoupper($unitName),
                'logo' => null, // Atur jika ada default logo
            ]);

            // Khusus unit EAS → manager & asmen
            if ($unitName === 'EAS') {
                User::create([
                    'name' => 'Manager EAS',
                    'email' => 'manager.eas@example.com',
                    'username' => 'mgr.eas',
                    'password' => Hash::make('password'),
                    'jabatan_user' => 'Manager',
                    'role' => 'manager',
                    'status_user' => 'aktif',
                    'id_unit' => $unit->id_unit,
                ]);

                User::create([
                    'name' => 'Asmen EAS',
                    'email' => 'asmen.eas@example.com',
                    'username' => 'asmen.eas',
                    'password' => Hash::make('password'),
                    'jabatan_user' => 'Asmen',
                    'role' => 'asmen',
                    'status_user' => 'aktif',
                    'id_unit' => $unit->id_unit,
                ]);
            } else {
                // Semua unit lain → admin & staff
                $slug = strtolower(str_replace([' ', '-'], '', $unitName));

                User::create([
                    'name' => "Admin $unitName",
                    'email' => "admin.$slug@example.com",
                    'username' => 'admin.' . $slug,
                    'password' => Hash::make('password'),
                    'jabatan_user' => 'Admin',
                    'role' => 'admin',
                    'status_user' => 'aktif',
                    'id_unit' => $unit->id_unit,
                ]);

                User::create([
                    'name' => "Staff $unitName",
                    'email' => "staff.$slug@example.com",
                    'username' => 'staff.' . $slug,
                    'password' => Hash::make('password'),
                    'jabatan_user' => 'Staff',
                    'role' => 'staff',
                    'status_user' => 'aktif',
                    'id_unit' => $unit->id_unit,
                ]);
            }
        }
    }
}
