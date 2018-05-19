<?php

namespace App\Http\Controllers;

use App\Repositories\SpecificWeightInterface;
use App\Repositories\YearInterface;
use Illuminate\Http\Request;

class SpecificWeightController extends Controller
{
    private $request;
    private $specificWeightRepository;
    private $yearRepository;

    /**
     * SpecificWeightController constructor.
     * @param Request $request
     * @param SpecificWeightInterface $specificWeightRepository
     * @param YearInterface $yearRepository
     */
    public function __construct(
        Request $request,
        SpecificWeightInterface $specificWeightRepository,
        YearInterface $yearRepository
    )
    {
        $this->request = $request;
        $this->specificWeightRepository = $specificWeightRepository;
        $this->yearRepository = $yearRepository;
    }


    public function show($region_id, $industry_id)
    {
        $weights = $this->specificWeightRepository->findAllBy([
            ['region_id', $region_id],
            ['industry_id', $industry_id],
            ['weight', '!=', null]
        ]);

        return view('firstGroup.specificWeights', [
            'weights' => $weights,
            'region_id' => $region_id,
            'industry_id' => $industry_id
        ]);
    }

    public function createOrUpdate($region_id, $industry_id)
    {
        $yearValue = $this->request->input('year');
        $columnValue = $this->request->input('value');
        $column = $this->request->input('column_name');

        $year = $this->yearRepository->findOneBy([['year', $yearValue]]);
        if (!$year) {
            $this->yearRepository->create([
                'year' => $yearValue,
            ]);
            $year = $this->yearRepository->findOneBy([['year', $yearValue]]);
        }
        $characteristic = $this->specificWeightRepository->findOneBy([
            ['region_id', $region_id],
            ['industry_id', $industry_id],
            ['year_id', $year->id]
        ]);

        if (!$characteristic) {
            $this->specificWeightRepository->create([
                'region_id' => $region_id,
                'year_id' => $year->id,
                'industry_id' => $industry_id,
                $column => $columnValue
            ]);
        } else {
            $this->specificWeightRepository->update([
                ['region_id', $region_id],
                ['industry_id', $industry_id],
                ['year_id', $year->id]
            ], [
                $column => $columnValue
            ]);
        }
        return redirect()->back();
    }

    public function delete($region_id, $industry_id, $year_id)
    {
        $column = $this->request->input('column_name');
        $this->specificWeightRepository->update([
            ['year_id', $year_id],
            ['region_id', $region_id],
            ['industry_id', $industry_id]
        ], [
            $column => null
        ]);

        return redirect()->back();
    }
}
