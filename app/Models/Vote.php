<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'poll_votes';

    protected $fillable = [
        'voted_at',
        'description',
        'option',
        'poll_id',
        'option_id'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];
}
