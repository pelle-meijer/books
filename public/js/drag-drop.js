let book;
let bookIsClicked = false;
let mouseY;
let pMouseY;

function pickUp(_book){
    if(_book.style.position != "absolute" && !bookIsClicked && _book != book){
    book = _book;
    console.log(book.getBoundingClientRect());
    bookIsClicked = true;
    book.style.position = 'absolute';
    book.style.width = "70%";
    book.style.left = "15%";
    book.style.backgroundColor = 'darkblue';
    move();
    console.log("click");
    //children = document.getElementsByClassName('books')[0].children;
    }else{
        bookIsClicked = false;
        book = null;
    }

}
function drop(){
    book.style.position = 'static';
    book.style.width = "100%";
    book.style.backgroundColor = 'blue';
    console.log(book.style.position);
    let books = book.parentElement.children;
    console.log(books);
    if(books.length > 1){
    books = deleteChild(books, book);
    console.log(books[0]);
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
    console.log(_books);
    for(var i = 0; i < _books.length; i++){
        console.log(_books[i]);
        if(i == 0){
            if(getPosition(_books[i]) > mouseY){
                console.log("place before " + _books[i].id);
                _books[i].outerHTML = book.outerHTML + _books[i].outerHTML;
                    book.remove();
                    break;
            }else if(getPosition(_books[i]) < mouseY){
                if(i != _books.length-1){
                    if(getPosition(_books[i+1]) > mouseY){
                        console.log("place after " +_books[i].id);
                        _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                        book.remove();
                        break;
                    }
                }else{
                    console.log("place after " + _books[i].id + " last");
                    _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                    book.remove();
                    break;
                }
            }
        }else{
            if(getPosition(_books[i]) < mouseY){
                if(i != _books.length-1){
                    if(getPosition(_books[i+1]) > mouseY){
                        console.log("place after " +_books[i].id);
                        _books[i].outerHTML = _books[i].outerHTML + book.outerHTML;
                        book.remove();
                        break;
                    }
                }else{
                    console.log("place after " + _books[i].id + " last");
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
