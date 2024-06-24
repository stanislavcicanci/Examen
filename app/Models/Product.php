<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'img',
    ];
    
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($product) {
                $maxId = DB::table($product->getTable())->max('id');
                $product->id = $maxId ? $maxId + 1 : 1;
        });
    }
}
