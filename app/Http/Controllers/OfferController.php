<?php

namespace App\Http\Controllers;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use App\Interfaces\ReaderInterface;
use App\Readers\localJsonReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OfferController extends Controller
{
    public $reader;
    public function __construct(ReaderInterface $reader,OfferCollectionInterface $offerCollection){
        $this->reader = $reader;
}
    public function countByPriceRange(float $price_from,float $priceTo): int
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
                            "vendorId": 35,
                            "price": 15.5
                        },
                        {
                            "offerId": 125,
                            "productTitle": "Chair",
                            "vendorId": 84,
                            "price": 333.0
                        }
                    ]';
        $iterator = $this->reader->read($arrayString)->getArray();
        $result = array_filter($iterator, function($val) use ($price_from,$priceTo) {
            return $val->price>$price_from && $val->price<$priceTo;
        });
        return count($result);
    }
}
