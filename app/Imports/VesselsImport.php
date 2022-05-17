<?php

namespace App\Imports;

use App\Models\Vessel;
use App\Models\VesselDynamicDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class VesselsImport implements ToCollection, WithStartRow, WithChunkReading
// class VesselsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Vessel([
    //         'type'     => $row[0],
    //         'callName' => $row[1],
    //         'MMSI'     => $row[2],
    //         'cargo'    => $row[3],
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        $counttemp = 0;
        foreach ($rows as $row) {
            while ($counttemp != 1) {
                $currVessel = new Vessel();
                $currVessel->type = $row[0];
                $currVessel->callName = $row[1];
                $currVessel->MMSI = $row[2];
                $currVessel->cargo = $row[3];
                $currVessel->save();
                $counttemp++;
            }
        }
        foreach ($rows as $row) {
            if ($row[2] != $currVessel['MMSI']) {
                $newVessel = new Vessel();
                $newVessel->type = $row[0];
                $newVessel->callName = $row[1];
                $newVessel->MMSI = $row[2];
                $newVessel->cargo = $row[3];
                $newVessel->save();
                $currVessel = $newVessel;
            }

            VesselDynamicDetails::create([ // dynamic vessel
                'lat'     => $row[5],
                'long'     => $row[6],
                'vessel_id' => $currVessel->id,
            ]);
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 2000;
    }
}
