<?php

namespace App\Exports;


use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SoporteExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    * <a href="{{ route('generar.excel') }}">exportar</a>
    */
    public function headings(): array
    {
        return ['usuarios','depart_id','incid_id','comentario','sopt1','status','created_at'];
    }
    public function collection()
    {
         $soporte = DB::table('soporte')->select('id','usuarios','depart_id','incid_id','comentario','sopt1','status','created_at')->get();
         return $soporte;

    }
}