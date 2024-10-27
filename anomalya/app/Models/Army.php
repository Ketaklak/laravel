<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'soldiers', 'archers', 'cavalry', 'siege_engines', 'experience'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
