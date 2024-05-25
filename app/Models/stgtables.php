<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stgtables extends Model
{
    use HasFactory;
    protected $table = 'stgtables';

    protected $fillable = [
        'schema',
        'table_name',
        'column_name',
        'mandatory',
        'pk',
        'key_set_name',
        'key_domain_name',
        'code_set_name',
        'code_domain_name',
        'data_type',
        'natural_key',
        'bkey_filter',
        'column_transformation_rule',
        'remarque',
        'filename',
        'imported_at',
        'user_id',
    ];
}
