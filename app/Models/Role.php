<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['role'];

    public function getUserRoleById(int $uid) {
        $response = $this::join('user_roles', 'user_roles.rid', 'roles.id')
            ->where('user_roles.uid','=', $uid)
            ->pluck('roles.role')
            ->toArray();

        return implode(',', $response);
    }

    public function getRoles() {
        $response = $this::pluck('role')->all();

        return $response;
    }
}
