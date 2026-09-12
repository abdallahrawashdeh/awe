<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalInfo extends Model
{
    use HasFactory;

    protected $table = 'totals_info';

    protected $fillable = [
        'total_cities',
        'total_countries',
        'total_employees',
        'total_clients',
        'total_projects',
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
