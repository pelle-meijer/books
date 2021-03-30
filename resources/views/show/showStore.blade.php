@extends('layouts.showtemp')
@section('content')
<div class="book-container">
<h2 style="display:inline-block">{{ $store->name}}</h2>
<?php echo '<a href="/del-store/' . $store->id .'">' ?>
    <img style="width:2vh;margin-right:2vw;display:inline-block;margin-left:1vw;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
<?php echo '<a href="/edit-store/' . $store->id .'">' ?>
    <img class="edit-img"style="width:3vh;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
    <form action="order/{{$store->id}}" method="post">
    {{ csrf_field() }}
@foreach($store->books as $book)
<input type="number" name="book_amount[{{$book->id}}]">
<x-book-render book="{{ $book->id }}"/>
@endforeach
<button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add author
                    </button>
</form>
</div>
@endsection