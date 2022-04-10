<?php

namespace Tests\Feature;

use App\Http\Controllers\OfferController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_count_is_int()
    {
        $OfferController = App::make(OfferController::class);
        $count_by_price_range = $OfferController->countByPriceRange(1,1000);
        $count_by_title = $OfferController->countByTitle("title");
        $count_by_vendor_id = $OfferController->countByVendorId(1);
        $this->assertIsInt($count_by_price_range);
        $this->assertIsInt($count_by_title);
        $this->assertIsInt($count_by_vendor_id);
    }
}
