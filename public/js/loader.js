let loader;
function loadAnim(){
    loader = [
        document.getElementById('loader1'),
        document.getElementById('loader2'),
        document.getElementById('loader3'),
    ];
    window.requestAnimationFrame(update);
}
let index = 0;
let timer = 0;
function update(){
    loader.forEach(element => {
        element.style.backgroundColor = "darkgrey";
        element.style.height = "2vw";
    });
    loader[index].style.backgroundColor = "grey";
    loader[index].style.height = "3vw";
    timer += 0.01;
    if(timer >= 0.3){
        if(index != 2){
            index ++;
        }else{
            index = 0;
        }
        timer = 0;
    }
    window.requestAnimationFrame(update);
}