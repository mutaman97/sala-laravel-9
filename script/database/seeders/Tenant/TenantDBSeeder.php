<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class TenantDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = User::$seller_roles;
        $now = now();

        $superData = [
            'role_id' => 3,
            'name' => Session::get('store_data')['store_name'] ?? 'Store Owner',
            'email' => Session::get('store_data')['email'] ?? 'store@sala.sd',
            'password' => Hash::make(Session::get('store_data')['password'] ?? '12345678'),
            'permissions' => json_encode($roles),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $super = User::create($superData);

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);

        // Create permissions
        $permissions = [
            'dashboard' => 'dashboard',
        ];

        foreach ($permissions as $groupName => $permissionName) {
            $permission = Permission::create(['name' => $permissionName, 'group_name' => $groupName]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
            $super->assignRole($roleSuperAdmin);
        }

        $names = [
            'عبد الله عمر',
            'محمد حسين',
            'أحمد عبد الرحمن',
            'علي أمجد',
            'فاطمة محمود',
            'أميرة سيد أحمد',
            'نور الدين كامل',
            'ليان كمال الدين',
            'سارة عبد اللطيف',
            'ياسين خالد',
        ];

        $users = [];

        for ($i = 1; $i <= 5; $i++) {
            $users[] = [
                'name' => $names[$i % 10],
                'role_id' => 4,
                'permissions' => null,
                'status' => 1,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('passffword' . mt_rand(0, 50) . 'asass'), // Set password as desired
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        User::insert($users);
    }
}
