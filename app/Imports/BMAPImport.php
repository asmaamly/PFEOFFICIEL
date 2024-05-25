<?php

namespace App\Imports;

use App\Models\bmap;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;

class BMAPImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
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

                bmap::create([
                    'code_domain_name' => $row['code_domain_name'],
                    'code_set_name' => $row['code_set_name'],
                    'code_set_id' => $row['code_set_id'],
                    'code_domain_id' => $row['code_domain_id'],
                    'physical_table' => $row['physical_table'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
