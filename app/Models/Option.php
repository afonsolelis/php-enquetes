<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'poll_options';

    protected $fillable = [
        'order',
        'value',
        'status',
        'poll_id'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];
}

