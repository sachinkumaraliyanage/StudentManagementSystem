<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'nic',
        'name_prefix',
        'gender',
        'pno',
        'email',
        'address',
        'school',
        'description',
    ];

    protected $hidden = [
        'state',
        'updated_by',
        'created_by',
    ];
}
