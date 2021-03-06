<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book_store;
use App\Http\Controllers\ImageController;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'publisher_id',
        'image_id',
        'translated_name',
        'price'
    ];

    protected $appends = ['translated_name'];

    public function create($request){
        $book = new Book;
            $book->name = $book->createTranslation($request->name);
            $book->author_id = $request->author_id;
            $book->publisher_id = $request->publisher_id;
            $book->image_id = ImageController::store($request);
            $book->price = $request->price;
            $book->save();
            $book->stores()->attach($request->store_id);
            $book->genres()->attach($request->genre_id);
            \App\Events\BookIsCreated::dispatch(
                        Book::with([
                            'author',
                            'publisher',
                            'stores',
                            'genres',
                            'image'
                            ])->get()->find($book->id));
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function stores(){
        return $this->belongsToMany(Store::class, 'book_store')
                    ->withPivot('sales_amount');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
    public function orders(){
        return $this->belongsToMany(Order::class, 'book_order')
                    ->withTimestamps()
                    ->withPivot(
                        'amount',
                        'created_at'
                    );
    }
    public function getTranslatedNameAttribute(){
        $arr = json_decode($this->original['name'], true);
        $l = session('language', "4");
        return $this->attributes['translated_name'] = !array_key_exists($l,$arr) ? 
                reset($arr) :
                $arr[$l];
    } 
    public function getName(){
        $arr = json_decode($this->original['name'], true);
        $l = session('language', "4");
        return  !array_key_exists($l,$arr) ? 
                reset($arr) :
                $arr[$l];
    }
    public function searchName($search){
        $arr = json_decode($this->original['name'], true);
        foreach($arr as $r){
            if(str_starts_with(strtolower($r), $search)){
                return true;
            }
        }
        return false;
    }
    public function createTranslation($name){
        $arr = array();
        $arr[session('language', '4')] = $name;
        return json_encode($arr);
    }
    public function addTranslation($name){
        $arr = (array)json_decode($this->original['name']);
        $arr[session('language', '4')] = $name;
        return json_encode($arr);
    }
}
