<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\VoteCreated;

class Option extends Model
{
    use HasFactory;

    protected $table = 'poll_options';

    protected $dispatchesEvents = [
        'updated' => VoteCreated::class,
    ];

    protected $fillable = [
        'order',
        'value',
        'votes',
        'status',
        'poll_id'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];
}

