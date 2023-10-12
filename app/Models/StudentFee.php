<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }
}
