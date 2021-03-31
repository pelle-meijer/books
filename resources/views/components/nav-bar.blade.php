<nav>
    <ul>
    <li><a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i style="font-size: 1.8rem;" class="fas fa-user"></i>
    </a></li>
        <li><a href="/">Home</a></li>
        @if(Auth::user() && Auth::user()->name == "Admin")
        <li><a href="/add/book">Add book</a></li>
        <li><a href="/add/author">Add author</a></li>
        <li><a href="/add/publisher">Add publisher</a></li>
        <li><a href="/add/store">Add Store</a></li>
        <li><a href="/add/translation">Add Translation</a></li>
        @endif
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
<!-- Hamburger menu -->
<div id="hamburger-menu">
    <div id="login-menu">
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/logout">Logout</a>
    </div>
</div>
<!-- End Hamburger menu -->
<script>
function myFunction() {
  var x = document.getElementById("login-menu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<style>
#hamburger-menu {
  overflow: hidden;
  width:15vw;

}
/* Hide the links inside the navigation menu (except for logo/home) */
#login-menu {
  display: none;
  background-color: #333;
}

/* Style navigation menu links */
#hamburger-menu a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

/* Style the hamburger menu */
#hamburger-menu a.icon {
  background: black;
  display: block;
  right: 0;
  top: 0;
  
}

/* Add a grey background color on mouse-over */
#hamburger-menu a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active link (or home/logo) */
.active {
  background-color: #4CAF50;
  color: white;
}
</style>