<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'categorie-list',
            'categorie-create',
            'categorie-edit',
            'categorie-delete',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'theme_course-list',
            'theme_course-create',
            'theme_course-edit',
            'theme_course-delete'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
        }
    }
}
