<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id'
    ];

    public function books(){
        return $this->belongsToMany(Book::class,'book_order')
                    ->withTimestamps()
                    ->withPivot(
                        'amount', 
                        'created_at'
                    );
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
