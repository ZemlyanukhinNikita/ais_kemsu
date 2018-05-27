<?php

namespace App\Http\Controllers;

use app\Repositories\GroupInterface;
use app\Repositories\IndicatorInterface;
use app\Repositories\IndicatorValueInterface;
use App\Repositories\IndustryInterface;
use app\Repositories\RegionInterface;
use App\Repositories\YearInterface;
use Illuminate\Http\Request;

class IndicatorValuesController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var IndicatorValueInterface
     */
    private $indicatorValueRepository;
    /**
     * @var IndicatorInterface
     */
    private $indicatorRepository;
    /**
     * @var GroupInterface
     */
    private $groupRepository;
    /**
     * @var YearInterface
     */
    private $yearRepository;
    /**
     * @var IndustryInterface
     */
    private $industryRepository;
    /**
     * @var RegionInterface
     */
    private $regionRepository;

    /**
     * IndicatorValuesController constructor.
     * @param Request $request
     * @param IndicatorValueInterface $indicatorValueRepository
     * @param IndicatorInterface $indicatorRepository
     * @param GroupInterface $groupRepository
     * @param YearInterface $yearRepository
     * @param IndustryInterface $industryRepository
     * @param RegionInterface $regionRepository
     */
    public function __construct(
        Request $request,
        IndicatorValueInterface $indicatorValueRepository,
        IndicatorInterface $indicatorRepository,
        GroupInterface $groupRepository,
        YearInterface $yearRepository,
        IndustryInterface $industryRepository,
        RegionInterface $regionRepository
    )
    {
        $this->request = $request;
        $this->indicatorValueRepository = $indicatorValueRepository;
        $this->indicatorRepository = $indicatorRepository;
        $this->groupRepository = $groupRepository;
        $this->yearRepository = $yearRepository;
        $this->industryRepository = $industryRepository;
        $this->regionRepository = $regionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $region_id
     * @param $group_id
     * @param $indicator_id
     * @return \Illuminate\Http\Response
     */
    public function index($region_id, $group_id, $indicator_id)
    {
        $ids = [$region_id, $group_id, $indicator_id];

        $industries = $this->industryRepository->findAllBy([['indicator_id', $indicator_id]]);

        $region = $this->regionRepository->findOneBy([['id', $region_id]]);
        $group = $this->groupRepository->findOneBy([['id', $group_id]]);
        $indicator = $this->indicatorRepository->findOneBy([['id', $indicator_id]]);

        if ($industries->isNotEmpty())
        {
            return view('industries', [
                'industries' => $industries,
                'ids' =>$ids,
                'region' => $region,
                'group' => $group,
                'indicator' => $indicator
            ]);
        }

        $values = $this->indicatorValueRepository->findAllBy([
            ['indicator_id', $indicator_id],
            ['region_id', $region_id],
            ['industry_id',null]
        ]);

        return view('indicatorValues', [
            'values' => $values,
            'ids' => $ids,
            'region' => $region,
            'group' => $group,
            'indicator' => $indicator
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $region_id
     * @param $group_id
     * @param $indicator_id
     * @return \Illuminate\Http\Response
     */
    public function store($region_id, $group_id, $indicator_id)
    {
        $yearValue = $this->request->input('year');
        $value = $this->request->input('value');

        $year = $this->yearRepository->findOneBy([['year',$yearValue]]);
        if(!$year) {
            $this->yearRepository->create([
                'year' => $yearValue,
            ]);
            $year = $this->yearRepository->findOneBy([['year',$yearValue]]);
        }

        $this->indicatorValueRepository->create([
            'region_id' => $region_id,
            'year_id' => $year->id,
            'value' => $value,
            'indicator_id' => $indicator_id,
            'industry_id' => null
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $region_id
     * @param $group_id
     * @param $indicator_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($region_id,$group_id,$indicator_id)
    {
        $this->indicatorValueRepository->delete([
            ['year_id',$this->request->input('year_id')],
            ['region_id', $region_id],
            ['indicator_id', $indicator_id],
            ['industry_id', null]
        ]);
        return redirect()->back();
    }
}
