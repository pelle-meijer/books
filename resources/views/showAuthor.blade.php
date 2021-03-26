@extends('layouts.showtemp')
@section('content')
<div class="book-container">
<h2 style="display:inline-block;">{{ $author->name}}</h2>
<?php echo '<a href="/del-auth/' . $author->id .'">' ?>
    <img style="width:2vh;margin-right:2vw;display:inline-block;margin-left:1vw;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
    <?php echo '<a href="/edit-auth/' . $author->id .'">' ?>
    <img class="edit-img"style="width:3vh;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
@foreach($author->books as $book)
<x-book-render book="{{ $book->id}}"/>
@endforeach
</div>
@endsection