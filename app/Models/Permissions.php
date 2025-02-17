<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'permissions';
    protected $fillable = ['permission'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
