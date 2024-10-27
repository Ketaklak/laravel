<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Player extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = ['name', 'email', 'password', 'level', 'experience'];

    public function resources()
    {
        return $this->hasOne(Resource::class);
    }

    public function armies()
    {
        return $this->hasMany(Army::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function alliances()
    {
        return $this->belongsToMany(Alliance::class, 'alliance_player');
    }

    public function ledAlliances()
    {
        return $this->hasMany(Alliance::class, 'leader_id');
    }
}
