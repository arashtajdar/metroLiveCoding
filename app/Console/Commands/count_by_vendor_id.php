<?php

namespace App\Console\Commands;

use App\Http\Controllers\OfferController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class count_by_vendor_id extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_by_vendor_id {vendor_id}';

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
        $vendorId = $this->argument('vendor_id');
        $count = $OfferController->countByVendorId($vendorId);
        $this->info($count);
        return true;
    }
}
