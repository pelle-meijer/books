<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
use App\Models\Book;
use App\Models\Image;

class OrderController extends Controller
{
    public function store(Request $request, $store){
        $total = 0;
        $order = new Order;
        $order->store_id = $store;
        $order->save();
        $order->books()->attach(array_keys($request->book_amount));
        $bs = Book::find(array_keys($request->book_amount));
        $books = array();
        $index = 0;
        foreach($request->book_amount as $strid){
            $total += $strid;
            Order::find($order->id)->books()
            ->updateExistingPivot(array_search($strid, $request->book_amount), ['amount' => $strid]);
            array_push($books, ['book' => $bs[$index],'amount' => $strid]);
            $index ++;
        }
        Mail::to($request->user())->send(new OrderPlaced($total,$books));
        return redirect()->back();
    }
}
