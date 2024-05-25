<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bmapvalues extends Model
{
    use HasFactory;
    protected $table = 'bmapvalues';

    protected $fillable = [
        'layer',
        'code_set_name',
        'code_domain_id',
        'edw_code',
        'source_code',
        'description',
        'filename',
        'imported_at',
        'user_id',
    ];
}
