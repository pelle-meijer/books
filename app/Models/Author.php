<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TranslationController;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function deleteModel(){
        foreach($this->books as $book){
            $destroy = Book::destroy($book->id);
        }
        $destroy = $this->delete();
    }
}
