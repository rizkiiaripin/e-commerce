<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=> 'create-user']);
        Permission::create(['name'=> 'edit-user']);
        Permission::create(['name'=> 'delete-user']);
        Permission::create(['name'=> 'show-user']);

        Permission::create(['name'=> 'create-blog']);
        Permission::create(['name'=> 'edit-blog']);
        Permission::create(['name'=> 'delete-blog']);
        Permission::create(['name'=> 'show-blog']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);
        
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('create-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');
        $roleAdmin->givePermissionTo('show-user');

        $roleWriter = Role::findByName('writer');
        $roleWriter->givePermissionTo('create-blog');
        $roleWriter->givePermissionTo('edit-blog');
        $roleWriter->givePermissionTo('delete-blog');
        $roleWriter->givePermissionTo('show-blog');

    }
}
