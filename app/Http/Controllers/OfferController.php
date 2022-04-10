<?php

namespace App\Http\Controllers;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use App\Interfaces\ReaderInterface;
use App\Readers\localJsonReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public $reader;
    public $arrayString;

    public function __construct(ReaderInterface $reader, OfferCollectionInterface $offerCollection)
    {
        $this->reader = $reader;
    }

    public function countByPriceRange(float $price_from, float $priceTo): int
    {
        $arrayString = $this->getArrayString();

        $iterator = $this->reader->read($arrayString)->getArray();
        $result = array_filter($iterator, function ($val) use ($price_from, $priceTo) {
            return $val->price > $price_from && $val->price < $priceTo;
        });
        return count($result);
    }

    public function countByTitle(string $title): int
    {
        $arrayString = $this->getArrayString();
        $iterator = $this->reader->read($arrayString)->getArray();
        $result = array_filter($iterator, function ($val) use ($title) {
            return Str::contains($val->productTitle, $title);
        });
        return count($result);
    }
    public function countByVendorId(int $vendorId): int
    {
        $arrayString = $this->getArrayString();
        $iterator = $this->reader->read($arrayString)->getArray();
        $result = array_filter($iterator, function ($val) use ($vendorId) {
            return $val->vendorId == $vendorId;
        });
        return count($result);
    }

    public function getArrayString()
    {
        //        $response = Http::get("https://api.publicapis.org/entries");
//        $arrayString = json_encode($response->json());
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
        return $arrayString;
    }
}
