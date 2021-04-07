@extends('layouts.app')
@section('content')
<div class="panel-body">
        <form action="/book" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- book name -->
            <div class="form-group">
                <h2><label for="book" class="col-sm-3 control-label">New Book</label></h2>
                <img style="diplay: block;float:left;height:19vh; margin-right:1vw;" id="preview" alt="">
                <div class="col-sm-6">
                    <label for="book name">name</label>
                    <input type="text" name="name" id="book-name" class="form-control"
                    @if ($errors->any())
                    value="{{ old('name') }}"
                    @endif
                    >
                    <br>
                    <label for="author">author</label>
                    <select id="authors" name="author_id">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" @if($errors->any() && $author->id == old('author_id'))
                                                                selected 
                                                            @endif
                                                                >{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="publisher">publisher</label>
                    <select id="publishers" name="publisher_id">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" @if($errors->any() && $publisher->id == old('publisher_id'))
                                                                selected 
                                                            @endif
                                                                >{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="store">store</label>
                    <select id="stores" name="store_id[]" multiple>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}"@if($errors->any() && old('store_id') && in_array($store->id, old('store_id')))
                                                                selected 
                                                            @endif
                                                                >{{ $store->name }}</option>
                        @endforeach
                    </select><br>
                    <label for="genre">genre</label>
                    <select id="genres" name="genre_id[]" multiple>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"@if($errors->any() && old('genre_id') && in_array($genre->id, old('genre_id')))
                                                                selected 
                                                            @endif
                                                                >{{ $genre->name }}</option>
                        @endforeach
                    </select><br>
                    <label for="price">price</label>
                    <input type="number" id="price" name="price" step="0.01">
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
                        <i class="fa fa-plus"></i> Add book
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