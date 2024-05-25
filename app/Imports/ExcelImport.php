<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Carbon\Carbon;


class ExcelImport implements WithMultipleSheets
{
    protected $importDateTime; 

    public function __construct()
    {
        $this->importDateTime = Carbon::now();
       
    }    public function sheets(): array
    {
        return [
            'System' => new SystemImport($this->importDateTime),
            'STG tables'=> new StgtablesImport($this->importDateTime),
            'Data type' => new DatatypeImport($this->importDateTime),
            'Supplements' => new SupplementsImport($this->importDateTime),
            'BKEY' => new BkeyImport($this->importDateTime),
            'BMAP'=> new BMAPImport($this->importDateTime), 
            'BMAP values'=> new BmapvaluesImport($this->importDateTime),
            'Core Tables'=> new CoretablesImport($this->importDateTime), 
            'Table mapping'=> new TablemappingImport($this->importDateTime), 
            'Column mapping'=> new ColumnmappingImport($this->importDateTime), 
        ];
    }
}
