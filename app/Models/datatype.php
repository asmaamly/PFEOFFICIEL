<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datatype extends Model
{
    use HasFactory;
    protected $table = 'datatype';

    protected $fillable = [
        'source_data_type',
        'ok_flg',
        'column1',
        'column2',
        'teradata_data_type',
        'validation_comment',
        'filename',
        'imported_at',
        'user_id',
    ];
}
