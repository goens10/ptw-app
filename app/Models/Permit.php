<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permit extends Model
{

    use HasFactory;

    protected $fillable = [
        'permit_number',
        'request_by',
        'section',
        'work_date',
        'description',

        // workflow
        'status',
        'ptw_number',
        'printed_at',
        'issued_at',
        'closed_at',
    ];
}
