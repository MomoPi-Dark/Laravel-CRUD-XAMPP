<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class MahasiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIM',
            'Nama',
            'Alamat',
            'Nomer HP'
        ];
    }
}
