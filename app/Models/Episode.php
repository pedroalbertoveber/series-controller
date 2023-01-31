<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'season_id'];

    public function seasons() {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public $timestamps = false;
}
