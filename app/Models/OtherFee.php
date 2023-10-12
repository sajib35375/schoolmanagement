<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }


}
