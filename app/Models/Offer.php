<?php


namespace App\Models;


use App\Interfaces\OfferInterface;

class Offer implements OfferInterface
{

    public function get(): array
    {
        // TODO: Implement get() method.
        return [3,5,4];
    }
}
