<?php

namespace App\Imports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\ToModel;

class packageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Package([
            'email' => $row[0],
            'firstname' => $row[1],
            'surname' => $row[2],
            'homeDelivery' => $row[3],
            'city' => $row[4],
            'street' => $row[5],
            'housenumber' => $row[6]
        ]);
    }
}
