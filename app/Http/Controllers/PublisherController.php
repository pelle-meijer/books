<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Publisher;
use App\Models\Book;

class PublisherController extends Controller
{
    public function store(StoreUpdateRequest $request){
        //$validated = $request->validated();
        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->save();
        return redirect('/');
    }

    public function show(Publisher $publisher){
        return view('showPublisher', ['publisher' => $publisher]);
    }
    public function destroy(Publisher $publisher){
        if($publisher){
            foreach($publisher->books as $book){
                $destroy = Book::destroy($book->id);
            }
            $destroy = Publisher::destroy($publisher->id);
            return redirect('/');
        }
    }
    public function edit(Publisher $publisher){
        return view('edit_publisher', ['publisher' => $publisher]);
    }
    public function update(Publisher $publisher, StoreUpdateRequest $request){
        $validated = $request->validated();
        $publisher->name = $request->name;
        $publisher->save();
        return redirect('/');
    }
}
