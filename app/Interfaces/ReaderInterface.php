<?php

namespace App\Interfaces;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}
