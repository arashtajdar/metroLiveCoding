<?php


namespace App\Readers;


use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\ReaderInterface;
use App\Models\OfferCollection;

class localJsonReader implements ReaderInterface
{
    public $offerCollection;
    public function __construct(OfferCollectionInterface $offerCollection){
        $this->offerCollection = $offerCollection;
    }
    public function read(string $input): OfferCollectionInterface
    {
        $array = '[
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
        $array = json_decode($array);
        $this->offerCollection->setArray($array);
        return $this->offerCollection;
    }
}
