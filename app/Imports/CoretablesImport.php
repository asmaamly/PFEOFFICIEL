<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\coretables;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
class CoretablesImport implements ToCollection , WithHeadingRow
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
            coretables::create([
                    'table_name' => $row['table_name'],
                    'column_name' => $row['column_name'],
                    'data_type' => $row['data_type'],
                    'mandatory' => $row['mandatory'],
                    'pk' => $row['pk'],
                    'historization_key' => $row['historization_key'],
                    'is_lookup' => $row['is_lookup'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
