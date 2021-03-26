<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Store;
use App\Models\Translation;
use App\Models\Book_store;

class BookController extends Controller
{
    public function store(StoreUpdateRequest $request)
    {
        //dd($request);
        $validated = $request->validated();
            $book = new Book;
            $book->name = $book->createTranslation($request->name);
            $book->author_id = $request->author_id;
            $book->publisher_id = $request->publisher_id;
            $book->image_id = ImageController::store($request);
            $book->price = $request->price;
            $book->save();
            $book->stores()->attach($request->store_id);
            // foreach($request->store_id as $strid){
            //     Book::find($book->id)->stores()->updateExistingPivot($strid, ['sales_amount' => rand(50,2000)]);
            // }
        return redirect('/');
    }
    public function indexView($view){
        $books = Book::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $stores = Store::all();
        $translations = Translation::all();
            return view($view, ['books' => $books,
                                'authors' => $authors,
                                'publishers' => $publishers,
                                'stores' => $stores,
                                'translations' => $translations]);
    }
    public function index(){
        // dd(Book::all());
        $books = Book::with(['author','publisher','stores','image'])->get();
        
        $languages = Translation::all();
        //return TranslationController::language();
        return view('welcome', ['books' => $books, 'languages' => $languages]);
    }
    public function destroy(Book $book){
        if($book){
            ImageController::destroy($book->image);
            $destroy = Book::destroy($book->id);
            if($destroy){
                return redirect()->back();
            }else{
                echo "Deleting was unsuccesfull";
            }
        }
    }
    public function edit(Book $book){
        $authors = Author::all();
        $publishers = Publisher::all();
        $stores = Store::all();
        return view('edit_book', ['book'=>$book, 'authors'=>$authors, 'publishers'=>$publishers,'stores' => $stores]);
    }
    public function update(Book $book, StoreUpdateRequest $request){
        $validated = $request->validated();
        $book->name = $book->addTranslation($request->name);
        $book->author_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->price = $request->price;
        if($request->hasFile('image')){
        $book->image_id = ImageController::store($request);
        }
        $book->save();
        $book->stores()->sync($request->store_id);
        foreach($request->store_id as $strid){
            Book::find($book->id)->stores()->updateExistingPivot($strid, ['sales_amount' => rand(50,2000)]);
        }
        \App\Events\PriceIsChanged::dispatch($book);
        return redirect('/');
    }
    public function salesDisplay($book,$store){
        $data['book'] = Book::whereId($book)->with(['orders.store','orders' => function($q){
            $q->selectRaw('store_id, sum(amount) as total_amount')
                ->groupBy('orders.store_id');
        }])->first();
        //dd($data);
        $ss = array();
        for($i = 0; $i < count($data['book']->orders); $i ++){
            $s = new Stat;
            $s->id = $i + 1;
            $s->order = $data['book']->orders[$i];
            $s->store = $data['book']->orders[$i]->store;
            $s->number = $data['book']->orders[$i]->total_amount;
            array_push($ss, $s);
        }
    if($store != 0){
        $store = Store::whereId($store)->with(['orders.books' => function($q) use ($book){
            $q->whereBookId($book);
        }])->get();
        //dd($store);
        $dates = array();
        for($i = 0; $i < count($store[0]->orders); $i ++){
            $time = $store[0]->orders[$i]->created_at;
            $date = new Date;
            
            $date->year = (int)$time->format('Y');
            $date->month = (int)$time->format('m');
            $date->day = (int)$time->format('d');
            $date->hour = (int)$time->format('H');
            $date->minutes = (int)$time->format('i');
            array_push($dates, $date);
            $date->amount = $store[0]->orders[$i]->books[0]->pivot->amount;
        }
        return view('stat-viewer', ['stats' => $ss, 'store' => $store[0], 'dates' => $dates]);
    }else{
        $store = null;
        return view('stat-viewer', ['stats' => $ss, 'store' => $store[0]]);
    }
    }
}
class Stat {
    public $id;
    public $order;
    public $store;
    public $number;
}
class Date {
    public $year;
    public $month;
    public $day;
    public $hour;
    public $minutes;
    public $amount;
}