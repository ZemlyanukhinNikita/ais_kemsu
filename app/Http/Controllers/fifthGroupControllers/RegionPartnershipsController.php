<?php

namespace App\Http\Controllers;

use app\Repositories\RegionsPartnershipInterface;
use App\Repositories\YearInterface;
use Illuminate\Http\Request;

class RegionPartnershipsController extends Controller
{
    private $request;
    /**
     * @var RegionsPartnershipInterface
     */
    private $regionsPartnershipRepository;
    /**
     * @var YearInterface
     */
    private $yearRepository;

    /**
     * RegionPartnershipsController constructor.
     * @param Request $request
     * @param RegionsPartnershipInterface $regionsPartnershipRepository
     * @param YearInterface $yearRepository
     */
    public function __construct(
        Request $request,
        RegionsPartnershipInterface $regionsPartnershipRepository,
        YearInterface $yearRepository
)
    {
        $this->regionsPartnershipRepository = $regionsPartnershipRepository;
        $this->request = $request;
        $this->yearRepository = $yearRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $region_id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store($region_id)
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
        $characteristic = $this->regionsPartnershipRepository->findOneBy([['year_id',$year->id]]);
        if(!$characteristic) {
            $this->regionsPartnershipRepository->create([
                'region_id' => $region_id,
                'year_id' => $year->id,
                $column => $columnValue
            ]);
        } else {
            $this->regionsPartnershipRepository->update([['year_id',$year->id]],[
                $column => $columnValue
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $column = explode("/",\url()->current());
        $column = end($column);
        $characteristics = $this->regionsPartnershipRepository->findAllBy([
            ['region_id', $id],
            [$column, '!=', null]
        ]);
        return view('fifthGroup.regionsPartnerships', [
            'characteristics' => $characteristics,
            'column' => $column,
            'region_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param $region_id
     * @param $year_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($region_id, $year_id)
    {
        $column = $this->request->input('column_name');
        $this->regionsPartnershipRepository->update([['year_id',$year_id],['region_id',$region_id]],[
            $column => null
        ]);

        return redirect()->back();
    }
}
