<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id'
    ];

    public function books(){
        return $this->belongsToMany(Book::class, 'book_store')
                    ->withPivot('sales_amount');
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
