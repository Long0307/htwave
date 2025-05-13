<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list awardsandcertifications']);
        Permission::create(['name' => 'view awardsandcertifications']);
        Permission::create(['name' => 'create awardsandcertifications']);
        Permission::create(['name' => 'update awardsandcertifications']);
        Permission::create(['name' => 'delete awardsandcertifications']);

        Permission::create(['name' => 'list banners']);
        Permission::create(['name' => 'view banners']);
        Permission::create(['name' => 'create banners']);
        Permission::create(['name' => 'update banners']);
        Permission::create(['name' => 'delete banners']);

        Permission::create(['name' => 'list contacts']);
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'update contacts']);
        Permission::create(['name' => 'delete contacts']);

        Permission::create(['name' => 'list inquiries']);
        Permission::create(['name' => 'view inquiries']);
        Permission::create(['name' => 'create inquiries']);
        Permission::create(['name' => 'update inquiries']);
        Permission::create(['name' => 'delete inquiries']);

        Permission::create(['name' => 'list solutions']);
        Permission::create(['name' => 'view solutions']);
        Permission::create(['name' => 'create solutions']);
        Permission::create(['name' => 'update solutions']);
        Permission::create(['name' => 'delete solutions']);

        Permission::create(['name' => 'list technologies']);
        Permission::create(['name' => 'view technologies']);
        Permission::create(['name' => 'create technologies']);
        Permission::create(['name' => 'update technologies']);
        Permission::create(['name' => 'delete technologies']);

        Permission::create(['name' => 'list technologycategories']);
        Permission::create(['name' => 'view technologycategories']);
        Permission::create(['name' => 'create technologycategories']);
        Permission::create(['name' => 'update technologycategories']);
        Permission::create(['name' => 'delete technologycategories']);

        Permission::create(['name' => 'list technologystatuses']);
        Permission::create(['name' => 'view technologystatuses']);
        Permission::create(['name' => 'create technologystatuses']);
        Permission::create(['name' => 'update technologystatuses']);
        Permission::create(['name' => 'delete technologystatuses']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
