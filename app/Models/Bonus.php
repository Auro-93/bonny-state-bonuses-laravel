<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 
        'category_id', 
        'quantity_sold', 
        'sold_at', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
