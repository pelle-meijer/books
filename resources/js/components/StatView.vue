<style scoped>
.stat-view{
    width: 80%;
    height: 70vh;
    background-color: #e0e0e0;
    margin-top: 8vh;
    margin-left: 10%;
    border-radius: 1vw;
    overflow: hidden;
}
.chart-title{
    color: #6b6b6b;
    position: relative;
    text-align: center;
    padding: 0.02vw;
}
.chart-title hr{
    border-top: 2px solid #b0b0b0;
    width: 95%;
    padding: 0;
    margin: 0;
    margin-left: 2.5%;
}
.stats{
    height: 80%;
    color: #6b6b6b;
}
.stats .bars{
    width: 95%;
    margin-left: 2.5%;
    background-color:#cfcfcf;
    height: 51vh;
    border-top: 2px solid #b0b0b0;
    border-bottom: 2px solid #b0b0b0;
}
.bars .bar{
    display: inline-block;
    margin-left: 5vw;
    width: 10vw;
    text-align: center;
}
.bar span{
    position: relative;
    top: 5vh;
    font-size: 17px;
}
.bar .container{
    color:black;
    width: 10vw;
    height: 50vh;
    background-color: #cfcfcf;
}
.container span{
    position: relative;
}
.bar .content{
    position: relative;
    background-color:blue;
    border: 3px solid blue;
    border-bottom: none;
    border-radius: 5px 5px 0px 0px;
    width: 10vw;
}
.stats hr{
    border-top: 2px solid #b0b0b0;
    top:90%;
    width: 95%;
}
</style>

<template>
<div class="stat-view">
    <div class="chart-title">
        <h2 class="name">Book finance chart</h2>
        
    </div>
    <div class="stats">
        <div class="bars">
            <div class="bar" v-for="stat in stats" v-bind:key="stat.id">
                <div class="container">
                    <span :style="'top: ' + (42 -stat.number/1950*50 ) +'vh;'">{{stat.number}}</span>
                    <div :style="'height:' + (stat.number/1950*50) + 'vh;' + 'margin-top: ' + (46 - stat.number/1950*50 ) +'vh;'" class="content" ></div>
                </div>
                <a :href="'http://localhost:8000/stats/book/' + stat.order.pivot.book_id + '/' + stat.store.id"><span>{{stat.store.name}}</span></a>
            </div>
        </div>
        
    </div>
</div>
</template>

<script>
    export default {
        props: [
            'stats'
        ]
    }
</script>
