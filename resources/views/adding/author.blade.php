@extends('layouts.app')
@section('content')
<div class="panel-body">

        <form action="/author" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- book name -->
            <div class="form-group">
                <h2><label for="book" class="col-sm-3 control-label">New Author</label></h2>

                <div class="col-sm-6">
                    <label for="author name">name</label>
                    <input type="text" name="name" id="author-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add author
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