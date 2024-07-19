<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }

    public function codeProduct(): Attribute {
        return new Attribute (
            get: fn($value) => strtoupper($value),
            set: fn ($value) => strtolower($value),
        );
    }

    public function name(): Attribute {
        return new Attribute (
            get: fn($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }
}
