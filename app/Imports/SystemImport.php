<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\system;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Auth;

class SystemImport implements ToCollection, WithHeadingRow
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
        foreach ($rows as $row) {
            // Créer une nouvelle entrée dans la table avec le nom de la feuille
            System::create([
                'source_system_id' => $row['source_system_id'],
                'schema' => $row['schema'],
                'imported_at' => $this->importDateTime,
                'user_id' => $this->user_id,
            ]);
        }
    }

}
