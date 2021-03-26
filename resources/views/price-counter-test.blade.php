<script src="{{ asset('js/counter.js') }}"></script>
<h1 id="price">300</h1>
<!-- <div id="loader-container">
    <div id="loader1"></div>
    <div id="loader2"></div>
    <div id="loader3"></div>
</div> -->
<!-- <style>
    #loader-container{
        align: center;
        margin-top: top;
        display: flex;
  justify-content: center;
    }
    #loader-container div{
        display:block;
        width: 2vw;
        height: 2vw;
        background-color: grey;
        margin-left: 1vw;
        border-radius: 5px;
    }
</style> -->
<!-- <script src="{{ asset('js/loader.js') }}"></script> -->
<script>
    window.onload = countTo(document.getElementById('price'));
    // window.onload = loadAnim(document.getElementById('loader-container'));
</script>