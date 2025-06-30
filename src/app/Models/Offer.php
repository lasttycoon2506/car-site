<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "accepted_at",
        "declined_at"
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, "car_id");
    }

    public function bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, "bidder_id");
    }

    public function scopeByMe(Builder $query): Builder
    {
        return $query->where("bidder_id", Auth::user()?->id);
    }

    public function scopeExcept(Builder $query, Offer $offer): Builder
    {
        return $query->where("id", "!=", $offer->id);
    }
}
