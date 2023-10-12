<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class,'id','assign_student_id');
    }

    public function year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function group(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function shift(){
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

}
