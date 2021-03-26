@extends('layouts.showtemp')
@section('content')
<div class="panel-body">

        <form action="/book/update/{{ $book->id }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- book name -->
            <div class="form-group">
                <h2><label for="book" class="col-sm-3 control-label">Edit "{{ $book->translated_name }}"</label></h2>
                <img style="diplay: block;float:left;height:19vh; margin-right:1vw;border: 1px solid white" src="{{ asset($book->image->path) }}" id="preview" alt="">
                <div class="col-sm-6">
                    <label for="book name">name</label>
                    <input type="text" name="name" id="book-name" class="form-control" value="{{ $book->translated_name }}">
                    <br>
                    <label for="author">author</label>
                    <select id="authors" name="author_id">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"<?php 
                            if($book->author->id == $author->id){echo "selected";} 
                            ?>>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="publisher">publisher</label>
                    <select id="publishers" name="publisher_id">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}"<?php 
                            if($book->publisher->id == $publisher->id){echo "selected";} 
                            ?>>{{ $publisher->name }}</option>
                        @endforeach
                    </select><br>
                    <label for="store">store</label>
                    <select id="stores" name="store_id[]" multiple>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}"<?php 
                            if($book->stores->find($store->id)){echo "selected";} 
                            ?>>{{ $store->name }}</option>
                        @endforeach
                    </select><br>
                    <label for="price">price</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ $book->price }}">
                    <br>
                    <label for="image">image</label>
                    <input type="file" id="image" name="image" onchange="loadFile(event)">
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('preview');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.style = "diplay: block;float:left;height:19vh; margin-right:1vw;border: 1px solid white";
                        output.onload = function() {
                            URL.revokeObjectURL(output.src);
                        }
                    };
                    </script>
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Save changes
                    </button>
                </div>
            </div>
            @if ($errors->any())
            <div class="error-alert" style="color:red;">
            @foreach ($errors->all() as $error)
               <img width="17vw"src="{{ asset('error-icon.png') }}" alt=""><h3 style="margin-left:0.6vw;display: inline-block">{{ $error }}</h3><br>
            @endforeach
            </div>
            @endif
        </form>
    </div><br>
@endsection