<?php
if(count($authors) > 0){
echo "
<br>
<h3>Authors</h3>
<hr style=" ."height:2px;border-width:0;color:white;background-color:white" .">
<br>";
}
?>
@foreach($authors as $author)
<div id="book" style="background-color:darkblue; padding-bottom:3vw;">
<hr style="height:2px;border-width:0;color:white;background-color:white"><br>
    <div style="padding-left:2vw;">
    <div id="img">
    <?php echo '<a href="/author/' . $author->id .'">' ?>
    <p style="font-size: 1.5vw;display:inline-block;">{{ $author->name }}</p>
    </a>
    <?php echo '<a href="/del-auth/' . $author->id .'">' ?>
    <img style="width:4vh;float:right;margin-right:2vw;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
    </div>
    <div id="img">
    <?php echo '<a href="/edit-auth/' . $author->id .'">' ?>
    <img class="edit-img"style="width:5.5vh;float:right;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
    </div>
    </div>
</div>
<div class="books">
@foreach($author->books as $book)
<x-book-render book="{{ $book->id }}"/>
@endforeach
</div>
@endforeach
<?php
if(count($publishers) > 0){
echo "
<br>
<h3>Publishers</h3>
<hr style=" ."height:2px;border-width:0;color:white;background-color:white" .">
<br>";
}
?>
@foreach($publishers as $publisher)
<div id="book" style="background-color:darkblue; padding-bottom:3vw;">
<hr style="height:2px;border-width:0;color:white;background-color:white"><br>
<div style="padding-left:2vw;">
    <div id="img">
    <?php echo '<a href="/publisher/' . $publisher->id .'">' ?>
    <p style="font-size: 1.5vw;display:inline-block;">{{ $publisher->name }}</p>
    </a>
    <?php echo '<a href="/del-pub/' . $publisher->id .'">' ?>
    <img style="width:4vh;float:right;margin-right:2vw;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
    </div>
    <div id="img">
    <?php echo '<a href="/edit-pub/' . $publisher->id .'">' ?>
    <img class="edit-img"style="width:5.5vh;float:right;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
    </div>
    </div>
</div>
<div class="books">
@foreach($publisher->books as $book)
<x-book-render book="{{ $book->id }}"/>
@endforeach
</div>
@endforeach
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
<div id="book" style="background-color:darkblue; padding-bottom:3vw;">
<hr style="height:2px;border-width:0;color:white;background-color:white"><br>
<div style="padding-left:2vw;">
    <div id="img">
    <?php echo '<a href="/store/' . $store->id .'">' ?>
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
<div class="books">
@foreach($store->books as $book)
<x-book-render book="{{ $book->id }}"/>
@endforeach
</div>
@endforeach
<?php
if(count($books) > 0){
echo "
<br>
<h3>Books</h3>
<hr style=" ."height:2px;border-width:0;color:white;background-color:white" .">
<br>";
}
?>
<div class="books">
@foreach($books as $book)
<x-book-render book="{{ $book->id }}"/>
@endforeach
</div>