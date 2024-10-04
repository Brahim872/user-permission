<?php

namespace Brahim872\UserPermission\Database\Seeders;


use Brahim872\UserPermission\Models\Role;
use Illuminate\Database\Seeder;


class RolesSeeder extends Seeder
{


    protected $roles;

    public function __construct()
    {
        $this->roles = [
            ["id" => 1, "name" => "super-admin"],
            ["id" => 2, "name" => "company"],

        ];
    }


    public function run()
    {
        Role::query()->delete();

        foreach ($this->roles as $index => $role) {

            Role::create(
                [
                    'id' => $role['id'],
                    'name' => $role['name']
                ]
            );
        }
    }
}
