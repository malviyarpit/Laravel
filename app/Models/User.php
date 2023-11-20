<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getUserWithRoles() {
        $data = $this::select('id', 'name', 'email')->get();

        foreach ($data as $key => $value) {
            $roleModel = new Role();
            $value->roles = $roleModel->getUserRoleById($value->id);
        }

        return $data;
    }

    public function getuserById($id) {
        $data = $this::where('id', $id)->select('id', 'name', 'email')->first();

        $roleModel = new Role();
        $data->roles = $roleModel->getUserRoleById($data->id);

        return $data;
    }    

    public function assignRole($roles, $uid) {
        foreach ($roles as $role) {
            DB::table('user_roles')->insert([
                'rid' => $role,
                'uid' => $uid,
            ]);
        }
    }
}
