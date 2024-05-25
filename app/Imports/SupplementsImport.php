<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\supplements;
use Illuminate\Support\Facades\Auth;

class SupplementsImport implements ToCollection , WithHeadingRow
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
                supplements::Create([
                    'reserved_words' => $row['reserved_words'],
                    'reserved_words_source' => $row['reserved_words_source'],
                    'validation_comment' => $row['validation_comment'],
                    'imported_at' => $this->importDateTime,
                    'user_id' => $this->user_id,
                ]);

        }
    }
}
