<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function store(Request $request){
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
        return redirect('/');
    }
}