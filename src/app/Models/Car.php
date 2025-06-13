<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'condition',
        'transmission',
        'drive_type',
        'year',
        'mpg',
        'miles',
        'price',
        'pictures'
    ];

    protected $casts = [
        'pictures' => 'array',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc("created_at");
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters["condition"] ?? false,
            fn($query, $value) => $query->where("condition", $value)
        )->when(
            $filters["priceFrom"] ?? false,
            fn($query, $value) => $query->where("price", ">=", $value)
        )->when(
            $filters["priceTo"] ?? false,
            fn($query, $value) => $query->where("price", "<=", $value)
        );


        // "priceFrom", "priceTo", "transmission", "driveType", "miFrom", "miTo"
    }
}
