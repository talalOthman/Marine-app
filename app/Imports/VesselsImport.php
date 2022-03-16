<?php

namespace App\Imports;

use App\Models\Vessel;
use Maatwebsite\Excel\Concerns\ToModel;

class VesselsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Vessel([
            'type'     => $row[0],
            'callName' => $row[1],
            'MMSI'     => $row[2],
            'cargo'    => $row[3],
        ]);
    }
}
