let book;
let bookIsClicked = false;
let mouseY;
let pMouseY;

function pickUp(_book){
    if(_book.style.position != "absolute" && !bookIsClicked && _book != book){
    book = _book;
    bookIsClicked = true;
    book.style.position = 'absolute';
    book.style.width = "70%";
    book.style.left = "15%";
    book.style.backgroundColor = 'darkblue';
    move();
    }else{
        bookIsClicked = false;
        book = null;
    }

}
function drop(){
    book.style.position = 'static';
    book.style.width = "100%";
    book.style.backgroundColor = 'blue';
    let books = book.parentElement.children;
    if(books.length > 1){
    books = deleteChild(books, book);
    sort(books);
    
    }
    bookIsClicked = false;
    
}
function move(){
    book.style.top = pMouseY - 20 + "px";
}

function deleteChild(children,child){
    let tempcs = [];
    for(var i = 0; i < children.length; i++){
        if(children[i].id != child.id){
            tempcs.push(children[i]);
        }else{
        }
    }
    return tempcs;
}

function sort(_books){
    for(var i = 0; i < _books.length; i++){
        if(i == 0){
            if(getPosition(_books[i]) > mouseY){
                _books[i].outerHTML = book.outerHTML + _books[i].outerHTML;
                    book.remove();
                    break;
            }else if(getPosition(_books[i]) < mouseY){
                if(i != _books.length-1){
                    if(getPosition(_books[i+1]) > mouseY){
                        _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                        book.remove();
                        break;
                    }
                }else{
                    _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                    book.remove();
                    break;
                }
            }
        }else{
            if(getPosition(_books[i]) < mouseY){
                if(i != _books.length-1){
                    if(getPosition(_books[i+1]) > mouseY){
                        _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                        book.remove();
                        break;
                    }
                }else{
                    _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                    book.remove();
                    break;
                }
            }
        }
    }
}


function getPosition(element){
    var pos = element.getBoundingClientRect().top ;
    if(pos > book.getBoundingClientRect().top ){
        pos -= element.offsetHeight;
    }
    return pos;
}


//--------------------- EVENT LISTENERS-------------->
document.addEventListener('mousemove', function(e){
    mouseY = e.clientY;
    pMouseY = e.pageY;
    if(bookIsClicked){
    move();
    }
});
document.addEventListener('mouseup', function(){
    if(bookIsClicked){
        drop();
    }
});
function notCall(event) {
    event.stopImmediatePropagation();
    return false;
}
