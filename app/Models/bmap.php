<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bmap extends Model
{
    use HasFactory;
    protected $table = 'bmap';

    protected $fillable = [
        'code_domain_name',
        'code_set_name',
        'code_set_id',
        'code_domain_id',
        'physical_table',
        'filename',
        'imported_at',
        'user_id',
    ];
}
