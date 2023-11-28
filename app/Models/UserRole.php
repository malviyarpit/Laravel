<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    protected $fillable = ['rid', 'uid'];

    public function getUserRole($id) {
        $response = $this::join('roles', 'roles.id', 'user_roles.rid')
            ->where('user_roles.uid', $id)
            ->pluck('roles.role')
            ->toArray();

        return $response;
    }
}
