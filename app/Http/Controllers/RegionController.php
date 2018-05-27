<?php

namespace App\Http\Controllers;

use app\Repositories\GroupInterface;
use app\Repositories\IndicatorInterface;
use app\Repositories\RegionInterface;

class RegionController extends Controller
{
    private $regionRepository;
    /**
     * @var GroupInterface
     */
    private $groupRepository;
    /**
     * @var IndicatorInterface
     */
    private $indicatorRepository;


    /**
     * RegionController constructor.
     * @param RegionInterface $regionRepository
     * @param GroupInterface $groupRepository
     * @param IndicatorInterface $indicatorRepository
     */
    public function __construct(RegionInterface $regionRepository, GroupInterface $groupRepository, IndicatorInterface $indicatorRepository)
    {
        $this->regionRepository = $regionRepository;
        $this->groupRepository = $groupRepository;
        $this->indicatorRepository = $indicatorRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $regions = $this->regionRepository->findAll();
        return view('regions',['regions' => $regions]);
    }

    /**
     * @param $region_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegion($region_id)
    {
        $groups = $this->groupRepository->findAll();
        $region = $this->regionRepository->findOneBy([['id', $region_id]]);
        return view('region',['region' => $region, 'groups' => $groups]);
    }

    public function showIndicators($region_id, $group_id)
    {
        $region = $this->regionRepository->findOneBy([['id', $region_id]]);
        $group = $this->groupRepository->findOneBy([['id', $group_id]]);
        $indicators = $this->indicatorRepository->findAllBy([['group_id', $group_id]]);
        return view('indicators',['indicators' => $indicators, 'region' => $region, 'group' => $group]);
    }
}
