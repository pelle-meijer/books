@extends('layouts.app')
@section('content')
<div class="panel-body">

        <form id="form" name="form" action="/translation" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- book name -->
            <div class="form-group">
                <h2><label for="language" class="col-sm-3 control-label">New Translation</label></h2>

                <div class="col-sm-6">
                        <label for="translation name">name</label>
                        <input type="text" name="name" id="translation-name" class="form-control">
                </div>
                <div class="col-sm-6">
                        <label for="translation name">icon</label>
                        <input onkeyup="changeFlag(this);" type="text" name="icon" id="icon-name" class="form-control">
                    <img id="flag" src="" alt="" style="height:3vh; padding-left:1vh; position: absolute;">
                </div>
                <input id="image" type="text" name="image" style="display:none;">
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
    <script type="text/javascript">
        function changeFlag(i){
            let flag_icon = document.getElementById('flag');
            let input = i;
            let image = document.getElementById('image');
            console.log("type");
            flag_icon.src = "https://cdn.countryflags.com/thumbs/" + input.value + "/flag-round-500.png";
            image.value = flag_icon.src;
        }
    </script>
@endsection