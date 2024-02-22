<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MjuStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_code';
        
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    protected $fillable = [
        'student_code',
        'first_name',
        'first_name_en' ,
        'major_id' ,
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone' ,
        'email',
        'created_at',
        'updated_at'

    ];
}