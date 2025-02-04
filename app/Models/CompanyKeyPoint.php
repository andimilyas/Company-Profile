<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyKeyPoint extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'company_key_points';
    protected $fillable = [
        'company_about_id',
        'keypoint'
    ];
}
