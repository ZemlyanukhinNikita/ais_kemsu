<?php

namespace App\Exports;


use app\Repositories\IndicatorValueInterface;
use app\Repositories\RegionInterface;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    private $invoices;

    public function __construct(IndicatorValueInterface $invoices)
    {
        $this->invoices = $invoices;
    }

    public function collection()
    {
        return $this->invoices->findAll();
    }
}