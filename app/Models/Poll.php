<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $table = 'poll';

    protected $fillable = [
        'title',
        'description',
        'closes_at',
        'status'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];
}
