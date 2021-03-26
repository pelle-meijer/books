<div class="title-container">
<img class="logo" src="https://www.pngkit.com/png/full/12-120436_open-book-icon-png.png" alt="">
    <h2 class="title">Thank you for your order.</h2>
    </div>
<div class="email-container">
    <p class="content">We have received your order of {{$total}} books.</p>
    your orders:<br><br>
    <table>
    <div class="table-title">
        <tr>
            <th class="image"></th>
            <th>name</th>
            <th>amount</th>
        </tr>
        </div>
        @foreach($books as $b)
        <tr>
            <td class="image-thing" style="background-image: url('{{asset($b['book']->image->path)}}')">
            <!-- <img style="diplay: block;float:left;width:13vh; margin-right:1vw;" src="{{asset($b['book']->image->path)}}"></img> -->
            </td>
            <td style="padding-left: 2vw;">{{$b['book']->getName()}}</td>
            <td style="padding-left: 2vw;">{{$b['amount']}}</td>
        </tr>
        @endforeach
    </table>
</div>
<style>
.image-thing{
    width:13vh;
    height:20vh;
    background-size: 13vh 20vh;
    background-repeat: no-repeat;
    padding: 0;
}
table{
    border: 2px solid black;
    width:95%;
    border-collapse: collapse;
}
table, th, td {
  border: 1px solid black;
  margin: 0;
}
.email-container{
    padding-top: 1.2vh;
    padding-left: 5%;
    color: #383838;
    background-color: #f2f2f2;
    height: 100%;
}
body{
    color: #383838;
    margin:0;
    padding:0;
    font-family: helvetica;
}
.title-container{
    background: rgb(199,237,225);
    background: linear-gradient(90deg, rgba(199,237,225,1) 0%, rgba(242,242,242,1) 140vh);
    padding-top: 1.7vh;
    padding-left: 4vh;
    padding-bottom: 1vh;
    height:10vh;
    font-size: 2.2vh;
}
.logo{
    width: 9vh;
    display: inline-block;
}
.title{
    position: relative;
    top: -3.2vh;
    left: 2vh;
    display: inline-block;
}
</style>