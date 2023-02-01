<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Series;
use App\Models\Episode;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'series_id'];

    public function series() {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function episodes() {
        return $this->hasMany(Episode::class, 'season_id');
    }

    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes
            ->filter(fn($episode) => $episode->watched)->count();
    }
}
