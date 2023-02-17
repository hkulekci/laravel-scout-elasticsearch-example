<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\Product;
use Elastic\Elasticsearch\Client;
use Illuminate\Console\Command;

class BookIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:index
    {--index_name=: index name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Client $elastic)
    {
        foreach (Product::all() as $product) {
            $elastic->index([
                'index' => $this->option('index_name'),
                'id' => $product->id,
                'body' => $product->toSearchableArray()
            ]);
        }

        return Command::SUCCESS;
    }
}
