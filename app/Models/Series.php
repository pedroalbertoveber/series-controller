<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function seasons() {
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted() {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }
}
