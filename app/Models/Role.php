<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'role_name',
        'role_slug',
        'permission_id',
        'role_id'
    ];
    public function setCategoryAttribute($value)
    {
        $this->attributes['permission_id'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['permission_id'] = json_decode($value);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'users_roles');
    }
}
