<?php

namespace App\Console\Commands;

use App\Http\Controllers\OfferController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class count_by_price_range extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_by_price_range {price_from} {price_to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count number of offers between to given price';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $OfferController = App::make(OfferController::class);
        $price_from = $this->argument('price_from');
        $price_to = $this->argument('price_to');
        $count = $OfferController->countByPriceRange($price_from,$price_to);
        Log::debug('The result is : '.$count);
        $this->info($count);
        return true;
    }
}
