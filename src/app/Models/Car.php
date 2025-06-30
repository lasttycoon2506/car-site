<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return $query->orderByDesc("created_at");
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, "car_id");
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
        )->when(
            $filters["transmission"] ?? false,
            fn($query, $value) => $query->where("transmission", $value)
        )->when(
            $filters["driveType"] ?? false,
            fn($query, $value) => $query->where("drive_type", $value)
        )->when(
            $filters["miFrom"] ?? false,
            fn($query, $value) => $query->where("miles", ">=", $value)
        )->when(
            $filters["miTo"] ?? false,
            fn($query, $value) => $query->where("miles", "<=", $value)
        )
        ;
    }

    public function scopeWithoutSold(Builder $query): Builder
    {
        return $query->whereNull("sold_at");
    }
}
