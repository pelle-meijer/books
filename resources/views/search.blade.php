@extends('layouts.showtemp')
@section('content')
<div class="book-container">
<div class="search-tools">
<h1>Search</h1>
<form action="">
  <input autofocus type="text" id="search" name="search" onkeyup="showHint(this.value)" onkeydown="return event.key != 'Enter';">
  </div>
  <div id="txtHint"></div>
</form>
</div>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(this.readyState);
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = JSON.parse(this.responseText);
      }
    };
    xmlhttp.open("GET", "search?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
@endsection