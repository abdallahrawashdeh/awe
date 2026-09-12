<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeoInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ceo_image',
        'company_name',
        'ceo_name',
        'ceo_title',
        'ceo_content',
        'ceo_years',
        'ceo_projects',
        'ceo_client_satisfaction',
        'ceo_core_expertise',
        'created_by',
        'updated_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
