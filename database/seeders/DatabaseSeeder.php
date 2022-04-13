<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'lesson-list',
            'lesson-create',
            'lesson-edit',
            'lesson-delete'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
        
    }
}
