<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // اسم الجدول (اختياري إذا كان الاسم مطابق للقواعد)
    protected $table = 'appointments';

    // الحقول التي يسمح بإدخالها عبر create()
    protected $fillable = [
        'full_name',
        'email_address',
        'submission_date',
        'speicality',
        'phone_number',
        'description',
        'status',
    ];


    protected $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}