<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Report::allSpecific();
    }

    public function headings(): array
    {
        return [
            'Date Time',
            'MMSI',
            'ROT',
            'SOG',
            'Latitude',
            'Longitude',
            'COG',
            'True Heading',
            'Timestamp',
            'AIS Channel',
        ];
    }

}
