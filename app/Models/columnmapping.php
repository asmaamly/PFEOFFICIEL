<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class columnmapping extends Model
{
    use HasFactory;
    protected $table = 'columnmapping';

    protected $fillable = [
        'layer',
        'mapping_name',
        'column_name',
        'mapped_to_table',
        'mapped_to_column',
        'transformation_type',
        'transformation_rule, 1000',
        'colonne',
        'filename',
        'imported_at',
        'user_id',
    ];
}
