<?php


namespace App\Models;


use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use ArrayIterator;
use Iterator;

class OfferCollection implements OfferCollectionInterface
{
//
    public $offerInterface;
    public function __construct(OfferInterface $offerInterface){
        $this->offerInterface = $offerInterface;
    }
    public $array;

    /**
     * @param mixed $array
     */
    public function setArray($array)
    {
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getArray()
    {
        return $this->array;
    }

    public function get(int $index): OfferInterface
    {
        return $this->offerInterface;
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->array);
    }
}
