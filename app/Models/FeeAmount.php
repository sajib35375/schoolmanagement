<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_id','id');
    }

    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function studentYear(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
}
