<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\datatype;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas; //to calculate values from formulas
use Illuminate\Support\Facades\Auth;
class DatatypeImport implements ToCollection , WithHeadingRow , WithCalculatedFormulas
{
    protected $importDateTime; 
    protected $user_id;// Propriété pour stocker la date d'importation

    public function __construct($importDateTime)
    {
        $this->importDateTime = $importDateTime;
        $this->user_id = Auth::id();
      
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
                datatype::Create([
                    'source_data_type' => $row['source_data_type'],
                    'ok_flg' => $row['ok_flg'],
                    'column1' => $row['column1'],
                    'column2' => $row['column2'],
                    'teradata_data_type' => $row['teradata_data_type'],
                    'validation_comment' => $row['validation_comment'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
