<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'position',
        'department',
        'employment_status',
        'basic_salary',
        'bank_account_number',
        'bank_name',
    ];
}