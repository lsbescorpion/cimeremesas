<?php

namespace App\Imports;

use App\Models\DocumentImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DocumentsCollectionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $data=[];
        foreach ($collection as $rows)
        {
            $data[] = $rows[0];


        }


        foreach ($data as $value)
        {
           $docs= DocumentImport::where('bar_code',$value)->first();
           if($docs)
           {
               DocumentImport::where('id',$docs->id)
                  ->update(['status_id'=>1]);
           }



        }

        return $data;

    }
}
