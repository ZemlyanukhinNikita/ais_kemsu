<?php

namespace App\Http\Controllers;

use app\Repositories\RegionInterface;

class RegionController extends Controller
{
    private $regionRepository;


    /**
     * RegionController constructor.
     * @param RegionInterface $regionRepository
     */
    public function __construct(RegionInterface $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function show()
    {
        $regions = $this->regionRepository->findAll();
        return view('regions',['regions' => $regions]);
    }

    public function showRegion($id)
    {
        $id = $this->regionRepository->findOneBy([['id', $id]]);
        return view('region',['region' => $id]);
    }
}
