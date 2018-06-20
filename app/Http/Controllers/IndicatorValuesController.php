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
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

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
     * @var Excel
     */
    private $excel;

    /**
     * IndicatorValuesController constructor.
     * @param Excel $excel
     * @param Request $request
     * @param IndicatorValueInterface $indicatorValueRepository
     * @param IndicatorInterface $indicatorRepository
     * @param GroupInterface $groupRepository
     * @param YearInterface $yearRepository
     * @param IndustryInterface $industryRepository
     * @param RegionInterface $regionRepository
     * @internal param Request $request
     * @internal param IndicatorValueInterface $indicatorValueRepository
     * @internal param IndicatorInterface $indicatorRepository
     * @internal param GroupInterface $groupRepository
     * @internal param YearInterface $yearRepository
     * @internal param IndustryInterface $industryRepository
     * @internal param RegionInterface $regionRepository
     */
    public function __construct(
        Excel $excel,
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
        $this->excel = $excel;
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

            return redirect()->route('values.store',[$region_id,$group_id,$indicator_id])->withErrors($validator)->withInput();
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

    public function export($region_id, $group_id, $indicator_id)
    {
        $ids = [$region_id, $group_id, $indicator_id];

        //$industries = $this->industryRepository->findAllBy([['indicator_id', $indicator_id]]);

        $region = $this->regionRepository->findOneBy([['id', $region_id]]);
        $group = $this->groupRepository->findOneBy([['id', $group_id]]);
        $indicator = $this->indicatorRepository->findOneBy([['id', $indicator_id]]);

//        if ($industries->isNotEmpty())
//        {
//            return view('industries', [
//                'industries' => $industries,
//                'ids' =>$ids,
//                'region' => $region,
//                'group' => $group,
//                'indicator' => $indicator
//            ]);
//        }

        $values = $this->indicatorValueRepository->findAllBy([
            ['indicator_id', $indicator_id],
            ['region_id', $region_id],
            ['industry_id',null]
        ]);
        $export = new InvoicesExport($this->indicatorValueRepository,$this->yearRepository,$region_id,$indicator_id);
        return $this->excel->download($export, 'invoices.xlsx');

//        return view('indicatorValues', [
//            'values' => $values,
//            'ids' => $ids,
//            'region' => $region,
//            'group' => $group,
//            'indicator' => $indicator
//        ]);
    }
}

class InvoicesExport implements FromCollection
{
    private $invoices;
    /**
     * @var
     */
    private $ids;
    /**
     * @var
     */
    private $region_id;
    /**
     * @var
     */
    private $indicator_id;
    /**
     * @var YearInterface
     */
    private $years;

    /**
     * InvoicesExport constructor.
     * @param IndicatorValueInterface $invoices
     * @param YearInterface $years
     * @param $region_id
     * @param $indicator_id
     * @internal param YearInterface $year
     */
    public function __construct(IndicatorValueInterface $invoices, YearInterface $years, $region_id, $indicator_id)
    {
        $this->invoices = $invoices;
        $this->region_id = $region_id;
        $this->indicator_id = $indicator_id;
        $this->years = $years;
    }

    public function collection()
    {
        $values = $this->invoices->findAllBy([
            ['indicator_id', $this->indicator_id],
            ['region_id', $this->region_id],
            ['industry_id',null]
        ]);

        $yearsId =[];
        foreach ($values as $value)
        {
            $yearsId[] =  $value->year_id;
        }

        $years = [];
        for($i=0;$i<count($yearsId); $i++)
        {
            $years[] = $this->years->findOneBy([['id',$yearsId[$i]]]);
        }

        $collectionValue = collect();
        $collectionValue->push('Год');
        foreach ($years as $year)
        {
            $collectionValue->push($year->year);
        }

        $collectionValue->push('Значение');
        foreach ($values as $value)
        {
            $collectionValue->push($value->value);
        }

        return $collectionValue->chunk(count($collectionValue)/2.0);
    }
}
