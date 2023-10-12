<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'employee_id','id');
    }

    public function leave(){
        return $this->belongsTo(LeavePurpose::class,'purpose_id','id');
    }
}
