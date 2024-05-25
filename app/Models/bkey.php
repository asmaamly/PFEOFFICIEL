<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bkey extends Model
{
    use HasFactory;
    protected $table = 'bkey';

    protected $fillable = [
        'key_domain_name',
        'key_set_name',
        'key_set_id',
        'key_domain_id',
        'physical_table',
        'filename',
        'imported_at',
        'user_id',
    ];
}
