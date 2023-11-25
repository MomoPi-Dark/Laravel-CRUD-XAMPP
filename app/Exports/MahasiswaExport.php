<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
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
            'NIM',
            'Nama',
            'Alamat',
            'Nomer HP',
            "Created At",
            "Updated At",
        ];
    }
}
