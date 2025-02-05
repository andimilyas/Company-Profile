<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyAbout extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'company_abouts';
    protected $fillable = [
        'name',
        'thumbnail',
        'type'
    ];

    public function keyPoints()
    {
        return $this->hasMany(CompanyKeyPoint::class, 'company_about_id', 'id');
    }
}
