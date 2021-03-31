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
    public function store(Request $request){
        //$validated = $request->validated();
        $author = new Author;
        $author->name = $request->name;
        $author->save();
        return redirect('/');
    }
    public function show(Author $author){
        return view('show/showAuthor', ['author' => $author]);
    }
    public function destroy(Author $author){
        $author->deleteModel();
        return redirect('/');
    }
    public function edit(Author $author){
        return view('edit/edit_author', ['author' => $author]);
    }
    public function update(Author $author, StoreUpdateRequest $request){
        $validated = $request->validated();
        $author->name = $request->name;
        $author->save();
        return redirect('/');
    }
}
