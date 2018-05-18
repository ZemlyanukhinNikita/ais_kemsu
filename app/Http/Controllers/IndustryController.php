<?php

namespace App\Http\Controllers;

use app\Repositories\GeneralCharacteristicsInterface;
use App\Repositories\IndustryInterface;
use app\Repositories\RegionInterface;
use App\Repositories\SpecificWeightInterface;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    private $industryRepository;
    private $regionRepository;
    /**
     * @var SpecificWeightInterface
     */
    private $specificWeightRepository;

    private $generalCharacteristicsRepository;

    /**
     * IndustryController constructor.
     * @param IndustryInterface $industryRepository
     * @param RegionInterface $regionRepository
     * @param SpecificWeightInterface $specificWeightRepository
     * @param GeneralCharacteristicsInterface $generalCharacteristicsRepository
     */
    public function __construct(IndustryInterface $industryRepository,
                                RegionInterface $regionRepository,
                                SpecificWeightInterface $specificWeightRepository,
                                GeneralCharacteristicsInterface $generalCharacteristicsRepository)
    {
        $this->industryRepository = $industryRepository;
        $this->regionRepository = $regionRepository;
        $this->specificWeightRepository = $specificWeightRepository;
        $this->generalCharacteristicsRepository = $generalCharacteristicsRepository;
    }

    public function show($region_id) {
        $industries = $this->industryRepository->findAll();
        $region = $this->regionRepository->findOneBy([['id',$region_id]]);
        return view('industries',['industries' => $industries, 'region' => $region]);
    }
}
