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
        <h2 class="name">{{stat.name}}</h2>
    </div>
    <div class="stats">
        <div class="bars">
            <div id="chart_div" style="width: 100%; height: 100%; padding:2vw; background-color:white;"></div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:[
            'stat',
            'dates'
        ],
        mounted(){
        google.charts.load('current', {'packages':['annotatedtimeline']});
        google.charts.setOnLoadCallback(() => drawChart(this.stat, this.dates));
    function drawChart(stat, dates) {
        console.log(stat);
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'date');
      data.addColumn('number', 'books bought');

      data.addRows(
        fill(stat,dates)
      );

      var options = {
        chart: {
           title: 'Books sold ' + stat.name
        },
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));

      chart.draw(data, {displayAnnotations: true});
    }
    }
}
    function fill(stat,dates){
        let a = [];
        for(let i = 0; i < stat.orders.length; i++){
            new Date()
            a.push([new Date(dates[i].year, dates[i].month, dates[i].day, dates[i].hour, dates[i].minutes), dates[i].amount]);
        }
        console.log(a);
        return a;
    }
</script>