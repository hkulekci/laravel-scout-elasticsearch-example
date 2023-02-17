<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;

class BookImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:import';

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
    public function handle()
    {
        if (($open = fopen(storage_path('app') . "/books.csv", "r")) !== FALSE) {

            $counter = 0;
            $headers = [];
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if ($counter++ === 0) {
                    $headers = $data;
                    continue;
                }
                Book::create(array_combine($headers, $data));
                echo '.';
            }

            fclose($open);
        }

        $this->info('Success!');

        return Command::SUCCESS;
    }
}
