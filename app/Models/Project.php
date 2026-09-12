<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['year', 'title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function getFirstImageAttribute()
    {
        return $this->images->first();
    }

    public function getMainImageAttribute()
    {
        $image = $this->images->first();
        return $image ? $image->image_path : null;
    }
}
