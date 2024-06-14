<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;



    protected $fillable = [
        'fname',
        'lname',
        'nic',
        'dob',
        'gender',
        'student_phone',
        'email',
        'address',
        'school',
        'parent_name',
        'parent_phone',
        'parent_address',
        'parent_nic',
        'parent_email',
    ];

    protected $hidden = [
        'state',
        'updated_by',
        'created_by',
    ];
}
