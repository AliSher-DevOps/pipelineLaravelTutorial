<?php

namespace App\Console\Commands;

use App\Filters\BadWordsFilter;
use App\Filters\GreetingFilter;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

class CommentAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       $word = $this->ask("Please enter a word");

       $final_word = app(Pipeline::class)
       ->send($word)
       ->through([
        BadWordsFilter::class,
        GreetingFilter::class,
       ])
       ->via("handle_words")
       ->thenReturn();
       dump($final_word);
    }
}
