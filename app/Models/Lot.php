<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id'
    ];

    protected $casts = [
      'name' => 'string',
      'description' => 'string',
      'category_id' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategoryFilter($query, $param)
    {
        return $query->whereHas('category', function ($q) use ($param) {
            $q->where('id', $param);
        });
    }
}
