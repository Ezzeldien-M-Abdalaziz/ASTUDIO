<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /** @use HasFactory<\Database\Factories\AttributeFactory> */
    use HasFactory;
    protected $fillable = ['name', 'type', 'options'];

    protected $casts = [
        'options' => 'json',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_attribute_values');

    }
}
