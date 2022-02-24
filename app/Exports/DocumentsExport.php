<?php

namespace App\Exports;

use App\Models\DocumentImport;
use Maatwebsite\Excel\Concerns\FromCollection;

class DocumentsExport implements FromCollection
{

    public function __construct($model,$columns,$id)
    {
        $this->model=$model;
        $this->columns=$columns;
        $this->id=$id;

    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->id)
        {


            return DB::table($this->model)
                ->join('coins','coins.id','=','countries.coin_id')
                ->join('languajes','languajes.id','=','countries.languaje_id')
                ->where('countries.id','=',$this->id)->get([


                    'countries.name as country',
                    'coins.name as coin',
                    'languajes.name as languaje',
                    'countries.phone_prefix',
                    'countries.iso3_code',
                    'countries.time_zones',
                    'countries.created_by',
                    'countries.updated_by',
                    'countries.enabled',
                    'countries.created_at'
                ]);
        }    }
}
