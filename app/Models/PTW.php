<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTW extends Model
{
    protected $fillable = [
    'status',
    'ptw_number',
    'request_by',
    'section',
    'work_date',
    'description',
    'printed_at',
    'issued_at',
    'closed_at',
];
}
