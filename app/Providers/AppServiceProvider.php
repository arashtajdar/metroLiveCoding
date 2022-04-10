<?php

namespace App\Providers;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use App\Interfaces\ReaderInterface;
use App\Models\Offer;
use App\Models\OfferCollection;
use App\Readers\localJsonReader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind( ReaderInterface::class , localJsonReader::class );
        App::bind( OfferCollectionInterface::class , OfferCollection::class );
        App::bind( OfferInterface::class , Offer::class );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
