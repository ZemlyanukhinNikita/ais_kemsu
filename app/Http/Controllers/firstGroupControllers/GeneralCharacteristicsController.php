<?php

namespace App\Http\Controllers;

use app\Repositories\GeneralCharacteristicsInterface;
use App\Repositories\YearInterface;
use Illuminate\Http\Request;

class GeneralCharacteristicsController extends Controller
{
    private $request;
    private $yearRepository;
    private $generalCharacteristicsRepository;

    public function __construct(
        Request $request,
        YearInterface $yearRepository,
        GeneralCharacteristicsInterface $generalCharacteristicsRepository
    )
    {
        $this->request = $request;
        $this->yearRepository = $yearRepository;
        $this->generalCharacteristicsRepository = $generalCharacteristicsRepository;
    }

    public function show($region_id)
    {

        $column = explode("/",\url()->current());
        $column = end($column);
        $generalCharacteristics = $this->generalCharacteristicsRepository->findAllBy([
            ['region_id', $region_id],
            [$column, '!=', null]
        ]);

        return view('firstGroup.generalCharacteristics', [
            'characteristics' => $generalCharacteristics,
            'column' => $column,
            'region_id' => $region_id
        ]);
    }

    public function createOrUpdate($region_id)
    {
        $yearValue = $this->request->input('year');
        $columnValue = $this->request->input('value');
        $column = $this->request->input('column_name');

        $year = $this->yearRepository->findOneBy([['year',$yearValue]]);
        if(!$year) {
        $this->yearRepository->create([
            'year' => $yearValue,
        ]);
        $year = $this->yearRepository->findOneBy([['year',$yearValue]]);
        }
        $characteristic = $this->generalCharacteristicsRepository->findOneBy([['year_id',$year->id]]);
        if(!$characteristic) {
            $this->generalCharacteristicsRepository->create([
                'region_id' => $region_id,
                'year_id' => $year->id,
                $column => $columnValue
            ]);
        } else {
            $this->generalCharacteristicsRepository->update([['year_id',$year->id]],[
                $column => $columnValue
            ]);
        }
       return redirect()->back();
    }

    public function delete($region_id, $year_id)
    {
        $column = $this->request->input('column_name');
        $this->generalCharacteristicsRepository->update([['year_id',$year_id],['region_id',$region_id]],[
            $column => null
        ]);

       return redirect()->back();
    }
}
