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
{

    public function collection(Collection $rows)
    {
        $counttemp = 0;
        foreach ($rows as $row) {
            while ($counttemp != 1) {
                $currVessel = new Vessel();
                $currVessel->MMSI = $row[2];
                $currVessel->ais_channel = $row[10];
                $currVessel->save();
                $counttemp++;
            }
        }
        foreach ($rows as $row) {
            if ($row[2] != $currVessel['MMSI']) {
                $newVessel = new Vessel();
                $newVessel->MMSI = $row[2];
                $newVessel->ais_channel = $row[10];
                $newVessel->save();
                $currVessel = $newVessel;
            }

            VesselDynamicDetails::create([ // dynamic vessel
                'rate_of_turn' => $row[3],
                'sog' => $row[4],
                'lat'     => $row[5],
                'long'     => $row[6],
                'cog' => $row[7],
                'heading' => $row[8],
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
        return 10000;
    }
}
