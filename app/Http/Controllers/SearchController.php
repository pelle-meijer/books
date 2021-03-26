<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Store;

class SearchController extends Controller
{
    public function search(Request $request){
        $authors = Author::where('name', 'LIKE', $request->q . '%')->get();
        $publishers = Publisher::where('name', 'LIKE', $request->q . '%')->get();
        //$books = Book::where('searchName', 'LIKE','%' . $request->q . '%')->get();
        $books = Book::all();
        $bs = array();
        foreach($books as $book){
            if($book->searchName(strtolower($request->q))){
                array_push($bs,$book);
            }
        }
        $stores = Store::where('name', 'LIKE', $request->q . '%')->get();
        return response()->json(view('searchResults',  ['authors' => $authors,
                                                        'publishers' => $publishers,
                                                        'books' => $bs,
                                                        'stores' => $stores])->render());
    }
    
}