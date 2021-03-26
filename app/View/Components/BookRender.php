<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Book;


class BookRender extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $book_id;
    public function __construct($book)
    {
        $this->book_id = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.book-render',['book' => Book::find($this->book_id)]);
    }
}
