<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AboutContent extends Model
{
    use HasFactory;

    public function scopeGetBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('route', $slug);
    }
}
