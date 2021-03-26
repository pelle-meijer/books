@extends('layouts.showtemp')
@section('content')
<div class="panel-body">

        <form action="/publisher/update/{{ $publisher->id }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- book name -->
            <div class="form-group">
                <h2><label for="publisher" class="col-sm-3 control-label">Edit "{{ $publisher->name }}"</label></h2>

                <div class="col-sm-6">
                    <label for="publisher name">name</label>
                    <input type="text" name="name" id="publisher-name" class="form-control" value="{{ $publisher->name }}">
                    <br>
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