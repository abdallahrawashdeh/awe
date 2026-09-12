<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_title',
        'name',
        'phone',
        'email',
        'cv_path',
        'message',
        'status'
    ];
}
