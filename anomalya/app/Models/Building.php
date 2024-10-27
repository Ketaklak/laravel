<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'type', 'level', 'production_rate', 'capacity'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
