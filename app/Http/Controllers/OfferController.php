<?php

namespace App\Http\Controllers;

use App\Interfaces\ReaderInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public $reader;
    public $arrayString;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function countByPriceRange(float $price_from, float $price_to): int
    {
        $iterator = $this->reader->read($this->getArrayString())->getArray();
        $result = array_filter($iterator, function ($val) use ($price_from, $price_to) {
            return $val->price > $price_from && $val->price < $price_to;
        });
        Log::debug('Count requested for the offers with price range between '.$price_from . " to " .$price_to);
        return count($result);
    }

    public function countByTitle(string $title): int
    {
        $iterator = $this->reader->read($this->getArrayString())->getArray();
        $result = array_filter($iterator, function ($val) use ($title) {
            return Str::contains($val->productTitle, $title);
        });
        Log::debug('Count requested for the offers with title which contains '.$title);
        return count($result);
    }
    public function countByVendorId(int $vendorId): int
    {
        $iterator = $this->reader->read($this->getArrayString())->getArray();
        $result = array_filter($iterator, function ($val) use ($vendorId) {
            return $val->vendorId == $vendorId;
        });
        Log::debug('Count requested for the offers with vendor id equal to '.$vendorId);
        return count($result);
    }

    public function getArrayString(): string
    {
        //$response = Http::get("https://api.publicapis.org/entries");
        //$arrayString = json_encode($response->json());
        $arrayString = '[
                        {
                            "offerId": 123,
                            "productTitle": "Coffee machine",
                            "vendorId": 35,
                            "price": 390.4
                        },
                        {
                            "offerId": 124,
                            "productTitle": "Napkins",
                            "vendorId": 84,
                            "price": 15.5
                        },
                        {
                            "offerId": 125,
                            "productTitle": "Chair",
                            "vendorId": 84,
                            "price": 333.0
                        }
                    ]';
        Log::debug('Data fetched !');
        return $arrayString;
    }
}
