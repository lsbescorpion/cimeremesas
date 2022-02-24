<?php

namespace App\Imports;

use App\Models\DocumentImport;
use Maatwebsite\Excel\Concerns\ToModel;

class DocumentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        foreach ($row as $rows)
        {
            $data[] = array(
                 $rows,

            );
        }
        var_dump(count($row));
        die();

    }
}
