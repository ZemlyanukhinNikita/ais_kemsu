<?php

namespace App\Http\Controllers;

use app\Repositories\GroupInterface;
use app\Repositories\IndicatorInterface;
use app\Repositories\IndicatorValueInterface;
use App\Repositories\IndustryInterface;
use app\Repositories\RegionInterface;
use App\Repositories\YearInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustriesValuesController extends Controller
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
     * IndustriesValuesController constructor.
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
     * @param $industry_id
     * @return \Illuminate\Http\Response
     */
    public function index($region_id, $group_id, $indicator_id, $industry_id)
    {
        $ids = [$region_id, $group_id, $indicator_id, $industry_id];
        $region = $this->regionRepository->findOneBy([['id', $region_id]]);
        $group = $this->groupRepository->findOneBy([['id', $group_id]]);
        $indicator = $this->indicatorRepository->findOneBy([['id', $indicator_id]]);
        $industry = $this->industryRepository->findOneBy([['id', $industry_id]]);
        $values = $this->indicatorValueRepository->findAllBy([
            ['indicator_id', $indicator_id],
            ['region_id', $region_id],
            ['industry_id',$industry_id]
        ]);

        return view('industriesValues', [
            'values' => $values,
            'ids' => $ids,
            'region' => $region,
            'group' => $group,
            'indicator' => $indicator,
            'industry' => $industry
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $region_id
     * @param $group_id
     * @param $indicator_id
     * @param $industry_id
     * @return \Illuminate\Http\Response
     */
    public function store($region_id, $group_id, $indicator_id, $industry_id)
    {
        $yearValue = $this->request->input('year');
        $value = $this->request->input('value');
        $messages =
            [
                'required' => 'Поле :attribute обязательно для заполнения',
                'date_format' => 'Введите правильный год'
            ];
        $validator =  Validator::make($this->request->all(),[
            'year' => 'required|date_format:"Y"',
            'value' => 'required|numeric',
        ],$messages);

        if ($validator->fails()) {

            return redirect()->route('industryValues.store',[$region_id,$group_id,$indicator_id,$industry_id])->withErrors($validator)->withInput();
        }

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
            'industry_id' => $industry_id
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $region_id
     * @param $group_id
     * @param $indicator_id
     * @param $industry_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($region_id,$group_id,$indicator_id, $industry_id)
    {
        $this->indicatorValueRepository->delete([
            ['year_id',$this->request->input('year_id')],
            ['region_id', $region_id],
            ['indicator_id', $indicator_id],
            ['industry_id', $industry_id]
        ]);
        return redirect()->back();
    }
}
