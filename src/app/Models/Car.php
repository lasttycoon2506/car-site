<?php

namespace App\Models;

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
}
