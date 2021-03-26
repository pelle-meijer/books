<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/add/book">Add book</a></li>
        <li><a href="/add/author">Add author</a></li>
        <li><a href="/add/publisher">Add publisher</a></li>
        <li><a href="/add/store">Add Store</a></li>
        <li><a href="/add/translation">Add Translation</a></li>
        <li><a href="/store-panel">Store panel</a></li>
        @foreach($translations as $translation)
        <a href="/language/{{$translation->id}}">
        <img src="{{ $translation->image_url}}" style="opacity: 35%;width: 2vw;float:right;margin-right:2vw;
        @if($translation->id == $language) opacity: 100%; width:2.3vw; @endif" alt="">
        </a>
        @endforeach
        <a href="/search-page"><img style="width: 2vw;float:right;margin-right:2vw;" src="{{ asset('searchIcon.png') }}" alt=""></a>
    </ul>
</nav>