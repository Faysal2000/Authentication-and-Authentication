<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'add_doctor',
            'show_doctor',
            'edit_doctor',
            'delete_doctor',
        ];

        foreach ($permissions as $permission) {

            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }
    }
}