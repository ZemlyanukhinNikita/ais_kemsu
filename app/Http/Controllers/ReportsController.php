<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use app\Repositories\IndicatorInterface;
use app\Repositories\IndicatorValueInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use SebastianBergmann\Exporter\Exporter;

class ReportsController extends Controller
{
    private $indicator;
    /**
     * @var IndicatorValueInterface
     */
    private $indicatorValue;

    /**
     * ReportsController constructor.
     * @param IndicatorInterface $indicator
     * @param IndicatorValueInterface $indicatorValue
     */
    public function __construct(IndicatorInterface $indicator, IndicatorValueInterface $indicatorValue)
    {
        $this->indicator = $indicator;
        $this->indicatorValue = $indicatorValue;
    }

    public function export(Request $request, Excel $excel, InvoicesExport $export)
    {
        //$indicators = $this->indicator->findAllBy(['group_id' => $request->input('groups')+1]);
        //$indicatorsValue = $this->indicatorValue->findAllBy(['region_id' => $request->input('groups')+1]);
        return $excel->download($export, 'invoices.xlsx');
    }
}
