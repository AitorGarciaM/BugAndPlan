<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions.
        /* Issue permissions. */
        $permission = Permission::create(['name' => 'add issue report']);
        $permission = Permission::create(['name' => 'edit issue report']);
        $permission = Permission::create(['name' => 'delete issue report']);
        /* User Permissions. */       
        $permission = Permission::create(['name' => 'add user']);
        $permission = Permission::create(['name' => 'edit user']);
        $permission = Permission::create(['name' => 'delete user']);

        // Roles.
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
        $dev = Role::create(['name' => 'developer']);
        $dev->givePermissionTo('edit issue report');
        $dev->givePermissionTo('delete issue report');
        $dev->givePermissionTo('add issue report');
        $qa = Role::create(['name' => 'QA']);
        $qa->givePermissionTo('add issue report');
    }
}
