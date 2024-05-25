<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\bmapvalues;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class BmapvaluesImport implements ToCollection , WithHeadingRow
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
                bmapvalues::Create([
                    'layer' => $row['layer'],
                    'code_set_name' => $row['code_set_name'],
                    'code_domain_id' => $row['code_domain_id'],
                    'edw_code' => $row['edw_code'],
                    'source_code' => $row['source_code'],
                    'description' => $row['description'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
