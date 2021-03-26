
let currentAmount = 0;
let timeToCount = 2;
let deltaTime;
let goalAmount;
let lastUpdate = Date.now();
let priceObj;
function countTo(obj, price){
    priceObj = obj;
    goalAmount = price;
    goalAmount=123567;
    lastUpdate = Date.now();
    window.requestAnimationFrame(update);
}
function calcAmountPerFrame(){
    if(timeToCount >= 0){
    let difference = goalAmount - currentAmount;
    let increment = timeToCount/deltaTime;
    currentAmount += difference/increment;
    timeToCount -= deltaTime;
    }else{
        currentAmount = goalAmount;
    }
    //currentAmount = Math.round(currentAmount * 100) / 100;
    //currentAmount += deltaTime;
    return currentAmount;
}
function calcDeltaTime(){
    let now = Date.now();
    deltaTime = (now - lastUpdate)/1000;
    lastUpdate = now;
}
function getDeltaTime(){
    return deltaTime;
}
function update(){
    calcDeltaTime();
    priceObj.innerHTML = "€ " + calcAmountPerFrame().toFixed(2).replace('.', ',');

    if(timeToCount >= 0){
        window.requestAnimationFrame(update);
    }else{
        currentAmount = goalAmount;
        priceObj.innerHTML = "€ " + calcAmountPerFrame().toFixed(2).replace('.', ',');
    }
}