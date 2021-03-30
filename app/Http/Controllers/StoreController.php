<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function store(Request $request){
        $store = new Store;
        $store->name = $request->name;
        $store->admin_id = Auth::id();
        Auth::user()->role_id = 2;
        Auth::user()->save();
        $store->save();
        return redirect('/');
    }
    public function index(){
        $stores = Store::all();
        return view('show/stores', ['stores' => $stores]);
    }
    public function show(Store $store){
        return view('show/showStore', ['store' => $store]);
    }
    public function destroy(Store $store){
        $store->books()->detach();
        $destroy = Store::destroy($store->id);
        return redirect('/');
    }
    public function edit(Store $store){
        return view("edit/edit_store", ['store' => $store]);
    }
    public function update(Store $store, StoreUpdateRequest $request){
        $validated = $request->validated();
        $store->name = $request->name;
        $store->save();
        return redirect('/');
    }
}
