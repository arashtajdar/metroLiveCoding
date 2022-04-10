<?php

namespace App\Console\Commands;

use App\Http\Controllers\OfferController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class count_by_production_title extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_by_production_title {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count number of offers between to given title';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $OfferController = App::make(OfferController::class);
        $title = $this->argument('title');
        $count = $OfferController->countByTitle($title);
        $this->info($count);
        Log::debug('The result is : '.$count);
        return true;
    }
}
