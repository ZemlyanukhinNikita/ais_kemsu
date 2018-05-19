<?php

namespace App\Http\Controllers;

use App\Repositories\IndustryInterface;
use app\Repositories\RegionInterface;

class IndustryController extends Controller
{
    private $industryRepository;
    private $regionRepository;


    /**
     * IndustryController constructor.
     * @param IndustryInterface $industryRepository
     * @param RegionInterface $regionRepository
     */
    public function __construct(IndustryInterface $industryRepository,
                                RegionInterface $regionRepository)
    {
        $this->industryRepository = $industryRepository;
        $this->regionRepository = $regionRepository;
    }

    public function show($region_id) {
        $industries = $this->industryRepository->findAll();
        $region = $this->regionRepository->findOneBy([['id',$region_id]]);
        return view('industries',['industries' => $industries, 'region' => $region]);
    }
}
