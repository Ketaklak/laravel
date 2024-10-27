<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'leader_id'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'alliance_player');
    }

    public function leader()
    {
        return $this->belongsTo(Player::class, 'leader_id');
    }
}
