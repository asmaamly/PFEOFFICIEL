<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    use HasFactory;
    protected $table = 'system';
    protected $fillable = [
        'source_system_id',
        'schema',
        'filename',
        'imported_at',
       'user_id',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
