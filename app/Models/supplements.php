<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplements extends Model
{
    use HasFactory;
    protected $table = 'supplements';

    protected $fillable = [
        'reserved_words',
        'reserved_words_source',
        'validation_comment',
        'filename',
        'imported_at',
        'user_id',
    ];
}
