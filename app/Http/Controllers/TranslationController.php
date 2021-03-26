<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use App\Http\Controllers\ImageController;
use App\Models\Book;

class TranslationController extends Controller
{
    public function translate($models){
        
        $books = [];
        foreach($models as $model) {
            $book = [];

            $arr = json_decode($model->name, true);
            $l = session('language', "4");
            if(!array_key_exists($l,$arr)){
                $book['name'] = reset($arr);
            }else{
                $book['name'] = $arr[$l];
            }
            $book['id'] = $model->id;
            $book['author'] = $model->author;
            $book['publisher'] = $model->publisher;
            $book['image'] = $model->image;
            $book['stores'] = $model->stores;
            array_push($books, $book);
        }
        $bs = json_encode($books);
        //dd($books);
        return json_decode($bs);
    }
    public function store(Request $request){
        //dd($request);
        $trans = new Translation;
        $trans->name = $request->name;
        $trans->image_url = $request->image;
        $trans->save();
        return redirect('/');
    }
    public function setLanguage($language){
        session(['language' => $language]);
        return redirect()->back();
    }
    public function language(){
        return session('language', '4');
    }
    public function addTranslation($model, $translation){
        $arr = array();
        if(!$model->name){
            $arr[session('language', '4')] = $translation;
            return json_encode($arr);
        }
    }
}
