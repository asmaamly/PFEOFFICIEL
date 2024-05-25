<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablemapping extends Model
{
    use HasFactory;
    protected $table = 'tablemapping';

    protected $fillable = [
        'layer',
        'target_table_name',
        'mapping_name',
        'main_source',
        'main_source_alias',
        'join, 10000',
        'filter_criterion',
        'historization_algorithm',
        'historization_columns',
        'source',
        'remarque',
        'filename',
        'imported_at',
        'user_id',
    ];
}
