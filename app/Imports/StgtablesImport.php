<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\stgtables;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;


class StgtablesImport implements ToCollection , WithHeadingRow , WithCalculatedFormulas
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
                stgtables::Create([
                    'schema' => $row['schema'],
                    'table_name' => $row['table_name'], // ' nom de la colonnes dans la base de donne'
                    'column_name' => $row['column_name'],
                    'mandatory' => $row['mandatory'],
                    'pk' => $row['pk'],
                    'key_set_name' => $row['key_set_name'],
                    'key_domain_name' => $row['key_domain_name'],
                    'code_set_name' => $row['code_set_name'],
                    'code_domain_name' => $row['code_domain_name'],
                    'data_type' => $row['data_type'],
                    'natural_key' => $row['natural_key'],
                    'bkey_filter' => $row['bkey_filter'],
                    'column_transformation_rule' => $row['column_transformation_rule'],
                    'remarque' => $row['remarque'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
