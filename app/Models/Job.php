<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = [
        'title', 'description', 'company_name', 'salary_min', 'salary_max',
        'is_remote', 'job_type', 'status', 'published_at'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'job_language');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'job_location');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_category');
    }

    public function attributes()
    {
        return $this->hasMany(JobAttributeValue::class);
    }
}
