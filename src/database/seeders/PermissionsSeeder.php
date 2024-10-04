<?php

namespace Brahim872\UserPermission\Database\Seeders;


use Brahim872\UserPermission\Models\Permission;
use Brahim872\UserPermission\Models\Role;
use Illuminate\Database\Seeder;


class PermissionsSeeder extends Seeder
{

    protected $accessList = [];
    protected $info = [];

    protected $permissions;

    public function __construct()
    {
        $this->permissions =   [
            [
                'name' => 'permission',
                'category' => 'permission',
                'access' => [
                    "super-admin" => ["read", "create", "delete"],
                ]
            ],
            [
                'name' => 'role',
                'category' => 'permission',
                'access' => [
                    "super-admin" => ["read", "create", "delete"],
                ]
            ],
            [
                'name' => 'company',
                'category' => 'company',
                'access' => [
                    "super-admin" => ["read", "create", "delete"],
                ]
            ],
            [
                'name' => 'user',
                'category' => 'user',
                'access' => [
                    "super-admin" => ["read", "create", "delete"],
                    "company" => ["read", "create", "delete"],
                ]
            ],
        ];
    }


    public function run()
    {
        Permission::query()->delete();
        $this->info['name'] = '';
        $p = 1;
        $a = [];
        foreach ($this->permissions as $data) {

            foreach ($data['access'] as $key => $access) {


                foreach ($access as $index => $permission) {
                    $a[$index] = $data['name'] . '.' . $permission;
                    if (Permission::where('name', '=', $data['name'] . '.' . $permission)->count() == 0) {

                        $this->info['id'] = $p;
                        $this->info['name'] = $data['name'] . '.' . $permission;
                        $this->info['guard_name'] = 'web';
                        $this->info['category'] = $data['category'];

                        Permission::updateOrCreate(['name' => $data['name'] . '.' . $permission], $this->info);
                        $p++;
                    }
                }

                $this->accessList[$key] = $a;
            }

            $this->rolePermission($this->accessList);
        }

    }

    private function rolePermission(array $accessList)
    {
        foreach ($accessList as $role => $permission) {
            if ($r = Role::where('name', '=', $role)->first()) {
                $r->givePermissionTo($permission);
            }
        }
    }


}
