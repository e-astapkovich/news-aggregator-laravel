<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'author',
        'image',
        'status'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
