<template>
<div class="books">
    <div v-for="book in testBooks" :key="book.id" style="padding-left:2vw; " :id="book.id" class="book" onclick="pickUp(this)"><br>
    <img style="diplay: block;float:left;height:23vh; margin-right:1vw;" :src="book.image.path" alt="">
    <h2 style="margin-bottom:0">{{ book.translated_name }}</h2>
    <div id="img">
    <a :href="'/del-book/' + book.id" onclick="notCall(event)">
    <img class="delete-img" style="width:4.5vh;float:right;margin-right:2vw;margin-top:0.6vh;" :src="'x-icon.jpg'" alt="Delete">
    </a>
    </div>
    <div id="img">
    <a :href="'/edit-book/' + book.id" onclick="notCall(event)">
    <img class="edit-img" style="width:5.5vh;float:right;margin-right:2vw;" :src="'edit-icon.png'" alt="Edit">
    </a>
    </div>
    <div id="img">
    <a :href="'/stats/book/' + book.id + '/0'" onclick="notCall(event)">
    <img class="graph-img" style="width:5.5vh;float:right;margin-right:2vw;margin-top:0.3vh;filter:contrast(75%);" :src="'graph-icon.png'" alt="Show stats">
    </a>
    </div>
    <br>
    <span :id="'book' + book.id">
    price: € {{ book.price.toFixed(2).replace('.', ',') }}</span><br>
    schrijver: <a :href="'/author/' + book.author.id" onclick="notCall(event)">{{ book.author.name }}</a><br>
    uitgever: <a :href="'/publisher/' + book.publisher.id " onclick="notCall(event)">{{ book.publisher.name }}</a><br>
    bookstore: <span v-for="store in book.stores" :key="store.id">
        <a :href="'/bookstore/' + store.id" style="display: inline-block" onclick="notCall(event)">{{ store.name }}&nbsp;&nbsp;</a>
    </span><br>
    genre: <span v-for="genre in book.genres" :key="genre.id">
        <a :href="'/genre/' + genre.id" style="display: inline-block" onclick="notCall(event)">{{ genre.name }}&nbsp;&nbsp;</a>
    </span>
    <br>
    </div>
</div>
</template>
<script>
    export default {
        props: [
            'books'
        ],
        data(){
            return{
                'testBooks': this.books
            }
        },
        mounted: function(){
            window.Echo.channel('books').listen('.price-is-changed', (e) => {
                for(let i = 0; i < this.testBooks.length; i ++){
                    if(this.testBooks[i].id == e.books.id){
                        this.testBooks[i].price = e.books.price;
                    }
                }
            });
            window.Echo.channel('books').listen('.book-is-added', (e) => {
                this.testBooks.push(e.book);
            });
        },
    }
</script>