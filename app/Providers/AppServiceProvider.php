<?php

namespace App\Providers;

use app\Repositories\GeneralCharacteristicsInterface;
use app\Repositories\GeneralCharacteristicsRepository;
use app\Repositories\GroupInterface;
use app\Repositories\GroupRepository;
use app\Repositories\IndicatorInterface;
use app\Repositories\IndicatorRepository;
use app\Repositories\IndicatorValueInterface;
use app\Repositories\IndicatorValueRepository;
use App\Repositories\PartnershipIndexInterface;
use App\Repositories\PartnershipIndexRepository;
use App\Repositories\RegionalEconomyIndexInterface;
use App\Repositories\RegionalEconomyIndexRepository;
use App\Repositories\SubsoilIndexInterface;
use App\Repositories\SubsoilIndexRepository;
use App\Repositories\IndustryInterface;
use App\Repositories\IndustryRepository;
use app\Repositories\RegionalEconomyInterface;
use app\Repositories\RegionalEconomyRepository;
use app\Repositories\RegionInterface;
use app\Repositories\RegionRepository;
use app\Repositories\RegionsPartnershipInterface;
use app\Repositories\RegionsPartnershipRepository;
use App\Repositories\SpecificWeightInterface;
use App\Repositories\SpecificWeightRepository;
use App\Repositories\SubsoilDevelopmentInterface;
use App\Repositories\SubsoilDevelopmentRepository;
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
            YearInterface::class,
            YearRepository::class
        );
        $this->app->bind(
            IndustryInterface::class,
            IndustryRepository::class
        );

        $this->app->bind(
            GroupInterface::class,
            GroupRepository::class
        );

        $this->app->bind(
            IndicatorInterface::class,
            IndicatorRepository::class
        );

        $this->app->bind(
            IndicatorValueInterface::class,
            IndicatorValueRepository::class
        );

    }
}
