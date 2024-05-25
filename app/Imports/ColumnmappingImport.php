<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\columnmapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class ColumnmappingImport implements ToCollection , WithHeadingRow
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
                columnmapping::create([
                    'layer' => $row['layer'],
                    'mapping_name' => $row['mapping_name'],
                    'column_name' => $row['column_name'],
                    'mapped_to_table' => $row['mapped_to_table'],
                    'mapped_to_column' => $row['mapped_to_column'],
                    'transformation_type' => $row['transformation_type'],
                    'transformation_rule' => $row['transformation_rule'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                   // 'colonne' => $row['colonne'],
                ]);
        }
    }
}
