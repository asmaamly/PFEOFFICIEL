<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\tablemapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;

class TablemappingImport implements ToCollection , WithHeadingRow , WithCalculatedFormulas
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
            tablemapping::create([
                    'layer' => $row['layer'],
                    'target_table_name' => $row['target_table_name'],
                    'mapping_name' => $row['mapping_name'],
                    'main_source' => $row['main_source'],
                    'join' => $row['join'],
                    'filter_criterion' => $row['filter_criterion'],
                    'historization_algorithm' => $row['historization_algorithm'],
                    'historization_columns' => $row['historization_columns'],
                    'source' => $row['source'],
                    'remarque' => $row['remarque'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
            ]);

         }    
    }
}
