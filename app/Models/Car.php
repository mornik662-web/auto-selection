<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'body_type', 'description', 'release_date', 'image_path',
    ];

    protected function releaseDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value) : null,
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => trim($value),
        );
    }

    protected function bodyType(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1),
            set: fn ($value) => mb_strtolower(trim($value)),
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image_path
                ? asset('storage/' . $this->image_path)
                : asset('images/placeholder.svg'),
        );
    }
}