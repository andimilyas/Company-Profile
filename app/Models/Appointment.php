<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'appointments';
    protected $fillable = [
        'phone_number',
        'name',
        'email',
        'brief',
        'budget',
        'meeting_date',
        'product_id'
    ];

    protected $casts = [
        'meeting_date' => 'datetime' //format: Y-m-d H:i:s
    ];
}
