<style scoped>
.login-page{
    width:50%;
    height: 60vh;
    background-color: rgb(236, 236, 236);
    border-radius: 5px;
    position: fixed;
    top: 20%;
    left: 25%;
    color: black;
}
.title{
    text-align: center;
    padding: 1%;
    border-bottom: 3px solid rgb(196, 196, 196);
}
.overlay{
    position: fixed;
    width:100%;
    height:100%;
    top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
   /* Specify a stack order in case you're using a different order for other elements */
}
.login-input{
    padding: 5%;
    font-size: 1.4vw;
    padding-top: 7%;
}
.login-input input{
    width: 95%;
    font-size:1.4vw;
    padding: 1.5%;
    margin-top: 1.5%;
    margin-bottom: 4%;
}
</style>
<template>
<div style="inline-block">
    <button v-on:click="login">Login</button>
<div id="login-contents" style="display: none;">
<div id="overlay" class="overlay" v-on:click="close">
</div>
<div id="login-page" class="login-page">
        <div class="title">
            <h2>Login</h2>
        </div>
        <div class="login-input">
        <form action="/login" method="post">
        <input type="hidden" name="_token" v-bind:value="csrf">
            <label for="username">username</label><br>
            <input type="text" name="name">
            <br><br>
            <label for="password">password</label><br>
            <input type="password" name="password">
            <input type="submit" name="submit" id="" style="background-color: grey;color: white;">
        </form>
        </div>
    </div>
</div>
</div>
</template>
<script>
export default {
    props:[
        'csrf'
    ],
    methods: {
        close: function(){
            document.getElementById('login-contents').style.display = "none";
        },
        login: function(){
            document.getElementById('login-contents').style.display = "block";
        }
    }
}
</script>