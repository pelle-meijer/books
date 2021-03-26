@extends('layouts.showtemp')
@section('content')
<?php
if(count($stores) > 0){
echo "
<br>
<h3>Stores</h3>
<hr style=" ."height:2px;border-width:0;color:white;background-color:white" .">
<br>";
}
?>
@foreach($stores as $store)
<div id="book" style="background-color:blue; padding-bottom:3vw;">
<hr style="height:2px;border-width:0;color:white;background-color:white"><br>
<div style="padding-left:2vw;">
    <div id="img">
    <?php echo '<a href="/bookstore/' . $store->id .'">' ?>
    <p style="font-size: 1.5vw;display:inline-block;">{{ $store->name }}</p>
    </a>
    <?php echo '<a href="/del-store/' . $store->id .'">' ?>
    <img style="width:4vh;float:right;margin-right:2vw;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
    </div>
    <div id="img">
    <?php echo '<a href="/edit-store/' . $store->id .'">' ?>
    <img class="edit-img"style="width:5.5vh;float:right;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
    </div>
    </div>
</div>
@endforeach
@endsection()