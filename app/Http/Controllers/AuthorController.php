<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        return $authors;
    }
    public function store(StoreUpdateRequest $request){
        //$validated = $request->validated();
        $author = new Author;
        $author->name = $request->name;
        $author->save();
        return redirect('/');
    }
    public function show(Author $author){
        return view('showAuthor', ['author' => $author]);
    }
    public function destroy(Author $author){
        if($author){
            foreach($author->books as $book){
                $destroy = Book::destroy($book->id);
            }
            $destroy = Author::destroy($author->id);
            return redirect('/');
        }
    }
    public function edit(Author $author){
        return view('edit_author', ['author' => $author]);
    }
    public function update(Author $author, StoreUpdateRequest $request){
        $validated = $request->validated();
        $author->name = $request->name;
        $author->save();
        return redirect('/');
    }
}
