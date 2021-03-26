
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
<div style="padding-left:2vw; height:25vh" id="{{ $book->id }}" class="book" onclick="pickUp(this)"><br>
    <img style="diplay: block;float:left;height:20vh; margin-right:1vw;"src="{{ asset( $book->image->path)}}" alt="">
    <h2 style="margin-bottom:0">{{ $book->getName() }}</h2>
    <div id="img">
    <?php echo '<as href="/del-book/' . $book->id .'" onclick="notCall(event)">' ?>
    <img class="delete-img"style="width:4.5vh;float:right;margin-right:2vw;margin-top:0.6vh;" src="{{ asset('x-icon.jpg') }}" alt="Delete">
    </a>
    </div>
    <div id="img">
    <?php echo '<a href="/edit-book/' . $book->id .'" onclick="notCall(event)">' ?>
    <img class="edit-img"style="width:5.5vh;float:right;margin-right:2vw;" src="{{ asset('edit-icon.png') }}" alt="Edit">
    </a>
    </div>
    <br>
    schrijver: <a href="/author/{{ $book->author->id }}" onclick="notCall(event)">{{ $book->author->name }}</a><br>
    uitgever: <a href="/publisher/{{ $book->publisher->id }}" onclick="notCall(event)">{{ $book->publisher->name }}</a><br>
    boekstore: @foreach($book->stores as $store) 
                <a href="/bookstore/{{ $store->id }}" style="display: inline-block" onclick="notCall(event)">{{ $store->name }} </a>
                <?php if($book->stores[count($book->stores)-1]->id != $store->id){echo "/";}?>
                @endforeach
    <br><br>
</div>