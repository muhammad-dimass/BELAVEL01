<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Rumah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RumahImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
         // dd($collection);
        $ke = 1;
        foreach ($collection as $row) {
            if ($ke > 1) {
                // dd($row);

                $nama_rumah = !empty($row(0))? $row[0] : '';

                if($nama_rumah){
                    break;
                }

                $data['user_id'] = auth()->user()->id;
                $data['type_rumah'] = $nama_mobil;
                $data['harga_rumah'] = $row[1];
                $data['lokasi_rumah'] = $row[2];

                Rumah::create($data);
            }

            $ke++;
        }
    }
}
