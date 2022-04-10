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
        $array = $input;
        $array = json_decode($array);
        $this->offerCollection->setArray($array);
        return $this->offerCollection;
    }
}
