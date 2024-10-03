<?php

namespace Brahim872\UserPermission\Models;

use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'category',
        'updated_at',
        'created_at',
    ];
}
