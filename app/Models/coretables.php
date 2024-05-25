<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coretables extends Model
{
    use HasFactory;
     protected $table = 'coretables';

    protected $fillable = [
        'table_name',
        'column_name',
        'data_type',
        'mandatory',
        'pk',
        'historization_key',
        'is_lookup',
        'filename',
        'imported_at',
        'user_id',
    ];
}
