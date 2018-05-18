<?php

namespace App\Providers;

use app\Repositories\GeneralCharacteristicsInterface;
use app\Repositories\GeneralCharacteristicsRepository;
use App\Repositories\IndustryInterface;
use App\Repositories\IndustryRepository;
use app\Repositories\RegionInterface;
use app\Repositories\RegionRepository;
use App\Repositories\SpecificWeightInterface;
use App\Repositories\SpecificWeightRepository;
use App\Repositories\YearInterface;
use App\Repositories\YearRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RegionInterface::class,
            RegionRepository::class
        );
        $this->app->bind(
            GeneralCharacteristicsInterface::class,
            GeneralCharacteristicsRepository::class
        );
        $this->app->bind(
            YearInterface::class,
            YearRepository::class
        );
        $this->app->bind(
            IndustryInterface::class,
            IndustryRepository::class
        );

        $this->app->bind(
            SpecificWeightInterface::class,
            SpecificWeightRepository::class
        );
    }
}
