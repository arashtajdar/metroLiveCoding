<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testCli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testCli:run {arg}';

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
        $arg = $this->argument('arg');
        $this->info('Display this on the screen '.$arg);
        return true;
    }
}
