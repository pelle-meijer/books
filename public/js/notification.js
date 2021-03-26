let element
let size = 0;
function notify(content){
    element = document.createElement("div");
    let title = document.createElement("h2");
    title.innerHTML = 'You are not allowed to perform this action';
    element.appendChild(title);
    let cont = document.createElement("p");
    cont.innerHTML = content;
    cont.style = "color: grey;";
    element.appendChild(cont);
    element.style = "background-color: white; width: 30vw; color: black; height: 15vw; padding-top: 5px; padding-left: 2vw; border-radius: 5px;";
    document.body.appendChild(element);
    element.style.width = "0px";
    element.style.height = "20vh";
    element.style.overflow = "hidden";
    element.style.position = "absolute";
    element.style.top = "4vh";
    element.style.left = "55%";
    element.style.cursor = "default";
    cont.style.whiteSpace = "nowrap";
    title.style.whiteSpace = "nowrap";
    window.requestAnimationFrame(enterframe);
}
function enterframe(){
    if(size < 40){
        size += 3;
        element.style.width = size + "%";
        element.style.left = (55 + (40 - size)) + "%";
        window.requestAnimationFrame(enterframe);
    }else{
        window.cancelAnimationFrame(enterframe);
        setTimeout(function(){ leaveframe() }, 3000);
    }
}
function leaveframe(){
    console.log('leave');
    if(size > 0){
        size -= 3;
        element.style.width = size + "%";
        element.style.left = (55 + (40 - size)) + "%";
        window.requestAnimationFrame(leaveframe);
    }else{
        element.remove();
        window.cancelAnimationFrame(leaveframe);
    }
}