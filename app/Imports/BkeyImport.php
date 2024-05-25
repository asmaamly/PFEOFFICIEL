<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\bkey;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;

class BkeyImport implements ToCollection , WithHeadingRow , WithCalculatedFormulas
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
                bkey::Create([
                    'key_domain_name' => $row['key_domain_name'],
                    'key_set_name' => $row['key_set_name'],
                    'key_set_id' => $row['key_set_id'],
                    'key_domain_id' => $row['key_domain_id'],
                    'physical_table' => $row['physical_table'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
