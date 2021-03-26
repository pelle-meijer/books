<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:change {price}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Price changed succesfully ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $book = \App\Models\Book::first();
        $book->price = $this->argument('price');
        $book->save();
        $this->info("\e[32m" . $this->description . "to {$this->argument('price')}");
        \App\Events\PriceIsChanged::dispatch($book);
    }
}
