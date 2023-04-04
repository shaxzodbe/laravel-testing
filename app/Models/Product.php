<?php

namespace App\Models;

use App\Services\CurrencyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function getPriceEurAttribute(): float
    {
        return (new CurrencyService())->convert($this->price, 'usd', 'eur');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
