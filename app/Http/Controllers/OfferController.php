<?php

namespace App\Http\Controllers;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use App\Interfaces\ReaderInterface;
use App\Readers\localJsonReader;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public $reader;
    public function __construct(ReaderInterface $reader,OfferCollectionInterface $offerCollection){
        $this->reader = $reader;
}
    public function countByPriceRange(float $price_from,float $priceTo): int
    {

        $iterator = $this->reader->read("u")->getArray();
        $result = array_filter($iterator, function($val) use ($price_from,$priceTo) {
            return $val->price>$price_from && $val->price<$priceTo;
        });
        return count($result);
    }
}
